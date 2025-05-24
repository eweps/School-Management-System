<?php

namespace App\Exceptions;

use Exception;

class CannotDeleteUsedResourceException extends Exception
{
    public function __construct($resource = 'Resource')
    {
        parent::__construct("Cannot delete $resource because it is in use");
    }
}
