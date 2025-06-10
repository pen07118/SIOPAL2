<?php

namespace App\Filament\Resources\KeyboardResource\Pages;

use App\Filament\Resources\KeyboardResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKeyboard extends CreateRecord
{
    protected function getRedirectUrl(): string
    {
        return KeyboardResource::getUrl();
    }
    protected static string $resource = KeyboardResource::class;
}
