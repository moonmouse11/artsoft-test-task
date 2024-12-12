<?php

declare(strict_types=1);

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use App\Models\Cars\Car;
use App\Services\Cars\CarService;
use Illuminate\Http\JsonResponse;

final class CarController extends Controller
{
    public function __construct(
        private readonly CarService $service
    ) {
    }

    public function index(): JsonResponse
    {
        return new JsonResponse(
            data: [
                'answer' => $this->service->getCars()
            ],
            status: 200

        );
    }

    public function show(Car $car): JsonResponse
    {
        return new JsonResponse(
            data: [
                'answer' => $this->service->getCar(car: $car)
            ],
            status: 200
        );
    }
}