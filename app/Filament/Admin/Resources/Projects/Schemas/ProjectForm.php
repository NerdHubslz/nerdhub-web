<?php

namespace App\Filament\Admin\Resources\Projects\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Informações Principais')
                    ->description('Dados fundamentais sobre o escopo do projeto')
                    ->schema([
                        \Filament\Schemas\Components\Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->label('Nome do Projeto'),
                                TextInput::make('client_name')
                                    ->label('Nome do Cliente'),
                                Select::make('client_type')
                                    ->label('Tipo de Cliente')
                                    ->options([
                                        'Projeto Interno' => 'Projeto Interno',
                                        'Projeto para Comunidade' => 'Projeto para Comunidade',
                                    ])
                                    ->native(false),
                                Select::make('status')
                                    ->required()
                                    ->label('Status')
                                    ->options([
                                        'Em andamento' => 'Em andamento',
                                        'Concluído' => 'Concluído',
                                        'Pausado' => 'Pausado',
                                        'Cancelado' => 'Cancelado',
                                    ])
                                    ->default('Em andamento')
                                    ->native(false),
                                Textarea::make('description')
                                    ->required()
                                    ->columnSpanFull()
                                    ->label('Descrição'),
                            ]),
                    ]),

                \Filament\Schemas\Components\Section::make('Prazos e Equipe')
                    ->description('Defina datas, membros alocados e nível de progresso')
                    ->schema([
                        \Filament\Schemas\Components\Grid::make(3)
                            ->schema([
                                DatePicker::make('start_date')
                                    ->label('Data de Início')
                                    ->native(false),
                                TextInput::make('progress')
                                    ->required()
                                    ->numeric()
                                    ->minValue(0)
                                    ->maxValue(100)
                                    ->suffix('%')
                                    ->default(0)
                                    ->label('Progresso (%)'),
                                Select::make('users')
                                    ->multiple()
                                    ->relationship('users', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->label('Membros da Equipe'),
                                TagsInput::make('technologies')
                                    ->columnSpanFull()
                                    ->label('Tecnologias Utilizadas')
                                    ->placeholder('Adicione uma tecnologia e pressione Enter'),
                            ]),
                    ]),

                \Filament\Schemas\Components\Section::make('Mídias e Detalhes')
                    ->description('Imagens e documentos relacionados ao projeto')
                    ->schema([
                        \Filament\Schemas\Components\Grid::make(1)
                            ->schema([
                                FileUpload::make('image')
                                    ->image()
                                    ->label('Imagem Principal'),
                                FileUpload::make('gallery')
                                    ->multiple()
                                    ->image()
                                    ->reorderable()
                                    ->appendFiles()
                                    ->directory(fn ($record) => $record ? "projects/{$record->id}/gallery" : 'projects/gallery')
                                    ->preserveFilenames()
                                    ->label('Galeria'),
                                FileUpload::make('documents')
                                    ->multiple()
                                    ->reorderable()
                                    ->appendFiles()
                                    ->directory(fn ($record) => $record ? "projects/{$record->id}/documents" : 'projects/documents')
                                    ->preserveFilenames()
                                    ->acceptedFileTypes([
                                        'application/pdf',
                                        'application/msword',
                                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                                        'application/zip',
                                        'text/plain',
                                        'image/jpeg',
                                        'image/png',
                                        'image/webp',
                                    ])
                                    ->downloadable()
                                    ->label('Documentos'),
                            ]),
                    ]),
            ]);
    }
}
