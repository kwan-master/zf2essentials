<?php
return array(
    'controllers' => array(
        'invokables' => array(

        ),
        'factories' => array(
            'market-post-controller' => 'Market\Factory\PostControllerFactory',
            'market-index-controller' => 'Market\Factory\IndexControllerFactory',
            'market-view-controller'  => 'Market\Factory\ViewControllerFactory',
        ),
        'aliases' => array(
            'alt' => 'market-view-controller'
        )
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        // '__NAMESPACE__' => 'Market\Controller',
                        'controller'    => 'market-index-controller',
                        'action'        => 'index',
                    ),
                ),
            ),
            'market' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/market',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        // '__NAMESPACE__' => 'Market\Controller',
                        'controller'    => 'market-index-controller',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'view' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/view',
                            'defaults' => array(
                                // Change this value to reflect the namespace in which
                                // the controllers for your module are found
                                // '__NAMESPACE__' => 'Market\Controller',
                                'controller'    => 'market-view-controller',
                                'action'        => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            // This route is a sane default when developing a module;
                            // as you solidify the routes for your module, however,
                            // you may want to remove it and replace it with more
                            // specific routes.
                            'main' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/main[/:category]',
                                    'constraints' => array(
                                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                        'action' => 'index'
                                    ),
                                ),
                            ),
                            'item' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/item[/:itemId]',
                                    'constraints' => array(
                                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                        'action' => 'item'
                                    ),
                                    'constraints' => array(
                                        'itemId' => '[0-9]*'
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'post' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/post',
                            'defaults' => array(
                                // Change this value to reflect the namespace in which
                                // the controllers for your module are found
                                // '__NAMESPACE__' => 'Market\Controller',
                                'controller'    => 'market-post-controller',
                                'action'        => 'index',
                            ),
                        ),
                    ),
                ),

            ),


        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'market-post-form'  => 'Market\Factory\PostFormFactory',
            'market-post-filter' => 'Market\Factory\PostFormFilterFactory',
            'general-adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
            'listings-table'  => 'Market\Factory\ListingsTableFactory'
        ),
        'services' => array(
            'date_expires' => array(
                '2015-04-22',
                '2015-05-22',
                '2015-06-22',
            ),
            'market-expire-days' => array(
                '2',
                '5',
                '10'
            ),
            'market-captcha-options' => array(
                'titmeout' => 300 ,
                'height' => '40',
                'font' => __DIR__ . '/../../../public/fonts/glyphicons-halflings-regular.TTF' ,
            )
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Market' => __DIR__ . '/../view',
        ),
    ),
);
