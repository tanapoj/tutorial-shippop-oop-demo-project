<?php
/**
 * Created by PhpStorm.
 * User: nartra
 * Date: 24/7/19
 * Time: 11:27 PM
 */

namespace core;

class Response
{
    public function json($value)
    {
        header('Content-Type: application/json');
        echo json_encode($value);
    }
}