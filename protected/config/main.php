<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Law',
    // preloading 'log' component
    'preload' => array(
        'log',
        'bootstrap',
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'ext.eguiders.EGuider.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'admin',
        'backend',
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'cannotguessit',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1', '*'),
            'generatorPaths' => array(
                'bootstrap.gii'
            ),
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'class' => 'EWebUser',
        ),
        'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap',
            'responsiveCss' => true,
        ),
        // uncomment the following to enable URLs in path-format
        'image' => array(
            'class' => 'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver' => 'GD',
        // ImageMagick setup path
        //'params'=>array('directory'=>'D:/Program Files/ImageMagick-6.4.8-Q16'),
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        // uncomment the following to use a MySQL database
        'authManager' => array(
            'class' => 'CDbAuthManager',
            'connectionID' => 'db',
            'assignmentTable' => 'auth_assignment',
            'itemChildTable' => 'auth_item_child',
            'itemTable' => 'auth_item',
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=axeo_law',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'enableParamLogging' => true,
            'enableProfiling' => true,
            'schemaCachingDuration' => 60,
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
            /*
              array(
              'class'=>'CFileLogRoute',
              'levels'=>'error, warning',
              ),
             */
            /*
              array(
              'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
              'ipFilters'=>array('127.0.0.1','192.168.1.215','114.35.66.88','118.170.36.55'),
              ),
             */
            // uncomment the following to show log messages on web pages
            /*

              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => require(dirname(__FILE__) . '/params.php'),
);

function pr($arr) {
    echo "<pre>";
    print_R($arr);
    echo "</pre>";
    exit;
}