<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            'Positivo',
            'Dell',
            'Bic',
            'Adidas',
        ];

        foreach ($brands as $description) {
            Brand::updateOrCreate(
                ['description' => $description],
                ['description' => $description]
            );
        }
    }
}
