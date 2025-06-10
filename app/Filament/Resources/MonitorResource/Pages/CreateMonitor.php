<?php

namespace App\Filament\Resources\MonitorResource\Pages;

use App\Filament\Resources\MonitorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMonitor extends CreateRecord
{
    protected static string $resource = MonitorResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
{
    // Cek apakah key-nya ada dulu
    if (array_key_exists('length', $data) && array_key_exists('width', $data)) {
        $data['resolution'] = "{$data['length']} x {$data['width']}";

        // Hapus dari data jika tidak ingin simpan ke DB
        unset($data['length'], $data['width']);
    }

    return $data;
    // return MonitorResource::getUrl();

}
}