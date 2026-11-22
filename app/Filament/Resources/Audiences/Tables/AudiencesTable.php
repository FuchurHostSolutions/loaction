<?php

namespace App\Filament\Resources\Audiences\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AudiencesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order', 'asc')
            ->columns([
                TextColumn::make('number')
                    ->label('No')
                    ->badge()
                    ->color('primary')
                    ->sortable(),
                TextColumn::make('title')
                    ->label('Judul Audiens')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('text')
                    ->label('Deskripsi')
                    ->limit(70),
                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
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
