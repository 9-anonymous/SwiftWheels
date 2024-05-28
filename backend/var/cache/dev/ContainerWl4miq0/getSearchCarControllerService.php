<?php

namespace ContainerWl4miq0;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSearchCarControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\SearchCarController' shared autowired service.
     *
     * @return \App\Controller\SearchCarController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'framework-bundle'.\DIRECTORY_SEPARATOR.'Controller'.\DIRECTORY_SEPARATOR.'AbstractController.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Controller'.\DIRECTORY_SEPARATOR.'SearchCarController.php';

        $container->services['App\\Controller\\SearchCarController'] = $instance = new \App\Controller\SearchCarController(($container->privates['App\\Repository\\HistorySearchRepository'] ?? $container->load('getHistorySearchRepositoryService')), ($container->privates['App\\Repository\\CarRepository'] ?? $container->load('getCarRepositoryService')), ($container->services['doctrine.orm.default_entity_manager'] ?? self::getDoctrine_Orm_DefaultEntityManagerService($container)));

        $instance->setContainer(($container->privates['.service_locator.jUv.zyj'] ?? $container->load('get_ServiceLocator_JUv_ZyjService'))->withContext('App\\Controller\\SearchCarController', $container));

        return $instance;
    }
}
