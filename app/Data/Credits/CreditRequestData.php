<?php

declare(strict_types=1);

namespace App\Data\Credits;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\CamelCaseMapper;

#[MapName(CamelCaseMapper::class)]
final class CreditRequestData extends Data
{
    #[MapInputName('carId')]
    #[MapOutputName('car_id')]
    public int $carId;

    #[MapInputName('programId')]
    #[MapOutputName('program_id')]
    public int $programId;

    #[MapInputName('initialPayment')]
    #[MapOutputName('initial_payment')]
    public int $initialPayment;

    #[MapInputName('loanTerm')]
    #[MapOutputName('loan_term')]
    public int $loanTerm;
}