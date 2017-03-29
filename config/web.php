<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'reclame',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module'
        ]
    ],
    'language' => 'ru-RU',
    'sourceLanguage' => 'ru-RU',
    'components' => [
        'direct' => [
            'class'         => 'g1k\direct\DirectApi',
            'clientId'      => 'c54147a7bbe9450dabbdff4bd0015c8f',
            'clientSecret'  => 'a311841040134edaa6179c6dfaf8464c',
            'useSandbox'    => false, # использовать ли песочницу. по умолчанию false — использует боевое API
            'locale'        => 'ru', # на каком языке отдавать ответы. Если не указан, то используется язык приложения
            'responseType'  => 'code', # Тип ответа от яндекса при получении токена (code, token). Если не указан, то используется code.
        ],
      
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 's26VH4sZHFOQprmTwQBMBU9VGNVJXdwd',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
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
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'suffix' => '.html',
            'rules' => [
                [
                    'pattern' => '',
                    'route' => '/date/index',
                    'suffix' => ''
                ],
                '<action:(charts)>' => 'date/<action>',
                '<action:(bets)>' => 'date/<action>',
                '<action:(about|contact|login)>' => 'site/<action>'
            ],
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
