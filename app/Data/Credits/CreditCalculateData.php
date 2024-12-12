<?php

declare(strict_types=1);

namespace App\Data\Credits;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\CamelCaseMapper;

#[MapName(CamelCaseMapper::class)]
final class CreditCalculateData extends Data
{
    #[MapInputName('price')]
    #[MapOutputName('price')]
    public int $price;

    #[MapInputName('initialPayment')]
    #[MapOutputName('initial_payment')]
    public float $initialPayment;

    #[MapInputName('loanTerm')]
    #[MapOutputName('loan_term')]
    public int $loanTerm;
}