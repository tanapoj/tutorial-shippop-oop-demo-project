<?php
/**
 * Created by PhpStorm.
 * User: nartra
 * Date: 25/7/19
 * Time: 12:02 AM
 */

namespace services\auth;


use core\Request;

abstract class AuthService
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * AuthService constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public abstract function getUserId(): ?int;
}