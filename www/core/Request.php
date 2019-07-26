<?php
/**
 * Created by PhpStorm.
 * User: nartra
 * Date: 24/7/19
 * Time: 11:26 PM
 */

namespace core;

class Request
{
    public function getMethod()
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    public function get()
    {
        return $_GET;
    }

    public function post()
    {
        return $_POST;
    }
}