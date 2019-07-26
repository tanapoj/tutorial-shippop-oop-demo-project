<?php

session_start();

function legacy()
{
    ['id' => $id, 'username' => $username, 'email' => $email] = $_SESSION["user"];
    echo "call legacy code with id=$id username=$username email=$email";
}


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
     * User constructor.
     * @param int $id
     * @param string $username
     * @param string $email
     */
    public function __construct(int $id, string $username, string $email)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
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
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
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

$_SESSION["user"] = [
    'id' => 1,
    'username' => "A",
    'email' => "A",
];

legacy();

echo "<br>";

$user = new User(2, "B", "B");
$user->letSessionWrapper(function ($_) {
    legacy();
});

echo "<br>";

legacy();

