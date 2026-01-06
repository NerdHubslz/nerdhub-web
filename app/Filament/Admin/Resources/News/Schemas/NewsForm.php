<?php

namespace App\Filament\Admin\Resources\News\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

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
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('news')
                    ->fileAttachmentsMaxSize(5000) //5mb
                    ->fileAttachmentsAcceptedFileTypes([
                        'image/png',
                        'image/jpeg',
                        'image/jpg',
                        'image/gif',

                    ]),
                FileUpload::make('imagem_url')->label("Cover")
                    ->disk('public')
                    ->directory('news')
                    ->getUploadedFileNameForStorageUsing(
                        fn (TemporaryUploadedFile $file): string => (string) Str::of($file->getClientOriginalName())
                            ->beforeLast('.')
                            ->slug()
                            ->append('-' . time() . '.' . $file->getClientOriginalExtension())
                    )
                    ->image()
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('1920')
                    ->imageResizeTargetHeight('1080')


            ]);
    }
}
