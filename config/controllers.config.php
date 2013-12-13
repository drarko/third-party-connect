<?php
return array(
    'controllers' => array(
        'factories'  => array(
            'ThirdPartyConnect\Controller\Authorize' => 'ThirdPartyConnect\Controller\Factory\AuthorizeControllerFactory',
            'ThirdPartyConnect\Controller\Identity' => 'ThirdPartyConnect\Controller\Factory\IdentityControllerFactory',
        )
    )
);