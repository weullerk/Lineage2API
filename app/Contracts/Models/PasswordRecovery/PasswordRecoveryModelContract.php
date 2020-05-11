<?php


namespace App\Contracts\Models\PasswordRecovery;


interface PasswordRecoveryModelContract
{
    function getId() : int;
    function setId(int $id);

    function getLogin() : string;
    function setLogin(string $login);

    function getToken() : string;
    function setToken(string $token);

    function getExpirationTime() : string;
    function setExpirationTime(string $expirationTime);

    function getActive() : bool;
    function setActive(bool $active);
}
