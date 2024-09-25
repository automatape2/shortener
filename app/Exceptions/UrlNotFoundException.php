<?php

namespace App\Exceptions;

use Exception;

class UrlNotFoundException extends Exception
{
    protected $message = 'The short URL does not exist.';
}
