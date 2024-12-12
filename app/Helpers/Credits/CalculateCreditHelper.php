<?php

declare(strict_types=1);

namespace App\Helpers\Credits;

use App\Models\Credits\Program;
use Random\RandomException;

final readonly class CalculateCreditHelper
{
    /**
     * @description Calculate monthly payment
     *
     * @param array $creditData
     * @param int|null $creditProgramId
     *
     * @return int
     */
    public static function calculateMonthlyPayment(array $creditData, int $creditProgramId = null): int
    {
        if ($creditProgramId === 1) {
            return 9800;
        }

        return (int)(($creditData['price'] - $creditData['initialPayment']) / $creditData['loanTerm']);
    }

    /**
     * @description Get credit program
     *
     * @param array $creditData
     *
     * @return Program
     *
     * @throws RandomException
     */
    public static function getCreditProgram(array $creditData): Program
    {
        if (self::checkBestProgram(creditData: $creditData)) {
            return Program::where(column: 'title', operator: '=', value: 'Default')->firstOrFail();
        }

        $programs = Program::whereNot(column: 'title', operator: '=', value: 'Default');

        return $programs->get()[random_int(min: 0, max: $programs->count() - 1)];
    }

    /**
     * @description Check credit data for best credit program
     *
     * @param array $creditData
     *
     * @return bool
     */
    private static function checkBestProgram(array $creditData): bool
    {
        return $creditData['initialPayment'] > 200000 &&
            self::calculateMonthlyPayment(creditData: $creditData) < 10000 &&
            $creditData['loanTerm'] < 5 * 12;
    }


}