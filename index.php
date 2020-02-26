<?php

/*
 * Nick Gadomskiy and Raj
 * 1/22/20
 * Final project
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require('vendor/autoload.php');

// Create an instance of the Base class
$f3 = Base::instance();

// Define a default route
$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render("views/home.html");
});

$f3->route('GET /create', function() {
    $view = new Template();
    echo $view->render("views/create.html");
});

// Run fat free
$f3->run();