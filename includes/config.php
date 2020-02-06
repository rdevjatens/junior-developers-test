<?php

/**
 * Config file for configuring website
 */

function config($key = '')
{
    $config = [
        'site_url' => 'localhost',
        'page_names' => [
          '/' => 'Product list',
          'product-list' => 'Product list',
          'product-add' => "Product add",
        ],
        'template_path' => 'templates',
        'content_path' => 'content',
    ];

    return isset($config[$key]) ? $config[$key] : null;
}

/**
 * Database information
 */
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DB', 'products');
