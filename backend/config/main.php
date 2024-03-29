<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log',\backend\config\PreConfig::class],
    'modules' => [],
    'container'=>[
        'singletons'=>[
            \backend\components\TaskService::class=>[
                'class'=>\backend\components\Task::class
            ],
            'db'=>function(){
                return Yii::$app->db;
            },
            \backend\share\RepositoryTask::class=>[
                ['class'=>\backend\components\TaskRepositoryMysql::class],
                [\yii\di\Instance::of('db')]
            ],
            \Symfony\Component\EventDispatcher\EventDispatcherInterface::class=>[
                'class'=>\Symfony\Component\EventDispatcher\EventDispatcher::class
            ]
        ],
        'definitions'=>[
            'user'=>['class'=>\common\models\User::class],
            \yii\web\IdentityInterface::class=>[
                'class'=>'user'
            ]
        ]
    ],
    'components' => [
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
        ],
        'profile' => [
            'class' => \backend\components\ProfileComponent::class,
            'repository' => new \backend\components\ProfileRepositoryMysql()],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];
