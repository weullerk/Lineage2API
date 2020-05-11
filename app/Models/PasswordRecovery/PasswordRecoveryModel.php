<?php


namespace App\Models\PasswordRecovery;


use App\Contracts\Models\PasswordRecovery\PasswordRecoveryModelContract;

class PasswordRecoveryModel implements PasswordRecoveryModelContract
{
    private $id;
    private $login;
    private $token;
    private $expirationTime;
    private $active;

    /**
     * @return mixed
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLogin() : string
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
    public function getToken() : string
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getExpirationTime() : string
    {
        return $this->expirationTime;
    }

    /**
     * @param mixed $expirationTime
     */
    public function setExpirationTime($expirationTime): void
    {
        $this->expirationTime = $expirationTime;
    }

    /**
     * @return mixed
     */
    public function getActive() : bool
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active): void
    {
        $this->active = $active;
    }
}
