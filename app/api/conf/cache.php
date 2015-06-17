<?php
return [
    'cache_enable' => TRUE,
    'cache' => [ // engine: redis, memcache, file, apc
        'shared' => [
            'cache' => [
                0 => 'cache1',
                4 => 'cache2',
                9 => 'cache3'
            ],
        ],
        'nodes' => [
            'default' => ['engine' => 'file', 'prefix'=>'quick_default', 'host' => '192.168.4.89', 'port' => '6379', 'ttl' => 3600],
            'cache1' => ['engine' => 'redis', 'prefix'=>'user', 'host' => '192.168.4.89', 'port' => '6379', 'ttl' => 3600],
            'cache2' => ['engine' => 'redis', 'prefix'=>'user', 'host' => '192.168.4.89', 'port' => '6379', 'ttl' => 3600],
            'cache3' => ['engine' => 'redis', 'prefix'=>'user', 'path' => './tmp', 'ttl' => 3600],
        ] 
    ],
];