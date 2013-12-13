<?php
namespace ThirdPartyConnect\Controller;

use ThirdPartyConnect\Config\FacebookConfig;
use ThirdPartyConnect\Service\FacebookService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container as SessionContainer;

class IdentityController extends AbstractActionController
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
        $hasError = $this->params()->fromQuery('error', false);
        if (FALSE !== $hasError)
        {
            $errorCode = $this->params()->fromQuery('error_code', null);
            $errorReason = $this->params()->fromQuery('error_reason', null);

            $data = $this->facebookConfig->getUrlDataForError();
            return $this->redirect()->toRoute(
                $data['routeName'],
                $data['params'] + array('error_code' => $errorCode, 'error_reason' => $errorReason),
                true
            );
        }

        $facebook = new FacebookService($this->facebookConfig);

        $data = $facebook->getData();
        if ($data)
        {
            $urlData = $this->facebookConfig->getUrlDataForSuccess();
            return $this->

            pr($data);
            die();
        }

        return $this->redirect()->toUrl(
            $facebook->getLoginUrl($this->url()->fromRoute('third-party-connect', array('controller' => 'identity', 'action' => 'facebook'), array('force_canonical' => true)))
        );
    }
}