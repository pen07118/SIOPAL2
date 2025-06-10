<?php

namespace App\Filament\Resources\VGAResource\Pages;

use App\Filament\Resources\VGAResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVGA extends CreateRecord
{
    protected static string $resource = VGAResource::class;
    protected function getRedirectUrl(): string
    {
        return VGAResource::getUrl();
    }
}
