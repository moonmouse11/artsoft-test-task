<?php

declare(strict_types=1);

namespace App\Services\Credits;

use App\Helpers\Credits\CalculateCreditHelper;
use App\Repositories\Credits\CreditRepository;
use Prettus\Validator\Exceptions\ValidatorException;
use Random\RandomException;

final readonly class CreditService
{

    public function __construct(
        private readonly CreditRepository $creditRepository
    ) {
    }

    /**
     * @throws RandomException
     */
    public function calculateCredit(array $creditData): array
    {
        $creditProgram = CalculateCreditHelper::getCreditProgram(creditData: $creditData);

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
    public function saveRequest(array $data): bool
    {
        return (bool)$this->creditRepository->create([
            'program_id' => $data['programId'],
            'car_id' => $data['carId'],
            'initial_payment' => $data['initialPayment'],
            'loan_term' => $data['loanTerm']
        ]);
    }
}