<?php

declare(strict_types=1);

namespace Database\Seeders\Cars;

use App\Models\Cars\Car;
use Illuminate\Database\Seeder;

final class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        (new Car([
            'photo' => '/images/cars/accord_1.jpg',
            'brand_id' => 1,
            'model_id' => 1,
            'price' => 1000000,
            'created_at' => now(),
            'updated_at' => now()
        ]))->save();

        (new Car([
            'photo' => '/images/cars/accord_2.jpg',
            'brand_id' => 1,
            'model_id' => 1,
            'price' => 2000000,
            'created_at' => now(),
            'updated_at' => now()
        ]))->save();

        (new Car([
            'photo' => '/images/cars/civic_1.jpg',
            'brand_id' => 1,
            'model_id' => 2,
            'price' => 1200000,
            'created_at' => now(),
            'updated_at' => now()
        ]))->save();

        (new Car([
            'photo' => '/images/cars/carrera_1.jpg',
            'brand_id' => 2,
            'model_id' => 3,
            'price' => 5000000,
            'created_at' => now(),
            'updated_at' => now()
        ]))->save();

        (new Car([
            'photo' => '/images/cars/carrera_2.jpg',
            'brand_id' => 2,
            'model_id' => 3,
            'price' => 6000000,
            'created_at' => now(),
            'updated_at' => now()
        ]))->save();

        (new Car([
            'photo' => '/images/cars/cayman_1.jpg',
            'brand_id' => 2,
            'model_id' => 4,
            'price' => 5000000,
            'created_at' => now(),
            'updated_at' => now()
        ]))->save();

        (new Car([
            'photo' => '/images/cars/mustang_1.jpg',
            'brand_id' => 3,
            'model_id' => 5,
            'price' => 4000000,
            'created_at' => now(),
            'updated_at' => now()
        ]))->save();
    }
}