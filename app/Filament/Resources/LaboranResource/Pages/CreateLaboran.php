<?php

namespace App\Filament\Resources\LaboranResource\Pages;

use App\Filament\Resources\LaboranResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLaboran extends CreateRecord
{
    protected static string $resource = LaboranResource::class;

    // protected function getRedirectUrl(): string
    // {
    //     return $this->getResource()::getUrl('index');
    // }

    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['lab'] = $data['shift'] === 'Siang'
        ? $data['lab_1'] . ' dan ' . $data['lab_2']
        : $data['lab_1'];

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return LaboranResource::getUrl();
    }
}
