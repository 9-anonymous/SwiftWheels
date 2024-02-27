<?php

namespace App\Controller;
use Psr\Log\LoggerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CarRepository;

class SearchCarController extends AbstractController
{
    private $logger;
    private $carRepository;

    public function __construct(LoggerInterface $logger, CarRepository $carRepository)
    {
        $this->logger = $logger;
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

    #[Route('/search/cars', name: 'search_cars', methods: ['POST'])]
    public function searchCars(Request $request): JsonResponse
    {
        $requestData = json_decode($request->getContent(), true);
    
        // Check if the required keys are present in the request data
        if (!isset($requestData['selectedMark']) || !isset($requestData['selectedModel']) || !isset($requestData['priceRangeMin']) || !isset($requestData['priceRangeMax'])) {
            $this->logger->error('Search request missing required parameters', ['request_data' => $requestData]);
            return new JsonResponse(['error' => 'Missing required parameters'], Response::HTTP_BAD_REQUEST);
        }
    
        // Extract the search criteria
        $selectedMark = $requestData['selectedMark'];
        $selectedModel = $requestData['selectedModel'];
        $priceRangeMin = $requestData['priceRangeMin'];
        $priceRangeMax = $requestData['priceRangeMax'];
    
        // Perform the search and return the result
        $searchResult = $this->carRepository->findBySearchCriteria($selectedMark, $selectedModel, $priceRangeMin, $priceRangeMax);
        $this->logger->info('Search executed successfully', ['search_result' => $searchResult]);
        return new JsonResponse($searchResult);
    }

    

}


