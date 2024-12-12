<?php

namespace App\Exceptions\Credits;

use Exception;

final class CreditProgramNotAcceptedException extends Exception
{
    protected $message = 'Credit program not accepted';

}