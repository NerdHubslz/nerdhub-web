<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EducatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure 'Educador' role exists
        $role = Role::firstOrCreate(
            ['name' => 'Educador'],
            ['description' => 'Professores e Coordenadores do curso']
        );

        // Create some educators
        $educators = [
            [
                'name' => 'Suzane',
                'last_name' => 'Carvalho',
                'email' => 'suzane.educador@nerdhub.com',
                'password' => Hash::make('password'),
                'position' => 'Coordenador',
                'bio' => 'Coordenadora do curso de Ciência da Computação. Apaixonada por tecnologia e educação.',
                'avatar' => 'images/educadores/suzanecarvalho.jpg',
            ],
            [
                'name' => 'Atonio',
                'last_name' => 'Reis',
                'email' => 'tonio.educador@nerdhub.com',
                'password' => Hash::make('password'),
                'position' => 'Professor(a)',
                'bio' => 'Professor(a) de Redes e Segurança. apaixonado por tecnologia e educação.',
                'avatar' => 'images/educadores/atonioreis.jpg',
            ],
            [
                'name' => 'Arlison',
                'last_name' => 'Wady',
                'email' => 'arlison.educador@nerdhub.com',
                'password' => Hash::make('password'),
                'position' => 'Professor(a)',
                'bio' => 'Especialista em Engenharia de Software e Banco de Dados. ',
                'avatar' => 'images/educadores/arlisonwady.jpg',
            ],

        ];

        foreach ($educators as $educatorData) {
            $user = User::updateOrCreate(
                ['email' => $educatorData['email']],
                $educatorData
            );

            // Attach role if not already attached
            if (! $user->roles()->where('name', 'Educador')->exists()) {
                $user->roles()->attach($role);
            }
        }
    }
}
