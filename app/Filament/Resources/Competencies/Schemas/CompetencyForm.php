<?php

namespace App\Filament\Resources\Competencies\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CompetencyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('role')
                    ->label('Nama Tingkatan / Skema (misal: Level Staf, Level Manager)')
                    ->required()
                    ->maxLength(255),
                TextInput::make('icon')
                    ->label('Ikon / Emoji')
                    ->placeholder('Contoh: ✓ atau 💼')
                    ->maxLength(50)
                    ->default(null),
                Textarea::make('text')
                    ->label('Cakupan Standar Kompetensi')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('sort_order')
                    ->label('Urutan Tampilan')
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label('Aktif / Tampilkan di Web')
                    ->default(true),
            ]);
    }
}
