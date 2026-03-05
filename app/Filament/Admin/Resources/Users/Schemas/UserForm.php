<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('Informações Básicas')
                    ->description('Dados essenciais para acesso e identificação do usuário.')
                    ->schema([
                        \Filament\Schemas\Components\Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->required()
                                    ->label('Nome Completo'),
                                TextInput::make('email')
                                    ->label('Endereço de E-mail')
                                    ->email()
                                    ->required(),
                                TextInput::make('last_name')
                                    ->label('Sobrenome'),
                                TextInput::make('password')
                                    ->password()
                                    ->required(),
                                TextInput::make('position')
                                    ->label('Cargo / Posição'),
                                DateTimePicker::make('email_verified_at')
                                    ->label('Data de Verificação de E-mail'),
                            ]),
                    ]),

                \Filament\Schemas\Components\Section::make('Perfil e Biografia')
                    ->description('Informações públicas que aparecerão na plataforma.')
                    ->schema([
                        \Filament\Schemas\Components\Grid::make(1)
                            ->schema([
                                FileUpload::make('avatar')
                                    ->avatar()
                                    ->imageEditor()
                                    ->circleCropper()
                                    ->label('Foto de Perfil'),
                                Textarea::make('bio')
                                    ->label('Biografia')
                                    ->rows(4),
                            ]),
                    ]),
            ]);
    }
}
