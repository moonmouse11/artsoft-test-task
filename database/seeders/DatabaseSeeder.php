<?php

namespace Database\Seeders;

use Database\Seeders\Cars\BrandsSeeder;
use Database\Seeders\Cars\CarsSeeder;
use Database\Seeders\Cars\ModelsSeeder;
use Database\Seeders\Credits\ProgramsSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // seeders for local environment (dev)
        if (app()->isLocal()) {
            $this->call(class: BrandsSeeder::class);
            $this->call(class: ModelsSeeder::class);
            $this->call(class: CarsSeeder::class);
            $this->call(class: ProgramsSeeder::class);
        }
    }
}
