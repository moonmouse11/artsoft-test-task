<?php

declare(strict_types=1);

namespace App\Repositories\Credits;

use App\Models\Credits\Program;
use Prettus\Repository\Eloquent\BaseRepository;

final class ProgramRepository extends BaseRepository
{
    public function model(): string
    {
        return Program::class;
    }
}