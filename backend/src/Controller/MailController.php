<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class MailController extends AbstractController
{
    #[Route('/send-email', name: 'api_send-email', methods: ['POST'])]
    public function sendEmail(Request $request, MailerInterface $mailer, LoggerInterface $logger): JsonResponse
    {
        
        $emailData = json_decode($request->getContent(), true);
        $logger->info('Received email data:', $emailData);

        try {
            $email = (new Email())
                ->from('no-reply@example.com')
                ->to($emailData['email'])
                ->subject('Message from ' . $emailData['username'])
                ->text($emailData['content']);

            $mailer->send($email);
            $logger->info('Email sent successfully');
            return new JsonResponse(['message' => 'Email sent successfully']);
        } catch (TransportExceptionInterface $e) {
            // Log the error
            $errorMessage = $e->getMessage();
            // You can log $errorMessage using your logger

            // Return an error response
            return new JsonResponse(['error' => 'Failed to send email: ' . $errorMessage], 500);
        }
    }
}