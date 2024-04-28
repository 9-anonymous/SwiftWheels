<?php

namespace ContainerBBfoxIG;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Q9Ua5JService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.Q9_Ua5J' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.Q9_Ua5J'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'logger' => ['privates', 'monolog.logger', 'getMonolog_LoggerService', false],
        ], [
            'logger' => '?',
        ]);
    }
}
