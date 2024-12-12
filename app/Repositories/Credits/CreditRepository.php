<?php

declare(strict_types=1);

namespace App\Repositories\Credits;

use App\Models\Credits\Credit;
use Prettus\Repository\Eloquent\BaseRepository;

class CreditRepository extends BaseRepository
{

    public function model(): string
    {
        return Credit::class;
    }
}