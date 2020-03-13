<?php

$params = array_merge(

    require(__DIR__ . '/../../common/config/params.php'),

    require(__DIR__ . '/../../common/config/params-local.php'),

    require(__DIR__ . '/params.php'),

    require(__DIR__ . '/params-local.php')

);



return [

    'id' => 'app-backend',

    'basePath' => dirname(__DIR__),

    'bootstrap' => ['log'],

    'controllerNamespace' => 'backend\controllers',

    'components' => [

        'user' => [

            'identityClass' => 'backend\models\Users',

            'enableAutoLogin' => false,

        ],

        'session' => [

            'name' => '_backendSessionId', // unique for backend

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

        'errorHandler' => [

            'errorAction' => 'site/error',

        ],

        'urlManager' => [

        'class' => 'yii\web\UrlManager',

        // Disable index.php

        'showScriptName' => false,

        // Disable r= routes

        'enablePrettyUrl' => true,

        'rules' => [],

        ],

        'errorHandler' => [

            'errorAction' => 'site/error',

        ],

        'authManager' => [

            'class' => 'yii\rbac\DbManager',

        ],

    ],

     'modules' => [

         'redactor' => 'yii\redactor\RedactorModule',

          'class' => 'yii\redactor\RedactorModule',

          'uploadUrl' => 'web/uploads',
		  
		  'categories' => [
        'class' => 'yiimodules\categories\Module',
		],
      ],

    'params' => $params,

];

