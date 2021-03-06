<?php

namespace ContainerMJjhRUY;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getJwtAuthService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Services\JwtAuth' shared autowired service.
     *
     * @return \App\Services\JwtAuth
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Services/JwtAuth.php';

        return $container->services['App\\Services\\JwtAuth'] = new \App\Services\JwtAuth(($container->services['doctrine.orm.default_entity_manager'] ?? $container->getDoctrine_Orm_DefaultEntityManagerService()));
    }
}
