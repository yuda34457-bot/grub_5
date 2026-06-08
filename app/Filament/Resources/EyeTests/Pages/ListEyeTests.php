<?php

namespace App\Filament\Resources\EyeTests\Pages;

use App\Filament\Resources\EyeTests\EyeTestResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEyeTests extends ListRecords
{
    protected static string $resource = EyeTestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
