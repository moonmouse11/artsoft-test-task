<?php

use Illuminate\Support\Str;

return [
    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for database operations. This is
    | the connection which will be utilized unless another connection
    | is explicitly specified when you execute a query / statement.
    |
    */

    'default' => env(key: 'DB_CONNECTION', default: 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Below are all of the database connections defined for your application.
    | An example configuration is provided for each database system which
    | is supported by Laravel. You're free to add / remove connections.
    |
    */

    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'url' => env(key: 'DB_URL'),
            'host' => env(key: 'DB_HOST', default: '127.0.0.1'),
            'port' => env(key: 'DB_PORT', default: '3306'),
            'database' => env(key: 'DB_DATABASE', default: 'artsoft-cars'),
            'username' => env(key: 'DB_USERNAME', default: 'laravel'),
            'password' => env(key: 'DB_PASSWORD', default: ''),
            'unix_socket' => env(key: 'DB_SOCKET', default: ''),
            'charset' => env(key: 'DB_CHARSET', default: 'utf8mb4'),
            'collation' => env(key: 'DB_COLLATION', default: 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded(extension: 'pdo_mysql') ? array_filter(array: [
                PDO::MYSQL_ATTR_SSL_CA => env(key: 'MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run on the database.
    |
    */

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as Memcached. You may define your connection settings here.
    |
    */

    'redis' => [

        'client' => env(key: 'REDIS_CLIENT', default: 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', default: 'redis'),
            'prefix' => env(
                key: 'REDIS_PREFIX',
                default: Str::slug(
                    title: env(key: 'APP_NAME', default: 'laravel'),
                    separator: '_'
                ) . '_database_'
            ),
        ],

        'default' => [
            'url' => env(key: 'REDIS_URL'),
            'host' => env(key: 'REDIS_HOST', default: '127.0.0.1'),
            'username' => env(key: 'REDIS_USERNAME'),
            'password' => env(key: 'REDIS_PASSWORD'),
            'port' => env(key: 'REDIS_PORT', default: '6379'),
            'database' => env(key: 'REDIS_DB', default: '0'),
        ],

        'cache' => [
            'url' => env(key: 'REDIS_URL'),
            'host' => env(key: 'REDIS_HOST', default: '127.0.0.1'),
            'username' => env(key: 'REDIS_USERNAME'),
            'password' => env(key: 'REDIS_PASSWORD'),
            'port' => env(key: 'REDIS_PORT', default: '6379'),
            'database' => env(key: 'REDIS_CACHE_DB', default: '1'),
        ],

    ],

];
