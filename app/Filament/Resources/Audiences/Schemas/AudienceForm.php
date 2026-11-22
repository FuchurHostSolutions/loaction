<?php

namespace App\Filament\Resources\Audiences\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AudienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('number')
                    ->label('Nomor Urut / Kode (misal: 01)')
                    ->required()
                    ->maxLength(5),
                TextInput::make('title')
                    ->label('Judul Sasaran (Audiens)')
                    ->required()
                    ->maxLength(255),
                Textarea::make('text')
                    ->label('Deskripsi Singkat')
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
