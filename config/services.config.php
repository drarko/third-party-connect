<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'facebookConnect' => 'ThirdPartyConnect\Service\Factory\FacebookServiceFactory',
            'twitterConnect'  => 'ThirdPartyConnect\Service\Factory\TwitterServiceFactory',
        )
    )
);