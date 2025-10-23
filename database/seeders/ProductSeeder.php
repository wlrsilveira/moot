<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $brandIds = Brand::pluck('id')->toArray();
        $categoryIds = Category::pluck('id')->toArray();

        $products = [
            [
                'name' => 'Notebook Dell Inspiron',
                'price' => 3500.00,
            ],
            [
                'name' => 'Smartphone Samsung Galaxy',
                'price' => 2200.00,
            ],
            [
                'name' => 'Fone de Ouvido JBL',
                'price' => 299.90,
            ],
        ];

        foreach ($products as $data) {
            $data['brand_id'] = $brandIds[array_rand($brandIds)];
            $data['category_id'] = $categoryIds[array_rand($categoryIds)];

            Product::updateOrCreate(
                ['name' => $data['name']],
                $data
            );
        }
    }
}
