<?php
/**
 * Created by PhpStorm.
 * User: nartra
 * Date: 25/7/19
 * Time: 12:03 AM
 */

namespace services\auth;


class Token extends AuthService
{

    public function getUserId():?int
    {
        return $this->request->get()["access_token"];
    }
}