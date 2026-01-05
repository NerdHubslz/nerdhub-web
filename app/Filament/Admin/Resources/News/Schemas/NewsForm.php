<?php

namespace App\Filament\Admin\Resources\News\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('titulo')
                    ->label('Título'),
                    //->live(onBlur: true) // Atualiza o estado quando o usuário sai do campo
                    //->afterStateUpdated(fn($livewire, $get, $set, $component, $old, $new) => dd(compact([$livewire["data"], $get, $set, $component, $old, $new]))),

                RichEditor::make('conteudo')
                    ->label("Conteudo da Noticia")
                    ->columnSpanFull()
                    ->required()
                    ->fileAttachmentsMaxSize(5000) //5mb
                    ->fileAttachmentsAcceptedFileTypes([
                        'image/png',
                        'image/jpeg',
                        'image/jpg',
                        'image/gif',

                    ]),
                FileUpload::make('imagem_url')->label("Cover")
                    ->image()
                    ->imageEditor()
                    ->placeholder('https://placehold.co/600x400')
                    ->default('https://placehold.co/600x400'),


            ]);
    }
}
