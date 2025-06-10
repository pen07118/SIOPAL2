<?php

namespace App\Filament\Resources\ProcessorResource\Pages;

use App\Filament\Resources\ProcessorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProcessor extends CreateRecord
{
    protected static string $resource = ProcessorResource::class;
    protected function getRedirectUrl(): string
    {
        return ProcessorResource::getUrl();
    }
}
