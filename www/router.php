<?php

include "core/autoload.php";

$uri = explode("?", $_SERVER["REQUEST_URI"])[0];
$classes = ["controllers"] + array_filter(explode("/", $uri));
//example: uri=post/view
//convert to: controller/post/view

$query_string = $_GET;

//no handler class --> add index
if (count($classes) == 1) {
    $classes[] = "index";
}
//no handler method --> add index
if (count($classes) == 2) {
    $classes[] = "index";
}

//lastest is method name
$method = array_pop($classes);

//make Class name
$class = implode("\\", $classes);

//create Dependencies
$req = new \core\Request();
$res = new \core\Response();

//create handler object
$controller = new $class($req, $res);
$controller->$method();