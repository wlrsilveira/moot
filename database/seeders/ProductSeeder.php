<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Notebook Dell Inspiron',
                'price' => 3500.00,
                'photo' => 'notebook.avif',
                'category_id' => 1,
                'brand_id' => 2,
            ],
            [
                'name' => 'Smartphone Samsung Galaxy',
                'price' => 2200.00,
                'photo' => 'galaxy.jpg',
                'category_id' => 1,
                'brand_id' => 1,
            ],
            [
                'name' => 'Fone de Ouvido JBL',
                'price' => 299.90,
                'photo' => 'jbl.jpg',
                'category_id' => 1,
                'brand_id' => 3,
            ],
        ];

        foreach ($products as $data) {
            Product::updateOrCreate(
                ['name' => $data['name']],
                $data
            );
        }
    }
}
