<?php
/**
 * Created by PhpStorm.
 * User: nartra
 * Date: 24/7/19
 * Time: 11:15 PM
 */

namespace models;


class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    /**
     * @var int
     */
    private $createAt;

    /**
     * @var int
     */
    private $updateAt;

    /**
     * @var bool
     */
    private $active;

    /**
     * @var string
     */
    private $role;

    /**
     * User constructor.
     * @param int $id
     * @param string $username
     * @param string $email
     * @param int $createAt
     * @param int $updateAt
     * @param bool $active
     * @param string $role
     */
    public function __construct(?int $id = null, ?string $username = null, ?string $email = null, ?int $createAt = null, ?int $updateAt = null, ?bool $active = null, ?string $role = null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->createAt = $createAt;
        $this->updateAt = $updateAt;
        $this->active = $active;
        $this->role = $role;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }


    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getCreateAt(): int
    {
        return $this->createAt;
    }

    /**
     * @param int $createAt
     */
    public function setCreateAt(int $createAt): void
    {
        $this->createAt = $createAt;
    }

    /**
     * @return int
     */
    public function getUpdateAt(): int
    {
        return $this->updateAt;
    }

    /**
     * @param int $updateAt
     */
    public function setUpdateAt(int $updateAt): void
    {
        $this->updateAt = $updateAt;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive(bool $active): void
    {
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function isExist()
    {
        return !is_null($this->id);
    }

    public function letSessionWrapper(callable $wrapper)
    {
        $user = $_SESSION["user"];
        $_SESSION["user"] = [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
        ];
        $wrapper($user);
        $_SESSION["user"] = $user;
    }

}