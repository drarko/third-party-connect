<?php
return array(
    'router' => array(
        'routes' => array(
            'third-party-connect' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/third-party-connect/[:controller[/][:action]]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*'
                    ),
                    'defaults' => array(
                        '__NAMESPACE__' => 'ThirdPartyConnect\Controller',
                        'controller'    => 'index',
                        'action'        => 'index'
                    )
                ),
            )
        )
    ),
);