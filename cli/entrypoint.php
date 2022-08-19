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
$course1 = $this->getDataGenerator()->create_course();
 
$category = $this->getDataGenerator()->create_category();
$course2 = $this->getDataGenerator()->create_course(array('name'=>'Some course', 'category'=>$category->id));

// generate 5 activities in each one
$course = $this->getDataGenerator()->create_course();
$generator = $this->getDataGenerator()->get_plugin_generator('mod_page');
$generator->create_instance(array('course'=>$course->id));

$course = $this->getDataGenerator()->create_course();
$page = $this->getDataGenerator()->create_module('page', array('course' => $course->id));

// Generate users.
$user = $this->getDataGenerator()->create_user();
$user1 = $this->getDataGenerator()->create_user(array('email'=>'user1@example.com', 'username'=>'user1'));
$this->setUser($user1);
$this->setGuestUser();
$this->setAdminUser();
$this->setUser(null);


var_dump(cache_helper::get_stats());`