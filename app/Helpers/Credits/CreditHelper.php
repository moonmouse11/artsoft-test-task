<?php

declare(strict_types=1);

namespace App\Helpers\Credits;

use App\Data\Credits\CreditRequestData;
use App\Exceptions\Cars\CarNotFoundException;
use App\Exceptions\Credits\CreditProgramNotFoundException;
use App\Models\Cars\Car;
use App\Models\Credits\Program;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final readonly class CreditHelper
{
    /**
     * @description Check if credit program and car exists
     *
     * @param CreditRequestData $creditRequestData
     * @return void
     *
     * @throws CarNotFoundException
     * @throws CreditProgramNotFoundException
     */
    public static function checkEntities(CreditRequestData $creditRequestData): void
    {
        self::checkProgram(programId: $creditRequestData->programId);
        self::checkCar(carId: $creditRequestData->carId);
    }

    /**
     * @description Check if credit program exists
     *
     * @param int $programId
     *
     * @return void
     *
     * @throws CreditProgramNotFoundException
     */
    private static function checkProgram(int $programId): void
    {
        try {
            Program::findOrFail($programId);
        } catch (ModelNotFoundException $exception) {
            throw new CreditProgramNotFoundException();
        }
    }

    /**
     * @description Check if car exists
     *
     * @param int $carId
     *
     * @return void
     *
     * @throws CarNotFoundException
     */
    private static function checkCar(int $carId): void
    {
        try {
            Car::findOrFail($carId);
        } catch (ModelNotFoundException $exception) {
            throw new CarNotFoundException();
        }
    }

}