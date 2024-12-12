<?php

declare(strict_types=1);

namespace App\Services\Cars;

use App\Models\Cars\Car;
use App\Repositories\Cars\CarRepository;
use Illuminate\Database\Eloquent\Collection;

final readonly class CarService
{
    public function __construct(
        private readonly CarRepository $carsRepository
    ) {
    }

    public function getCars(): Collection
    {
        return $this->carsRepository->with(relations: ['brand', 'model'])->all();
    }

    public function getCar(Car $car): Car|null
    {
        return $this->carsRepository->with(relations: ['brand', 'model'])->find(id: $car->id);
    }
}
