<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api','extraPatterns' => [
                    'GET notifications' => 'notifications',
                 ],],
                'shop' => 'site/shop',
                'search' => 'site/search',
                'site/user/<id:\d+>' => 'site/user',
                'page/<view:\w+>' => 'site/page',
                'product/<url>' => 'site/products',
                'manager' => 'manager/index',
                'manager/orders' => 'manager/orders',
                'categories' => 'site/categories',
                'categories/<url:\w+>' => 'site/categories',
                'news' => 'site/news',
                'news/<url:\w+>' => 'site/news',
                'brands' => 'site/brands',
                'brands/<id:\w+>' => 'site/brands',
                'personal' => 'site/personal',
                'supplier' => 'site/supplier',
                'logout' => 'site/logout',
                'personal-wishlist' => 'site/personal-wishlist',
                'supplier-wishlist' => 'site/supplier-wishlist',
                'personal-requests' => 'site/personal-requests',
                'personal-templates' => 'site/personal-templates',
                'personal-history' => 'site/personal-history',
                'personal-sales' => 'site/personal-sales',
                'supplier-workbook' => 'site/supplier-workbook',
                'supplier-offers' => 'site/supplier-offers',
                'supplier-requests' => 'site/supplier-requests',
                'personal-partners' => 'site/personal-partners',
                'personal-contacting' => 'site/personal-contacting',
                'supplier-processing' => 'site/supplier-processing',
                'supplier-dealers' => 'site/supplier-dealers',
                'personal-history-details' => 'site/personal-history-details',
                'supplier-processing-details' => 'site/supplier-processing-details',
                'cart' => 'site/cart',
                'sign-in' => 'site/sign-in',
                'sign-up' => 'site/sign-up',
                '404' => 'site/404',

                'about' => 'site/about',
                'contacts' => 'site/contacts',
                'corporate' => 'site/corporate',
                'company-details/<id:\w+>' => 'site/company-details',
                'site/user-delete/<id:\d+>' => 'site/user-delete'
            ],
        ],
        'session' => [
            'class' => 'yii\web\Session',
            'name' => 'myapp_session',
        ],
        'defaultRoute' => 'site/index',
        'request' => [
            'baseUrl' => '',
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ZaTMRObNiplcZ10xSgnENvTdBiG3TWRZ',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'fsUser' => [
            'class' => 'yii\web\User',
            'identityClass' => 'app\models\FsUsers',
            'enableAutoLogin' => true,
            'loginUrl' => ['/site/login'],
            'identityCookie' => [
                'name' => '_panelAdmin',
            ]
        ],
//        'errorHandler' => [
//            'errorAction' => 'site/error_',
//        ],
//        'errorHandler' => [
//            'errorAction' => 'admin/login',
//        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];

if (true) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];
}

return $config;
