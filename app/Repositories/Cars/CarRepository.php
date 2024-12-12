<?php

namespace App\Repositories\Cars;

use App\Models\Cars\Car;
use Prettus\Repository\Eloquent\BaseRepository;

class CarRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Car::class;
    }
}