<?php

define('CLI_SCRIPT', true);

$caches = [
    'stores' => [
        'apcu-example' => [
            'type' => 'apcu',
            'config' => [
                'prefix' => 'mdl'
            ]
        ],
        'rules' => [
            'application' => [
                [
                    'conditions' => [ 'canuselocalstore' => true ],
                    'stores' => [ 'apcu1', 'file1' ],
                ],
                [
                    'stores' => [ 'file1' ],
                ],
            ],
            'session' => [
                [
                    'conditions' => [ 'canuselocalstore' => true ],
                    'stores' => [ 'apcu1', 'file1' ],
                ],
                [
                    'stores' => [ 'file1' ],
                ],
            ],
            'request' => [],
        ],
    ]
];

require(__DIR__ . '/../../../../config.php');
require_once($CFG->libdir.'/clilib.php');

$CFG->tool_forcedcache_config_array = $caches;



// Instantiate new test generator

// Generate 3 courses

// generate 5 activities in each one

// Generate users.



var_dump(cache_helper::get_stats());