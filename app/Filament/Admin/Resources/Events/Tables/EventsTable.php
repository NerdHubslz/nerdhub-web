<?php

namespace App\Filament\Admin\Resources\Events\Tables;

use App\Models\Event;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EventsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->label('Título'),
                TextColumn::make('start_time')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->label('Início'),
                TextColumn::make('end_time')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->label('Término')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('location')
                    ->searchable()
                    ->label('Local'),
                ImageColumn::make('banner_image')
                    ->label('Banner')
                    ->square(),
                TextColumn::make('registration_link')
                    ->searchable()
                    ->label('Url Inscrição')
                    ->url(fn (Event $record) => $record->registration_link)
                    ->openUrlInNewTab()
                    ->copyable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
