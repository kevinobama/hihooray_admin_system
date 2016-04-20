<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=192.168.0.111;dbname=hooray_exam',
            'username' => 'root',
            'password' => 'db3a88',
            'charset' => 'utf8',
        ],
        // 'db' => [
            // 'class' => 'yii\db\Connection',
            // 'dsn' => 'mysql:host=localhost;dbname=hooray_exam',
            // 'username' => 'root',
            // 'password' => '654321',
            // 'charset' => 'utf8',
        // ],        
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
