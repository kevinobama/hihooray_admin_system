<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'name' => 'Hihooray-Admin',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
		'user' => [
	        'class' => 'dektrium\user\Module',
	        'admins' => ['admin','kevin'],
	    ],
	    'rbac' => [
	        'class' => 'dektrium\rbac\Module',
	    ],	        	
    ],
    'components' => [
        // 'user' => [
            // 'identityClass' => 'common\models\User',
            // 'enableAutoLogin' => true,
        // ],
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
            'enablePrettyUrl' => true, 
            'enableStrictParsing' => false, 
            'showScriptName' => false, 
		],            
	    'assetManager' => [            
            //'linkAssets' => true,
	            'bundles' => [
				'assetManager' => [
		            'bundles' => require(__DIR__ . '/../../vendor/dmstr/yii2-adminlte-asset/web/AdminLteAsset.php'), 
		        ],
            ],
        ]        
    ],
    'params' => $params,
];
