<?php

namespace App\Controller;

use App\Entity\Car;
use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class CarController extends AbstractController
{
    private $carRepository;
    private $entityManager;

    public function __construct(CarRepository $carRepository, EntityManagerInterface $entityManager)
    {
        $this->carRepository = $carRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/car", name="car_index", methods={"GET"})
     */
    public function index(): JsonResponse
    {
        $cars = $this->carRepository->findAll();
        // Serialize cars to JSON
        $serializedCars = [];
        foreach ($cars as $car) {
            $serializedCars[] = [
                'id' => $car->getId(),
                'mark' => $car->getMark(),
                'model' => $car->getModel(),
                'price' => $car->getPrice(),
                'description' => $car->getDescription(),
                'pictures' => $car->getPictures(),
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

        // Return JSON response
        return new JsonResponse($serializedCars);
    }

    /**
     * @Route("/car/new", name="car_new", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        // Access form data directly from the Request object
        $data = $request->request->all();
        $files = $request->files->get('pictures');

        if (!isset($data['mark']) || !isset($data['model']) || !isset($data['price'])) {
            return new JsonResponse(['message' => 'Missing required fields'], Response::HTTP_BAD_REQUEST);
        }

        // Create a new Car entity
        $car = new Car();
        $car->setMark($data['mark'] ?? null);
        $car->setModel($data['model'] ?? null);
        $car->setPrice($data['price'] ?? null);
        $car->setDescription($data['description'] ?? null);
        $car->setColor($data['color'] ?? null);
        $car->setMileage($data['mileage'] ?? null);
        $car->setQuantity($data['quantity'] ?? null);
        $car->setAddDate(new \DateTime($data['addDate'] ?? 'now'));

        // Set other attributes
        $car->setAbs($data['abs'] === 'true');
        $car->setEpc($data['epc'] === 'true');
        $car->setGrayCard($data['grayCard'] === 'true');
        $car->setAutoGearBox($data['autoGearBox'] === 'true');
        $car->setTaxes($data['taxes'] === 'true');
        $car->setInsurance($data['insurance'] === 'true');

        // Handle file upload
        if (isset($files) && $files->isValid()) {
            $originalFilename = pathinfo($files->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = $originalFilename.'-'.uniqid().'.'.$files->guessExtension();

            // Move the file to the directory where images are stored
            $files->move(
                $this->getParameter('upload_directory'),
                $newFilename
            );

            // Save the file path or name in your Car entity
            $car->setPictures($newFilename);
        }

        // Save the car entity
        $entityManager = $this->entityManager;
        $entityManager->persist($car);
        $entityManager->flush();

        // Return a JSON response indicating success
        return new JsonResponse(['message' => 'Car created successfully'], Response::HTTP_CREATED);
    }
}
