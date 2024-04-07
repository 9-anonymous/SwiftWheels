<?php
// src/Controller/MessageController.php
namespace App\Controller;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Message;
use App\Entity\Notification;
use Psr\Log\LoggerInterface;
use App\Repository\MessageRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use DateTime;

class MessageController extends AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    #[Route('/messages/id/{id}', name: 'app_message_by_id', methods: ['GET'])]
    public function getMessageById(MessageRepository $messageRepository, int $id): JsonResponse
    {

        $id = (int) $id; // Convert $id to integer

        $message = $messageRepository->find($id);

        if (!$message) {
            return new JsonResponse(['error' => 'Message not found'], Response::HTTP_NOT_FOUND);
        }

        // Convert the message to an array format suitable for JSON response
        $messageArray = [
            'id' => $message->getId(),
            'title' => $message->getTitle(),
            'content' => $message->getContent(),
            'photoUrl' => $message->getPhotoUrl(),
            'sender' => [
                'username' => $message->getSender()->getUsername(),
            ],
            'receiver' => [
                'username' => $message->getReceiver()->getUsername(),
            ],
            'createdAt' => $message->getCreatedAt()->format('Y-m-d H:i:s'), // Add createdAt field

        ];

        return new JsonResponse($messageArray);
    }


    #[Route('/messages/user/{receiverUsername}', name: 'app_messages_received', methods: ['GET'])]
    public function getMessagesForUser(UserRepository $userRepository, MessageRepository $messageRepository, string $receiverUsername): JsonResponse
    {
        $this->logger->info('Receiver Username: ' . $receiverUsername);

        // Find the receiver user by username
        $receiver = $userRepository->findOneBy(['username' => $receiverUsername]);

        if (!$receiver) {
            return new JsonResponse(['error' => 'Receiver not found'], Response::HTTP_NOT_FOUND);
        }

        // Fetch messages for the receiver user
        $messages = $messageRepository->findBy(['receiver' => $receiver]);

        // Convert the messages to an array format suitable for JSON response
        $messageArray = [];
        foreach ($messages as $message) {
            $messageArray[] = [
                'id' => $message->getId(),
                'title' => $message->getTitle(),
                'sender' => [
                    'username' => $message->getSender()->getUsername(),
                ],
                'createdAt' => $message->getCreatedAt()->format('Y-m-d H:i:s'), // Add createdAt field

            ];
        }

        return new JsonResponse(['messages' => $messageArray]);
    }

    #[Route('/messages', name: 'app_messages', methods: ['POST'])]
    public function sendMessage(ManagerRegistry $doctrine, Request $request, UserRepository $userRepository): JsonResponse
    {
        // Log the request headers
        $headers = $request->headers->all();
        $this->logger->info('Request Headers:', $headers);
    
        // Log the request body
        $contentArray = $request->request->all(); // Use request instead of getContent()
        $this->logger->info('Request Body:', $contentArray);
        $files = $request->files->all();
        $this->logger->info('Received Files:', $files);
    
        $data = $contentArray; // Use the parsed form data
    
        // Ensure the sender ID is being received correctly
        $loggedInUserId = $request->request->get('sender_id') ?? null;
        if (!$loggedInUserId) {
            return new JsonResponse(['error' => 'Sender ID not provided'], Response::HTTP_BAD_REQUEST);
        }
    
        // Assuming you have a User entity with proper implementation
        $sender = $userRepository->find($loggedInUserId);
        if (!$sender) {
            return new JsonResponse(['error' => 'Sender not found'], Response::HTTP_NOT_FOUND);
        }
    
        $receiver = $userRepository->findOneBy(['username' => $data['receiver']]);
        if (!$receiver) {
            return new JsonResponse(['error' => 'Receiver not found'], Response::HTTP_NOT_FOUND);
        }
    
        $message = new Message();
        $message->setTitle($data['title']);
        $message->setContent($data['content']);
    
        // Handle file upload
        $photoUrl = null;
        if ($request->files->get('photoUrl')) {
            $uploadedFile = $request->files->get('photoUrl');
            if ($uploadedFile) {
                $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
                $newFilename = $originalFilename . '-' . uniqid() . '.' . $uploadedFile->guessExtension();
                try {
                    $uploadedFile->move(
                        $this->getParameter('upload_directory'), // Define this parameter in your .env or services.yaml
                        $newFilename
                    );
                    $photoUrl = $newFilename; // Store the file name or path
                } catch (FileException $e) {
                    // Handle exception if something happens during file upload
                    $this->logger->error('File upload error:', [$e->getMessage()]);
                }
            }
        }
    
        $message->setPhotoUrl($photoUrl);
    
        $message->setSender($sender);  // Set the sender as the User entity
        $message->setReceiver($receiver);
        $message->setCreatedAt(new DateTime());
    
        $entityManager = $doctrine->getManager();
    
        try {
            $entityManager->persist($message);
            $entityManager->flush();
        } catch (\Exception $e) {
            $this->logger->error('Error saving message:', [$e->getMessage()]);
            return new JsonResponse(['error' => 'Error saving message'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    
        // Create a new Notification entity for the sender
        $notification = new Notification();
        $notification->setReceiver($receiver);
        $notification->setSender($sender); // Set the sender
        $notification->setMessage($data['content']); // Set the message content
        $notification->setMessageId($message->getId()); // Set the related message ID
        $notification->setMessageTitle($data['title']); // Include the message title
        $notification->setCreatedAt(new \DateTime()); // Set the createdAt field
        $entityManager->persist($notification);
        $entityManager->flush();
    
        return new JsonResponse(['message' => 'Message sent successfully']);
    }
    
}
