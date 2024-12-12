<?php

declare(strict_types=1);

namespace App\Services\Credits;

use App\Data\Credits\CreditCalculateData;
use App\Data\Credits\CreditRequestData;
use App\Helpers\Credits\CalculateCreditHelper;
use App\Repositories\Credits\CreditRepository;
use Prettus\Validator\Exceptions\ValidatorException;

final readonly class CreditService
{

    public function __construct(
        private readonly CreditRepository $creditRepository
    ) {
    }

    public function calculateCredit(CreditCalculateData $creditCalculateData): array
    {
        $creditProgram = $this->getCreditProgram(creditCalculateData: $creditCalculateData);

        return [
            'programId' => $creditProgram->id,
            'interestRate' => $creditProgram->interest_rate,
            'monthlyPayment' => CalculateCreditHelper::calculateMonthlyPayment(creditData: $creditData, creditProgramId: $creditProgram->id),
            'title' => $creditProgram->title
        ];
    }

    /**
     * @throws ValidatorException
     */
    public function saveRequest(CreditRequestData $creditRequestData): bool
    {
        return (bool)$this->creditRepository->create(
            $creditRequestData->toArray()
        );
    }

    private function getCreditProgram(CreditCalculateData $creditCalculateData): Program
    {
        dd($creditCalculateData->toArray());
    }
}