<?php
return [
    'database' => [    // 支持mysql, 如果有其它数据库需求，可以自己扩展
        'shared' => [
            'default' => [
                0 => 'default',
                9 => 'default',
            ]
        ],
        'nodes' => [
            'default' => [ // 参考medoo
                'database_type' => 'mysql',
                'database_name' => 'o2o',
                'server' => '192.168.4.89',
                'port' => 3306,
                'username' => 'idreamsky',
                'password' => 'idreamsky',
                'charset' => 'utf8',
                'option' => [
                    PDO::ATTR_CASE => PDO::CASE_NATURAL
                ]
            ]
        ]
    ]
];