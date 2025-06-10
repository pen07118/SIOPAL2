<?php

namespace App\Filament\Resources\InventoryResource\Pages;

use App\Filament\Resources\InventoryResource;
use App\Models\PCInventory;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Filament\Tables\Actions\CreateAction;
// use Filament\Actions\CreateAction;

class LabInventoryPage extends ListRecords
{
    protected static string $resource = InventoryResource::class;

    public ?int $labId = null;

    // public function mount($lab): void
    // {
    //     $this->labId = $lab;
    //     abort_unless($this->getLab(), 404);
    // }

    public function mount(): void
{
    $this->labId = request()->route('lab');
    abort_unless($this->getLab(), 404);
}

    protected function getTableQuery(): Builder
    {
        return PCInventory::query()->where('lab_id', $this->labId);
    }

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         \Filament\Tables\Actions\CreateAction::make()->mutateFormDataUsing(function (array $data) {
    //             $data['lab_id'] = $this->labId;
    //             return $data;
    //         }),
    //     ];
    // }

//     protected function getTableHeaderActions(): array
// {
//     return [
//         Tables\Actions\CreateAction::make()
//             ->mutateFormDataUsing(function (array $data) {
//                 $data['lab_id'] = $this->labId;
//                 return $data;
//             })
//             ->label('New Inventory'),
//     ];
// }

    protected function getTableHeaderActions(): array
    {
        return [
            Tables\Actions\CreateAction::make()
                ->url(fn () => route('filament.dashboard.resources.inventory.create', ['lab' => $this->labId]))
                ->label('New Inventory'),
        ];
    }

    public function getTitle(): string
    {
        return 'Inventory Lab ' . optional($this->getLab())->lab_name;
    }

    private function getLab()
    {
        return \App\Models\Lab::find($this->labId);
    }
}