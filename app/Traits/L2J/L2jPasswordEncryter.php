<?php

namespace App\Traits\L2J;

trait L2jPasswordEncryter
{
    //final MessageDigest md = MessageDigest.getInstance("SHA");
    //final byte[] raw = password.getBytes(StandardCharsets.UTF_8);
    //final String hashBase64 = Base64.getEncoder().encodeToString(md.digest(raw));
    public function l2jPasswordEncrypt($password) : string
    {
        return base64_encode(pack('H*', sha1($password)));
    }
}
