<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Reflexões',
            'Crescimento Pessoal',
            'Psicologia',
            'Viagem',
            'Filosofia',
            'Criação de Conteúdo',
            'Filosofia da Tecnologia',
            'Conselhos de Carreira',
            'Ciência da Computação',
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['slug' => Str::slug($category)],
                ['name' => $category]
            );
        }
    }
}
