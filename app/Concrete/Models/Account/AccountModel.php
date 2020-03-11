<?php


namespace App\Concrete\Models\Account;

use \App\Contracts\Model\Account\AccountModelContract;

class Account implements AccountModelContract
{
    // ['login', 'password', 'email', 'lastactive', 'accessLevel', 'lastIP', 'lastServer'];
    private $login;
    private $password;
    private $email;
    private $accessLevel;
    private $lastIP;
    private $lastServer;

    /**
     * CreateAccountServiceContractAccountService constructor.
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

    /**
     * @return mixed
     */
    public function getLastIP()
    {
        return $this->lastIP;
    }

    /**
     * @param mixed $lastIP
     */
    public function setLastIP($lastIP): void
    {
        $this->lastIP = $lastIP;
    }

    /**
     * @return mixed
     */
    public function getLastServer()
    {
        return $this->lastServer;
    }

    /**
     * @param mixed $lastServer
     */
    public function setLastServer($lastServer): void
    {
        $this->lastServer = $lastServer;
    }
}
