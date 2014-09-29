<?php
return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Blog\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Blog\Controller\Index' => 'Blog\Controller\IndexController',
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),

	'view_manager' => array(
	    'display_not_found_reason' => true,
	    'display_exceptions'       => true,
	    'doctype'                  => 'HTML5',
	    'not_found_template'       => 'error/404',
	    'exception_template'       => 'error/index',
	    'template_map' => array(
	        'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
	        'Blog/index/index' => __DIR__ . '/../view/Blog/index/index.phtml',
	        'error/404'               => __DIR__ . '/../view/error/404.phtml',
	        'error/index'             => __DIR__ . '/../view/error/index.phtml',
	    ),
	    'template_path_stack' => array(
	        __DIR__ . '/../view',
	        'test' => __DIR__ . '/../view',
	    ),
	),
);