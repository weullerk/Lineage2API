<?php


namespace App\Models\Account;

use \App\Contracts\Model\Account as AccountModelContract;

class Account implements AccountModelContract
{
    private $login;
    private $password;
    private $email;
    private $accessLevel;

    /**
     * Account constructor.
     */
    public function __construct()
    {
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

    /**
     * @return mixed
     */
    public function getAccessLevel()
    {
        return $this->accessLevel;
    }

    /**
     * @param mixed $accessLevel
     */
    public function setAccessLevel($accessLevel): void
    {
        $this->accessLevel = $accessLevel;
    }


}
