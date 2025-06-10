<?php

namespace App\Filament\Resources\LaboranResource\Pages;

use App\Filament\Resources\LaboranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaboran extends EditRecord
{
    protected static string $resource = LaboranResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if ($data['shift'] === 'Siang' && str_contains($data['lab'], ' dan ')) {
            [$data['lab_1'], $data['lab_2']] = explode(' dan ', $data['lab']);
        } else {
            $data['lab_1'] = $data['lab'];
            $data['lab_2'] = null;
        }

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return LaboranResource::getUrl();
    }

    // public function mutateFormDataBeforeSave(array $data): array
    // {
    //     $data['lab'] = $data['shift'] === 'Siang'
    //     ? $data['lab_1'] . ' dan ' . $data['lab_2']
    //     : $data['lab_1'];

    //     return $data;
    // }
    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\DeleteAction::make(),
    //     ];
    // }
}
