<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CarRepository;
use Symfony\Component\Serializer\SerializerInterface;

class SearchCarController extends AbstractController
{
    private $carRepository;

    public function __construct(CarRepository $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    #[Route('/search/car', name: 'app_search_car')]
    public function index(): Response
    {
        return $this->render('search_car/index.html.twig', [
            'controller_name' => 'SearchCarController',
        ]);
    }

    #[Route('/marks', name: 'get_all_marks', methods: ['GET'])]
    public function getCarBrands(CarRepository $carRepository): JsonResponse
    {
        $brands = $carRepository->findUniqueBrands();

        return new JsonResponse($brands);
    }

    #[Route('/models/{mark}', name: 'get_models_for_mark', methods: ['GET'])]
    public function getModelsForMark(string $mark, CarRepository $carRepository): JsonResponse
    {
        $models = $carRepository->findModelsByMark($mark);
        return new JsonResponse($models);
    }
    
    #[Route('/cars', name: 'get_all_cars', methods: ['GET'])]
    public function getAllCars(CarRepository $carRepository, SerializerInterface $serializer): JsonResponse
    {
        $cars = $carRepository->findAllCars();
        $data = $serializer->serialize($cars, 'json', ['groups' => 'car']);
        
        return new JsonResponse($data, 200, [], true);
    }
    
    #[Route('/search/cars', name: 'search_cars', methods: ['POST'])]
    public function searchCars(Request $request, SerializerInterface $serializer): JsonResponse
    {
        $requestData = json_decode($request->getContent(), true);
    
        // Check if the required keys are present in the request data
        if (!isset($requestData['selectedMark']) || !isset($requestData['selectedModel']) || !isset($requestData['priceRangeMin']) || !isset($requestData['priceRangeMax'])) {
            // Removed logger usage
            return new JsonResponse(['error' => 'Missing required parameters'], Response::HTTP_BAD_REQUEST);
        }
    
        // Extract the search criteria
        $selectedMark = $requestData['selectedMark'];
        $selectedModel = $requestData['selectedModel'];
        $priceRangeMin = $requestData['priceRangeMin'];
        $priceRangeMax = $requestData['priceRangeMax'];
    
        // Perform the search
        $searchResult = $this->carRepository->findBySearchCriteria($selectedMark, $selectedModel, $priceRangeMin, $priceRangeMax);
    
        // Serialize the search results with the appropriate groups or context
        $data = $serializer->serialize($searchResult, 'json', ['groups' => 'car:read']);
    
        // Removed logger usage
        return new JsonResponse($data, 200, [], true);
    }
    #[Route('/car/{id}/owner', name: 'get_car_owner', methods: ['GET'])]
public function getCarOwner(int $id, CarRepository $carRepository): JsonResponse
{
    $car = $carRepository->find($id);
    if (!$car) {
        return new JsonResponse(['error' => 'Car not found'], Response::HTTP_NOT_FOUND);
    }

    $ownerUsername = $car->getUser()->getUsername();
    return new JsonResponse(['username' => $ownerUsername]);
}

}
