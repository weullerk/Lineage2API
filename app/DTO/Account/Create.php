<?php


namespace App\DTO\Account;

class Create
{
    private $login;
    private $password;
    private $email;

    /**
     * AccountCreateDTO constructor.
     * @param $login
     * @param $password
     * @param $email
     */
    public function __construct($login, $password, $email)
    {
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login): void
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

}
