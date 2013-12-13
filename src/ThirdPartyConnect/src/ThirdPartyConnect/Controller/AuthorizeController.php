<?php
namespace ThirdPartyConnect\Controller;

use ThirdPartyConnect\Config\FacebookConfig;
use ThirdPartyConnect\Service\FacebookService;
use Zend\Mvc\Controller\AbstractActionController;

class AuthorizeController extends AbstractActionController
{
    /**
     * @var \ThirdPartyConnect\Config\FacebookConfig
     */
    protected $facebookConfig;

    /**
     * @param FacebookConfig $fbConfig
     */
    public function __construct(FacebookConfig $fbConfig)
    {
        $this->facebookConfig = $fbConfig;
    }

    public function facebookAction()
    {
        $facebook = new FacebookService($this->facebookConfig);
        return $this->redirect()->toUrl(
            $facebook->getLoginUrl(
                $this->url()->fromRoute('third-party-connect', array('controller' => 'identity', 'action' => 'facebook'), array('force_canonical' => true))
            )
        );
    }
}