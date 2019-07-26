<?php

define("ROOT_PATH", "/var/www/html");

session_start();

spl_autoload_register(function ($class) {
    include ROOT_PATH . '/' . str_replace("\\", "/", $class) . '.php';
});