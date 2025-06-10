<?php

namespace App\Filament\Resources\LaboranResource\Pages;

use App\Filament\Resources\LaboranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaborans extends ListRecords
{
    protected static string $resource = LaboranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
