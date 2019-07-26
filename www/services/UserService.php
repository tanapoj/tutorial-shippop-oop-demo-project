<?php
/**
 * Created by PhpStorm.
 * User: nartra
 * Date: 24/7/19
 * Time: 11:15 PM
 */

namespace services;


use core\Mysql;
use models\User;
use services\auth\AuthService;

class UserService
{

    /**
     * @var Mysql
     */
    private $mysql;

    /**
     * UserService constructor.
     */
    public function __construct()
    {
        $this->mysql = new Mysql();
    }

    public function getCurrentUser(AuthService $authService): ?User
    {
        return $this->getUserById($authService->getUserId());
    }

    public function getUserById(int $id): ?User
    {
        $users = $this->mysql->query_array("SELECT * FROM users WHERE id = $id");

        if (empty($users)) {
            return null;
        }

        ['id' => $id, 'username' => $username, 'email' => $email, 'createAt' => $createAt, 'updateAt' => $updateAt, 'active' => $active, 'role' => $role] = $users[0];

        return new User($id, $username, $email, $createAt, $updateAt, $active, $role);
    }

    public function getUserByEmailAndPassword($email, $password, $allow_match_with_username_instate_of_email = false): ?User
    {
        $hash = $this->passwordHash($password);
        $users = $this->mysql->query_array("SELECT * FROM users WHERE email = '$email' AND password = '$hash'");

        if (empty($users)) {
            return null;
        }

        ['id' => $id, 'username' => $username, 'email' => $email, 'createAt' => $createAt, 'updateAt' => $updateAt, 'active' => $active, 'role' => $role] = $users[0];

        return new User($id, $username, $email, $createAt, $updateAt, $active, $role);
    }

    private function passwordHash($password)
    {
        return md5($password);
    }

}