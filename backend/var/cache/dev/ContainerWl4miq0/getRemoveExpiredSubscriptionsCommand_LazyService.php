<?php

namespace ContainerWl4miq0;


use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRemoveExpiredSubscriptionsCommand_LazyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.App\Command\RemoveExpiredSubscriptionsCommand.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'console'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'Command.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'console'.\DIRECTORY_SEPARATOR.'Command'.\DIRECTORY_SEPARATOR.'LazyCommand.php';

        return $container->privates['.App\\Command\\RemoveExpiredSubscriptionsCommand.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('app:remove-expired-subscriptions', [], 'Removes expired subscriptions from the database.', false, #[\Closure(name: 'App\\Command\\RemoveExpiredSubscriptionsCommand')] fn (): \App\Command\RemoveExpiredSubscriptionsCommand => ($container->privates['App\\Command\\RemoveExpiredSubscriptionsCommand'] ?? $container->load('getRemoveExpiredSubscriptionsCommandService')));
    }
}
