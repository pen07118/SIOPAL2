<?php

namespace App\Filament\Resources\VGAResource\Pages;

use App\Filament\Resources\VGAResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVGAS extends ListRecords
{
    protected static string $resource = VGAResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
