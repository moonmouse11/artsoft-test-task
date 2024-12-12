<?php

declare(strict_types=1);

namespace App\Helpers\Credits;


use App\Data\Credits\CreditCalculateData;
use App\Models\Credits\Program;

final readonly class CreditCalculateHelper
{
    /**
     * @description Calculate monthly payment
     *
     * @param CreditCalculateData $creditCalculateData
     * @param Program|null $program
     * @return int
     */
    public static function getMonthlyPayment(CreditCalculateData $creditCalculateData, Program $program = null): int {
        if ($program !== null && $program->monthlyPayment !== null) {
            return $program->monthlyPayment;
        }

        return $creditCalculateData->monthlyPayment;
    }

    public static function checkCreditRules(array $creditRules, CreditCalculateData $creditCalculateData): bool
    {
        foreach ($creditRules as $rule => $value) {
            if (array_key_exists(key: 'min', array: $value) && $creditCalculateData->$rule <= $value['min']) {
                return false;
            }
            if (array_key_exists(key: 'max', array: $value) && $creditCalculateData->$rule >= $value['max']) {
                return false;
            }
        }

        return true;
    }

}