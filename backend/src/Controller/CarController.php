<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Car;
use App\Repository\CarRepository;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class CarController extends AbstractController
{
    private $carRepository;
    private $entityManager;
    private $logger;
    private $authorizationChecker;

    public function __construct(LoggerInterface $logger, CarRepository $carRepository, EntityManagerInterface $entityManager, AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->carRepository = $carRepository;
        $this->entityManager = $entityManager;
        $this->logger = $logger;
        $this->authorizationChecker = $authorizationChecker;
    }

    /**
     * @Route("/car", name="car_index", methods={"GET"})
     */
    public function index(): JsonResponse
    {
        $cars = $this->carRepository->findAll();
        $serializedCars = [];
        foreach ($cars as $car) {
            $serializedCars[] = $this->serializeCar($car);
        }

        return new JsonResponse($serializedCars);
    }

    /**
     * @Route("/car/new", name="car_new", methods={"POST"})
     */
    public function create(Request $request, LoggerInterface $logger): Response
    {
        $currentUser = $this->getUser();

        $data = $request->request->all();
        $files = $request->files->get('pictures');
        dump($files);

        // Validate required fields
        if (!isset($data['mark'], $data['model'], $data['price'])) {
            return new JsonResponse(['message' => 'Missing required fields'], Response::HTTP_BAD_REQUEST);
        }

        $car = new Car();
        $car->setMark($data['mark']);
        $car->setModel($data['model']);
        $car->setPrice($data['price']);
        $car->setUser($currentUser);
        $car->setDescription($data['description'] ?? null);
        $car->setColor($data['color'] ?? null);
        $car->setMileage($data['mileage'] ?? null);
        $car->setQuantity($data['quantity'] ?? null);
        $car->setAddDate(new \DateTime($data['addDate'] ?? 'now'));

        $car->setAbs(filter_var($data['abs'] ?? '', FILTER_VALIDATE_BOOLEAN));
        $car->setEpc(filter_var($data['epc'] ?? '', FILTER_VALIDATE_BOOLEAN));
        $car->setGrayCard(filter_var($data['grayCard'] ?? '', FILTER_VALIDATE_BOOLEAN));
        $car->setAutoGearBox(filter_var($data['autoGearBox'] ?? '', FILTER_VALIDATE_BOOLEAN));
        $car->setTaxes(filter_var($data['taxes'] ?? '', FILTER_VALIDATE_BOOLEAN));
        $car->setInsurance(filter_var($data['insurance'] ?? '', FILTER_VALIDATE_BOOLEAN));

        // Handle file uploads
        $uploadedFilenames = $this->handleFileUploads($files);
        $car->setpictures(implode(',', $uploadedFilenames));

        // Persist and flush the entity
        $this->entityManager->persist($car);
        $this->entityManager->flush();

        return new JsonResponse(['message' => 'Car created successfully'], Response::HTTP_CREATED);
    }

    private function handleFileUploads($files): array
    {
        $uploadedFilenames = [];
        if (!empty($files)) {
            foreach ($files as $file) {
                if ($file instanceof UploadedFile && $file->isValid()) {
                    // Generate a new filename and move the file to the upload directory
                    $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $newFilename = $originalFilename . '-' . uniqid() . '.' . $file->guessExtension();
                    $this->logger->info('Uploaded file: ' . $newFilename);
                    try {
                        $file->move($this->getParameter('upload_directory'), $newFilename);
                        $uploadedFilenames[] = $newFilename;
                    } catch (\Exception $e) {
                        $this->logger->error('Failed to upload picture: ' . $e->getMessage());
                        return []; // Return empty array on failure
                    }
                }
            }
        }
        return $uploadedFilenames;
    }

    private function serializeCar(Car $car): array
    {
        return [
            'id' => $car->getId(),
            'mark' => $car->getMark(),
            'model' => $car->getModel(),
            'price' => $car->getPrice(),
            'description' => $car->getDescription(),
            'pictures' => $car->getpictures(),
            'abs' => $car->getAbs(),
            'epc' => $car->getEpc(),
            'grayCard' => $car->getGrayCard(),
            'autoGearBox' => $car->getAutoGearBox(),
            'taxes' => $car->getTaxes(),
            'insurance' => $car->getInsurance(),
            'color' => $car->getColor(),
            'mileage' => $car->getMileage(),
            'quantity' => $car->getQuantity(),
            'addDate' => $car->getAddDate()->format('Y-m-d H:i:s'),
            'sellDate' => $car->getSellDate() ? $car->getSellDate()->format('Y-m-d H:i:s') : null,
        ];
    }





















    #[Route('/api/cars', name: "api_cars", methods: ['GET'])]
    public function getCars(CarRepository $carRepository): JsonResponse
    {
        $Cars = $carRepository->findAll();
        
        return $this->json($Cars);
    }

    #[Route('/api/cars/{id}', name: 'api_delete_cars', methods: ['DELETE'])]
    public function deleteCars(Car $car, EntityManagerInterface $entityManager): JsonResponse
    {
        // Vérifier si le car existe
        if (!$car) {
            throw $this->createNotFoundException('Car non trouvé.');
        }

        // Supprimer le car
        $entityManager->remove($car);
        $entityManager->flush();    

        return $this->json(['message' => 'Car supprimé avec succès.']);
    }

    #[Route('/api/cars/count', name: 'api_count_cars', methods: ['GET'])]
    public function countCars(CarRepository $carRepository): JsonResponse
    {
        $count = $carRepository->count([]);
    
        return $this->json($count);
    }
    
}
