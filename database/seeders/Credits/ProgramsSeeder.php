<?php

declare(strict_types=1);

namespace Database\Seeders\Credits;

use App\Models\Credits\Program;
use Illuminate\Database\Seeder;
use JsonException;

final class ProgramsSeeder extends Seeder
{
    /**
     * @throws JsonException
     */
    public function run(): void
    {
        (new Program([
            'title' => 'Default',
            'interest_rate' => 12.3,
            'rule' => json_encode(value: [
                'initialPayment' => [
                    'min' => 200000,
                ],
                'monthlyPayment' => [
                    'min' => 1000,
                    'max' => 10000,
                ],
                'loanTerm' => [
                    'min' => 12,
                    'max' => 60,
                ]
            ], flags: JSON_THROW_ON_ERROR),
            'monthly_payment' => 9800
        ]))->save();

        (new Program([
            'title' => 'Alfa Energy',
            'interest_rate' => 12.5,
            'rule' => null,
            'monthly_payment' => null
        ]))->save();

        (new Program([
            'title' => 'Sberbank',
            'interest_rate' => 14.2,
            'rule' => null,
            'monthly_payment' => null
        ]))->save();
    }
}