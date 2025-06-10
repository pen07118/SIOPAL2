<?php

namespace App\Filament\Resources\DVDResource\Pages;

use App\Filament\Resources\DVDResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDVDS extends ListRecords
{
    protected static string $resource = DVDResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
