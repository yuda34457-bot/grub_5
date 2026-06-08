<?php

namespace App\Filament\Resources\TestResults\Tables;

use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TestResultsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('eyeTest.id')
                    ->searchable()
                    ->sortable()
                    ->label('Eye Test ID'),
                TextColumn::make('user.name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('left_eye_score')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('right_eye_score')
                    ->searchable()
                    ->sortable(),
                IconColumn::make('is_printed')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                \Filament\Tables\Actions\BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
