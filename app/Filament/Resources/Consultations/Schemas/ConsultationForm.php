<?php

namespace App\Filament\Resources\Consultations\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ConsultationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->searchable(),
                Select::make('optometrist_id')
                    ->relationship('optometrist', 'name')
                    ->searchable(),
                Textarea::make('message')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('reply')
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'open' => 'Open',
                        'answered' => 'Answered',
                        'closed' => 'Closed',
                    ])
                    ->required()
                    ->default('open'),
            ]);
    }
}
