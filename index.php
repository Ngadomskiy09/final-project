<?php
/**
*author: Rajpreet Dhaliwal and Nick Gadomskiy
* 1/23/20
* /final-project/views/home.html
* index page of the final project
<*/


// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once ("vendor/autoload.php");
require ('model/validator.php');

//create an instance of the base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);

//$db = new DatabaseLs();
$controller = new LsController($f3);

$f3->set('states', array('AK', 'AL', 'AR', 'AZ', 'CA', 'CO', 'CT', 'DE', 'FL', 'GA', 'HI', 'IA', 'ID', 'IL', 'IN', 'KS', 'KY', 'LA', 'MA', 'MD', 'ME', 'MI', 'MN', 'MO', 'MS', 'MT', 'NC', 'ND', 'NE', 'NH', 'NJ', 'NM', 'NV', 'NY', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VA', 'VT', 'WA', 'WI', 'WV', 'WY'));

//Define a default route
$f3->route('GET /', function($f3) {
    $GLOBALS['controller']->home();
});

// Define a route to show login
$f3->route('POST /login', function() {
    $GLOBALS['controller']->login();
});

$f3->route('GET|POST /create', function() {
    $GLOBALS['controller']->create();
});

$f3->route('GET|POST /addItem', function() {
    $GLOBALS['controller']->add();
});

$f3->route('GET|POST /sellingDB', function() {
    $GLOBALS['controller']->selling();
});

//run fat free
$f3->run();