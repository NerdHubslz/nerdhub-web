<?php

namespace App\Filament\Admin\Resources\Events\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Detalhes do Evento')
                    ->description('Forneça as informações principais de exibição do evento')
                    ->schema([
                        \Filament\Schemas\Components\Grid::make(2)
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                    ->label('Título'),
                                TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true),
                                RichEditor::make('description')
                                    ->required()
                                    ->columnSpanFull()
                                    ->label('Descrição'),
                            ]),
                    ]),

                \Filament\Schemas\Components\Section::make('Data e Local')
                    ->description('Quando e onde o evento ocorrerá')
                    ->schema([
                        \Filament\Schemas\Components\Grid::make(2)
                            ->schema([
                                DateTimePicker::make('start_time')
                                    ->required()
                                    ->label('Data de Início'),
                                DateTimePicker::make('end_time')
                                    ->label('Data de Término'),
                                TextInput::make('location')
                                    ->required()
                                    ->columnSpanFull()
                                    ->label('Localização'),
                            ]),
                    ]),

                \Filament\Schemas\Components\Section::make('Mídia e Inscrição')
                    ->description('Artes visuais e links externos')
                    ->schema([
                        \Filament\Schemas\Components\Grid::make(2)
                            ->schema([
                                FileUpload::make('banner_image')
                                    ->image()
                                    ->directory('event-banners')
                                    ->label('Imagem de Banner'),
                                TextInput::make('registration_link')
                                    ->url()
                                    ->label('Link de Inscrição'),
                            ]),
                    ]),
            ]);
    }
}
