<?php

declare(strict_types=1);

namespace Database\Seeders\Credits;

use App\Models\Credits\Program;
use Illuminate\Database\Seeder;

final class ProgramsSeeder extends Seeder
{
    public function run(): void
    {
        (new Program([
            'title' => 'Default',
            'interest_rate' => 12.3
        ]))->save();

        (new Program([
            'title' => 'Alfa Energy',
            'interest_rate' => 12.5
        ]))->save();

        (new Program([
            'title' => 'Sberbank',
            'interest_rate' => 14.2
        ]))->save();
    }
}