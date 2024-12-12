<?php

declare(strict_types=1);

use App\Http\Controllers\Cars\CarController;
use App\Http\Controllers\Credits\CreditController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(callback: static function () {
    Route::prefix('cars')->group(callback: static function () {
        Route::get(uri: '/', action: [CarController::class, 'index'])->name(name: 'cars.index');
        Route::get(uri: '/{car}', action: [CarController::class, 'show'])->name(name: 'cars.show');
    });
    Route::get(uri: 'credit/calculate', action: [CreditController::class, 'calculate'])->name(name: 'credit.calculate');
    Route::post(uri: 'request', action: [CreditController::class, 'save'])->name(name: 'credit.save');
});
