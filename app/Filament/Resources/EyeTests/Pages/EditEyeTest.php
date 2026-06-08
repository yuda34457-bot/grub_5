<?php

namespace App\Filament\Resources\EyeTests\Pages;

use App\Filament\Resources\EyeTests\EyeTestResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEyeTest extends EditRecord
{
    protected static string $resource = EyeTestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
