<?php

namespace App\Filament\Resources\HeadphoneResource\Pages;

use App\Filament\Resources\HeadphoneResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHeadphone extends EditRecord
{
    protected static string $resource = HeadphoneResource::class;

    protected function getRedirectUrl(): string
    {
        return HeadphoneResource::getUrl();
    }
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
