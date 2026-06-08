<?php

namespace App\Filament\Resources\EyeTests;

use App\Filament\Resources\EyeTests\Pages\CreateEyeTest;
use App\Filament\Resources\EyeTests\Pages\EditEyeTest;
use App\Filament\Resources\EyeTests\Pages\ListEyeTests;
use App\Filament\Resources\EyeTests\Schemas\EyeTestForm;
use App\Filament\Resources\EyeTests\Tables\EyeTestsTable;
use App\Models\EyeTest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EyeTestResource extends Resource
{
    protected static ?string $model = EyeTest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return EyeTestForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EyeTestsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEyeTests::route('/'),
            'create' => CreateEyeTest::route('/create'),
            'edit' => EditEyeTest::route('/{record}/edit'),
        ];
    }
}
