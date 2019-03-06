<?php
namespace Pth\Exceptions;

class RedisException extends \Exception{
    protected $message = '';
    protected $code = '';
}