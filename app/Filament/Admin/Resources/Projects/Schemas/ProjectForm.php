<?php

namespace App\Filament\Admin\Resources\Projects\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('status')
                    ->required()
                    ->default('Em andamento'),
                TextInput::make('client_type'),
                Select::make('users')
                    ->multiple()
                    ->relationship('users', 'name')
                    ->searchable()
                    ->preload(),
                DatePicker::make('start_date'),
                Textarea::make('technologies')
                    ->columnSpanFull(),
                TextInput::make('progress')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('client_name'),
                FileUpload::make('image')
                    ->image(),
                Textarea::make('gallery')
                    ->columnSpanFull(),
                Textarea::make('documents')
                    ->columnSpanFull(),
            ]);
    }
}
