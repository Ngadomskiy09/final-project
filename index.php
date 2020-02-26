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

//create an instance of the base class
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

//run fat free
$f3->run();