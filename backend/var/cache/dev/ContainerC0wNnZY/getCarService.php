<?php

namespace ContainerC0wNnZY;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCarService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Entity\Car' shared autowired service.
     *
     * @return \App\Entity\Car
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Entity'.\DIRECTORY_SEPARATOR.'Car.php';

        return $container->privates['App\\Entity\\Car'] = new \App\Entity\Car();
    }
}
