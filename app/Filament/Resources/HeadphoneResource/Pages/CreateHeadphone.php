<?php

namespace App\Filament\Resources\HeadphoneResource\Pages;

use App\Filament\Resources\HeadphoneResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHeadphone extends CreateRecord
{
    protected static string $resource = HeadphoneResource::class;
    protected function getRedirectUrl(): string
    {
        return HeadphoneResource::getUrl();
    }
}
