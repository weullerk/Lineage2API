<?php


namespace App\Contracts\Models\Account;


interface ResetPasswordModelContract
{
    public function getEmail() : string;
    public function setEmail($email): void;
    public function getNewPassword() : string;
    public function setNewPassword(string $newPassword): void;
    public function getConfirmPassword() : string;
    public function setConfirmPassword(string $confirmPassword): void;
}
