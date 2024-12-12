<?php

declare(strict_types=1);

namespace Database\Seeders\Cars;

use App\Models\Cars\Model;
use Illuminate\Database\Seeder;

final class ModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        (new Model([
            'name' => 'Accord',
        ]))->save();

        (new Model([
            'name' => 'Civic'
        ]))->save();

        (new Model([
            'name' => 'Carrera'
        ]))->save();

        (new Model([
            'name' => 'Cayman'
        ]))->save();

        (new Model([
            'name' => 'Mustang GT'
        ]))->save();
    }
}