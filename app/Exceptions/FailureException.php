<?php


namespace App\Exceptions;


class FailureException extends \Exception
{
    private $data;
    public function __construct($message, $data = [], $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->data = $data;
    }

    public function getData() : Array
    {
        return $this->data;
    }
}
