<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['Em andamento', 'Concluído', 'Planejamento']),
            'client_type' => $this->faker->randomElement(['Curso', 'Empresa', 'Institucional']),
            'member_count' => $this->faker->numberBetween(1, 10),
            'start_date' => $this->faker->date(),
            'technologies' => $this->faker->randomElements(['React', 'Laravel', 'Tailwind', 'Vue', 'Node.js', 'PostgreSQL'], 3),
            'progress' => $this->faker->numberBetween(0, 100),
            'client_name' => $this->faker->company,
            'gallery' => [
                'https://picsum.photos/seed/' . $this->faker->uuid . '/800/600',
                'https://picsum.photos/seed/' . $this->faker->uuid . '/800/600',
                'https://picsum.photos/seed/' . $this->faker->uuid . '/800/600',
            ],
            'documents' => [
                ['name' => 'Especificação Técnica.pdf', 'url' => '#', 'size' => '2.4 MB'],
                ['name' => 'Cronograma.xlsx', 'url' => '#', 'size' => '1.1 MB'],
            ],
        ];
    }
}