<?php

return [
    'defaults' => array(
        'supportsCredentials' => false,
        'allowedOrigins' => array('*'),
        'allowedHeaders' => array('*'),
        'allowedMethods' => array('POST', 'PUT', 'GET', 'DELETE','OPTIONS'),
        'exposedHeaders' => array(),
        'maxAge' => 3600,
        'hosts' => array(),
    ),

    'paths' => array(
        '*' => array(
            'allowedOrigins' => array('*'),
            'allowedHeaders' => array('*'),
            'allowedMethods' => array('POST', 'PUT', 'GET', 'DELETE','OPTIONS'),
            'maxAge' => 3600,
            'hosts' => array('*'),
        ),
    ),
];

