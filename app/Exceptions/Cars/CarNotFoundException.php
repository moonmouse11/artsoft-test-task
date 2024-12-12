<?php

declare(strict_types=1);

namespace App\Exceptions\Cars;

use Exception;

final class CarNotFoundException extends Exception
{
    protected $message = 'Car with this id not found';
}