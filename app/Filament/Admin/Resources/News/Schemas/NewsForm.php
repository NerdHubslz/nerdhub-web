<?php

namespace App\Filament\Admin\Resources\News\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('titulo')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->required()
                    ->readOnly(),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                Select::make('autor')
                    ->relationship('author', 'name')
                    ->default(auth()->id())
                    ->required(),
                FileUpload::make('imagem_url')
                    ->image()
                    ->directory('news-images')
                    ->columnSpanFull(),
                RichEditor::make('conteudo')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
