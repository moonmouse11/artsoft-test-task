<?php

declare(strict_types=1);

namespace App\Http\Controllers\Credits;

use App\Exceptions\Cars\CarNotFoundException;
use App\Exceptions\Credits\CreditProgramNotFoundException;
use App\Helpers\Credits\CreditHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Credits\CalculateRequest;
use App\Http\Requests\Credits\CreditSaveRequest;
use App\Services\Credits\CreditService;
use Illuminate\Http\JsonResponse;

final class CreditController extends Controller
{
    public function __construct(
        private readonly CreditService $service
    ) {
    }

    public function calculate(CalculateRequest $calculateRequest): JsonResponse
    {
        $calculateRequest->validated();

        $this->service->calculateCredit(creditData: $calculateRequest->toArray());

        return new JsonResponse(
            data: [
                'answer' => $this->service->calculateCredit(creditData: $calculateRequest->toArray())
            ],
            status: 200
        );
    }

    public function save(CreditSaveRequest $creditSaveRequest): JsonResponse
    {
        try {
            $creditSaveRequest->validated();

            CreditHelper::checkEntities(data: $creditSaveRequest->toArray());

            return new JsonResponse(
                data: [
                    'success' => $this->service->saveRequest(data: $creditSaveRequest->toArray())
                ],
                status: 200
            );
        } catch (CarNotFoundException|CreditProgramNotFoundException $exception) {
            return new JsonResponse(
                data: [
                    'message' => $exception->getMessage()
                ],
                status: 422
            );
        }
    }
}
