<?php

namespace App\Filament\Resources\InventoryResource\Pages;

use App\Filament\Resources\InventoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInventory extends CreateRecord
{
    protected static string $resource = InventoryResource::class;

    public ?int $labId = null;

    public function mount(): void
    {
        parent::mount();

        $this->labId = request()->query('lab');
    }

        protected function mutateFormDataBeforeCreate(array $data): array
    {
        if ($this->labId) {
            $data['lab_id'] = $this->labId;
        }

        return $data;
    }
}
