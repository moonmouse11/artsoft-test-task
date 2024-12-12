<?php

declare(strict_types=1);

namespace App\Http\Controllers\Credits;

use App\Data\Credits\CreditCalculateData;
use App\Data\Credits\CreditRequestData;
use App\Exceptions\Cars\CarNotFoundException;
use App\Exceptions\Credits\CreditProgramNotFoundException;
use App\Helpers\Credits\CreditHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Credits\CalculateRequest;
use App\Http\Requests\Credits\CreditSaveRequest;
use App\Services\Credits\CreditService;
use Illuminate\Http\JsonResponse;
use Prettus\Validator\Exceptions\ValidatorException;

final class CreditController extends Controller
{
    public function __construct(
        private readonly CreditService $service
    ) {
    }

    public function calculate(CalculateRequest $calculateRequest): JsonResponse
    {
        $calculateRequest->validated();

        return new JsonResponse(
            data: [
                'answer' => $this->service->calculateCredit(
                    creditCalculateData: CreditCalculateData::from($calculateRequest->toArray()))
            ],
            status: 200
        );
    }

    public function save(CreditSaveRequest $creditSaveRequest): JsonResponse
    {
        try {
            $creditSaveRequest->validated();

            $creditRequestData = CreditRequestData::from($creditSaveRequest->toArray());

            CreditHelper::checkEntities(creditRequestData: $creditRequestData);

            return new JsonResponse(
                data: [
                    'success' => $this->service->saveRequest(creditRequestData: $creditRequestData)
                ],
                status: 200
            );
        } catch (CarNotFoundException|CreditProgramNotFoundException|ValidatorException $exception) {
            return new JsonResponse(
                data: [
                    'message' => $exception->getMessage()
                ],
                status: 422
            );
        }
    }
}
