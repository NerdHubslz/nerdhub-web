<?php

namespace App\Filament\Admin\Resources\News\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Grid::make(3)
                    ->schema([
                        \Filament\Schemas\Components\Section::make('Conteúdo da Notícia')
                            ->description('Escreva o conteúdo principal do seu artigo')
                            ->columnSpan(3)
                            ->schema([
                                \Filament\Schemas\Components\Grid::make(1)
                                    ->schema([
                                        TextInput::make('titulo')
                                            ->required()
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                            ->label('Título'),
                                        TextInput::make('slug')
                                            ->required()
                                            ->readOnly(),
                                    ]),
                                RichEditor::make('conteudo')
                                    ->required()
                                    ->columnSpanFull()
                                    ->label('Conteúdo'),
                            ]),

                        \Filament\Schemas\Components\Section::make('Meta Dados')
                            ->description('Classificação e autoria')
                            ->columnSpan(4)
                            ->schema([
                                FileUpload::make('imagem_url')
                                    ->image()
                                    ->directory('news-images')
                                    ->columnSpanFull()
                                    ->label('Imagem de Capa'),
                                Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->required()
                                    ->label('Categoria'),
                                Select::make('autor')
                                    ->relationship('author', 'name')
                                    ->default(auth()->id())
                                    ->required()
                                    ->label('Autor'),
                            ]),
                    ]),
            ]);
    }
}
