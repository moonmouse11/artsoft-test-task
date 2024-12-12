<?php

declare(strict_types=1);

namespace Database\Seeders\Cars;

use App\Models\Cars\Brand;
use Illuminate\Database\Seeder;

final class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        (new Brand([
            'name' => 'Honda',
        ]))->save();

        (new Brand([
            'name' => 'Porche',
        ]))->save();

        (new Brand([
            'name' => 'Ford',
        ]))->save();
    }
}
