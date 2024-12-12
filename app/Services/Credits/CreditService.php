<?php

declare(strict_types=1);

namespace App\Services\Credits;

use App\Data\Credits\CreditCalculateData;
use App\Data\Credits\CreditRequestData;
use App\Exceptions\Credits\CreditProgramNotAcceptedException;
use App\Helpers\Credits\CreditCalculateHelper;
use App\Models\Credits\Program;
use App\Repositories\Credits\CreditRepository;
use App\Repositories\Credits\ProgramRepository;
use Illuminate\Database\Eloquent\Collection;
use Prettus\Validator\Exceptions\ValidatorException;

final readonly class CreditService
{
    public function __construct(
        private readonly CreditRepository $creditRepository,
        private readonly ProgramRepository $programRepository
    ) {
    }

    /**
     * @throws CreditProgramNotAcceptedException
     */
    public function calculateCredit(CreditCalculateData $creditCalculateData): array
    {
        $creditProgramsCollection = $this->getAcceptedPrograms(creditCalculateData: $creditCalculateData);

        if ($creditProgramsCollection === null) {
            throw new CreditProgramNotAcceptedException();
        }

        $creditProgram = $this->getBestProgram(creditProgramsCollection: $creditProgramsCollection);

        return [
            'programId' => $creditProgram->id,
            'interestRate' => $creditProgram->interest_rate,
            'monthlyPayment' => CreditCalculateHelper::getMonthlyPayment(
                creditCalculateData: $creditCalculateData,
                program: $creditProgram
            ),
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

    private function getAcceptedPrograms(CreditCalculateData $creditCalculateData): Collection|\Illuminate\Support\Collection|null
    {
        return $this->programRepository->all()
            ->filter(callback: function (Program $program) use ($creditCalculateData) {
                if ($program->rule === null) {
                    return $program;
                }

                if(CreditCalculateHelper::checkCreditRules(
                    creditRules: json_decode(
                        json: $program->rule,
                        associative: true,
                        depth: 512,
                        flags: JSON_THROW_ON_ERROR
                    ),
                    creditCalculateData: $creditCalculateData
                )) {
                    return $program;
                }
            });
    }

    private function getBestProgram(Collection|\Illuminate\Support\Collection $creditProgramsCollection): Program
    {
        return $creditProgramsCollection->where(key: 'title', operator: '=', value: 'Default')->first()
            ?? $creditProgramsCollection->random();

    }
}