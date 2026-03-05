<?php

namespace App\Filament\Admin\Resources\Projects\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Capa')
                    ->circular()
                    ->defaultImageUrl(url('/images/placeholder.png')),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->label('Projeto'),
                TextColumn::make('status')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Concluído' => 'success',
                        'Em andamento' => 'warning',
                        'Cancelado' => 'danger',
                        'Pausado' => 'info',
                        default => 'gray',
                    }),
                TextColumn::make('client_type')
                    ->searchable()
                    ->label('Tipo de Cliente')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('users_count')
                    ->counts('users')
                    ->label('Membros')
                    ->sortable(),
                TextColumn::make('start_date')
                    ->date('d/m/Y')
                    ->sortable()
                    ->label('Início'),
                TextColumn::make('progress')
                    ->numeric()
                    ->sortable()
                    ->suffix('%')
                    ->label('Progresso (%)'),
                TextColumn::make('client_name')
                    ->searchable()
                    ->label('Cliente'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status do Projeto')
                    ->options([
                        'Em andamento' => 'Em andamento',
                        'Concluído' => 'Concluído',
                        'Pausado' => 'Pausado',
                        'Cancelado' => 'Cancelado',
                    ])
                    ->native(false),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
