<?php

namespace App\Filament\Resources\MonitorResource\Pages;

use App\Filament\Resources\MonitorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMonitor extends EditRecord
{
    protected static string $resource = MonitorResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $monitor = $this->getRecord();
        if ($monitor->resolution) {
            // Pisahkan resolution menjadi length dan width
            [$length, $width] = explode(' x ', $monitor->resolution);
            
            // Memodifikasi array $data dengan menambahkan length dan width
            $data['length'] = $length;
            $data['width'] = $width;
        }

        // Kembalikan data yang telah dimodifikasi
        return $data;
    }
    
    protected function getRedirectUrl(): string
    {
        return MonitorResource::getUrl();
    }
}