<?php

namespace ContainerLxO2VGN;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_EmOhpFjService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.emOhpFj' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.emOhpFj'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'jwtAuth' => ['services', 'App\\Services\\JwtAuth', 'getJwtAuthService', true],
            'validator' => ['services', 'validator', 'getValidatorService', false],
        ], [
            'jwtAuth' => 'App\\Services\\JwtAuth',
            'validator' => '?',
        ]);
    }
}
