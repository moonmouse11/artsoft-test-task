<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get(uri: '/', action: static function () {
    return 'You clearly do something wrong';
});
