<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
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
                'name' => 'Bruno',
                'last_name' => 'Carvalho',
                'email' => 'bruno.educador@nerdhub.com',
                'password' => Hash::make('password'),
                'position' => 'Coordenador',
                'bio' => 'Coordenador do curso de Ciência da Computação. Apaixonado por tecnologia e educação.',
                'avatar' => 'images/educadores/antonioreis.jpg' 
            ],
            [
                'name' => 'Ana',
                'last_name' => 'Silva',
                'email' => 'ana.educador@nerdhub.com',
                'password' => Hash::make('password'),
                'position' => 'Professor(a)',
                'bio' => 'Mestra em Inteligência Artificial e professora de Algoritmos.',
                'avatar' => 'images/educadores/suzanecarvalho.jpg'
            ],
            [
                'name' => 'Carlos',
                'last_name' => 'Souza',
                'email' => 'carlos.educador@nerdhub.com',
                'password' => Hash::make('password'),
                'position' => 'Professor(a)',
                'bio' => 'Especialista em Engenharia de Software e Banco de Dados.',
                'avatar' => 'images/educadores/arlisonwady.jpg' 
            ],
             [
                'name' => 'Fernanda',
                'last_name' => 'Lima',
                'email' => 'fernanda.educador@nerdhub.com',
                'password' => Hash::make('password'),
                'position' => 'Professor(a)',
                'bio' => 'Doutora em Redes de Computadores e Segurança da Informação.',
                'avatar' => 'images/avatar.png' // Fallback to default
            ],
        ];

        foreach ($educators as $educatorData) {
            $user = User::updateOrCreate(
                ['email' => $educatorData['email']],
                $educatorData
            );
            
            // Attach role if not already attached
            if (!$user->roles()->where('name', 'Educador')->exists()) {
                $user->roles()->attach($role);
            }
        }
    }
}