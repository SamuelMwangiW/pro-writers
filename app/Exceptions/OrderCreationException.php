<?php

namespace App\Exceptions;

use Exception;
use JetBrains\PhpStorm\Pure;

class OrderCreationException extends Exception
{
    #[Pure]
    public static function writersNotAllowed(): static
    {
        return new static('Writer users are not allowed to create orders');
    }
}
