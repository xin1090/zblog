<?php
return array(
	'router' => array(
		'home' => array(
			'type' => 'segment',
			'optins' => array(
				'route' => '/',
				'defaults' => array(
					'controller' => 'Blog\Controller\Index',
				),
			),
		),#主页路由
	),#路由配置
	'view_manager' => array(
	    'display_not_found_reason' => true,
	    'display_exceptions'       => true,
	    'doctype'                  => 'HTML5',
	    'not_found_template'       => 'error/404',
	    'exception_template'       => 'error/index',
	    'template_map' => array(
	        'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
	        'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
	        'application/test/index'  => __DIR__ . '/../view/application/index/test.phtml',
	        'error/404'               => __DIR__ . '/../view/error/404.phtml',
	        'error/index'             => __DIR__ . '/../view/error/index.phtml',
	    ),
	    'template_path_stack' => array(
	        __DIR__ . '/../view',
	        'test' => __DIR__ . '/../view',
	    ),
	),
);