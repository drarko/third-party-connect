<?php
/**
 * Created by PhpStorm.
 * User: andreigabreanu
 * Date: 13/12/13
 * Time: 08:17
 */
namespace ThirdPartyConnect\Service\Factory;

use ThirdPartyConnect\Service\TwitterService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TwitterServiceFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return mixed|FacebookService
     * @throws \Exception
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');

        if (!array_key_exists('third-party-connect', $config))
        {
            throw new \Exception('You must copy the third-party-connect.local.php.dist file to your config/autoload directory.');
        }

        return new TwitterService($config['third-party-connect']['twitter'], $serviceLocator->get('request'));
    }
}