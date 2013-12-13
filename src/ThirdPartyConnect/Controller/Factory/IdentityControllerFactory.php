<?php
namespace ThirdPartyConnect\Controller\Factory;

use ThirdPartyConnect\Config\FacebookConfig;
use ThirdPartyConnect\Controller\IdentityController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IdentityControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        /* @var $serviceLocator \Zend\ServiceManager\ServiceManager */
        $serviceLocator = $controllerManager->getServiceLocator();

        $config = $serviceLocator->get('config');

        if (!array_key_exists('third-party-connect', $config))
        {
            throw new \Exception('You must copy the third-party-connect.local.php.dist file to your config/autoload directory.');
        }

        return new IdentityController(
            new FacebookConfig($config['third-party-connect'])
        );
    }
}