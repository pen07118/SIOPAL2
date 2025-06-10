<?php

namespace App\Filament\Resources\DashboardResource\Pages;

use App\Filament\Resources\DashboardResource;
use Filament\Resources\Pages\Page;
use Filament\Navigation\NavigationItem;
use Filament\Forms;
use Filament\Navigation\NavigationGroup;    
use App\Models\Lab;



class LabInventoryDetail1 extends Page
{
    protected static string $resource = DashboardResource::class;
    protected static ?string $slug = 'lab-inventory-detail';
    protected static ?string $navigationLabel = 'Lab Inventory Detail';
    protected static ?string $navigationGroup = 'Lab Inventory';

    protected static string $view = 'filament.resources.dashboard-resource.pages.lab-inventory-detail';

    public Lab $lab;

    public function mount(Lab $lab): void
    {
        $this->subNavigation= [];
        $this->lab = Lab::findOrFail($lab);
    }

    public function getViewData(): array
{
    return [
        'subNavigation' => $this->getSubNavigation(),
    ];
}

    public function getSubNavigation(): array
    {
        return [
            NavigationItem::make('Inventory')
                // ->url(route('filament.dashboard.pages.lab-inventory-detail', ['lab' => $this->lab->id]))
                ->url(LabInventoryDetail::getUrl(['lab' => $lab->id]))
                ->icon('heroicon-o-server'),
            // NavigationItem::make('Settings')
            //     ->url(route('filament.dashboard.pages.lab-inventory-detail.settings', ['lab' => $this->lab->id]))
            //     ->icon('heroicon-o-cog'),
        ];
    }

    public function getTitle(): string
    {
        return 'Lab Inventory Detail';
    }
    
}
