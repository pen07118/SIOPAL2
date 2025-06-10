<?php

namespace App\Filament\Resources\HeadphoneResource\Pages;

use App\Filament\Resources\HeadphoneResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHeadphones extends ListRecords
{
    protected static string $resource = HeadphoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
