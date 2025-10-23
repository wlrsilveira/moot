<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Tecnologia',
            'Educação',
            'Saúde',
            'Esportes',
            'Entretenimento',
        ];

        foreach ($categories as $description) {
            Category::updateOrCreate(
                ['description' => $description],
                ['description' => $description]
            );
        }
    }
}
