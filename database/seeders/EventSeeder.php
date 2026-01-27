<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Evento Futuro: Hackathon
        \App\Models\Event::create([
            'title' => 'Hackathon NerdHub 2026',
            'slug' => 'hackathon-nerdhub-2026',
            'description' => '<h2>O maior Hackathon da região!</h2><p>Venha participar de 48 horas de pura codificação, café e inovação. Prêmios incríveis para as melhores equipes.</p><ul><li>Mentoria com especialistas</li><li>Networking</li><li>Pizza grátis</li></ul>',
            'start_time' => now()->addMonths(2)->setHour(9)->setMinute(0),
            'end_time' => now()->addMonths(2)->addDays(2)->setHour(18)->setMinute(0),
            'location' => 'Hub de Inovação Central',
            'banner_image' => null, // Deixando null para testar o fallback ou user pode uploadar depois
            'registration_link' => 'https://sympla.com.br/hackathon-nerdhub',
        ]);

        // Evento Próximo: Meetup
        \App\Models\Event::create([
            'title' => 'Meetup: PHP Moderno',
            'slug' => 'meetup-php-moderno',
            'description' => '<p>Um encontro para discutir as novidades do PHP 8.3 e o ecossistema Laravel.</p>',
            'start_time' => now()->addDays(5)->setHour(19)->setMinute(30),
            'end_time' => now()->addDays(5)->setHour(22)->setMinute(0),
            'location' => 'Cafeteria Code & Coffee',
            'banner_image' => null,
            'registration_link' => null,
        ]);

        // Evento Passado: Workshop
        \App\Models\Event::create([
            'title' => 'Workshop: Introdução ao Filament',
            'slug' => 'workshop-filament',
            'description' => '<p>Aprenda a criar painéis administrativos incríveis em minutos.</p>',
            'start_time' => now()->subMonth()->setHour(14)->setMinute(0),
            'end_time' => now()->subMonth()->setHour(18)->setMinute(0),
            'location' => 'Online (Zoom)',
            'banner_image' => null,
            'registration_link' => 'https://youtube.com/gravacao-workshop',
        ]);    }
}
