<?php

namespace App\Filament\Resources\TestResults\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TestResultForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('eye_test_id')
                    ->relationship('eyeTest', 'id')
                    ->required()
                    ->searchable(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable(),
                TextInput::make('left_eye_score')
                    ->maxLength(255),
                TextInput::make('right_eye_score')
                    ->maxLength(255),
                Textarea::make('diagnosis')
                    ->columnSpanFull(),
                Textarea::make('recommendation')
                    ->columnSpanFull(),
                Toggle::make('is_printed')
                    ->required()
                    ->default(false),
                DateTimePicker::make('printed_at'),
            ]);
    }
}
