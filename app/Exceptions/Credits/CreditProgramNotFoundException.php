<?php

declare(strict_types=1);

namespace App\Exceptions\Credits;

use Exception;

final class CreditProgramNotFoundException extends Exception
{
    protected $message = 'Credit program with this id not found';

}