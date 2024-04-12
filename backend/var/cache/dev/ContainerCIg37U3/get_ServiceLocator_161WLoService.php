<?php

namespace ContainerCIg37U3;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_161WLoService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.161_wLo' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.161_wLo'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'doctrine' => ['services', 'doctrine', 'getDoctrineService', false],
            'notificationRepository' => ['privates', 'App\\Repository\\NotificationRepository', 'getNotificationRepositoryService', true],
        ], [
            'doctrine' => '?',
            'notificationRepository' => 'App\\Repository\\NotificationRepository',
        ]);
    }
}