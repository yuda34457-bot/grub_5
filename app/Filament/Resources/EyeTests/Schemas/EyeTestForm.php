<?php

namespace App\Filament\Resources\EyeTests\Schemas;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class EyeTestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable(),
                Select::make('type')
                    ->options([
                        'visus' => 'Visus',
                        'color_blind' => 'Color Blind',
                        'astigmatism' => 'Astigmatism',
                    ])
                    ->required(),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                    ])
                    ->required()
                    ->default('pending'),
                KeyValue::make('answers')
                    ->columnSpanFull(),
            ]);
    }
}
