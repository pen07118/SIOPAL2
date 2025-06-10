<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use App\Models\Lab; // Pastikan model Lab sudah ada
use App\Filament\Resources\LaboranResource;
use App\Filament\Resources\LabResource;
use App\Filament\Resources\MotherboardResource;
use App\Filament\Resources\ProcessorResource;
use App\Filament\Resources\VGAResource;
use App\Filament\Resources\RAMResource;
use App\Filament\Resources\StorageResource;
use App\Filament\Resources\PSUResource;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    // public function boot(): void
    // {
    //     Filament::serving(function () {

    //         // NavigationGroup 
    //         Filament::registerNavigationGroups([
    //             NavigationGroup::make()->label('Data Management'),
    //             NavigationGroup::make()->label('Hardware Master Data'),
    //             NavigationGroup::make()->label('Peripheral Master Data'),
    //             NavigationGroup::make()->label('Lab Inventory'), // Dinamis bisa di bawah semua
    //         ]);
        

    //         // Ambil semua lab dari database
    //         $labs = Lab::all();
    
    //         // Looping dan buat submenu untuk masing-masing lab
    //         Filament::registerNavigationItems(
    //             $labs->map(fn ($lab) => NavigationItem::make()
    //                 ->label('Lab ' . $lab->lab_name)
    //                 // ->url(route('filament.dashboard.pages.lab-inventory-detail', ['lab' => $lab->id]))
    //                 ->url(fn () => route('filament.dashboard.resources.inventory.lab', ['lab' => $lab->id]))
    //                 ->group('Lab Inventory')
    //                 ->icon('heroicon-o-server')
    //             )->toArray()
    //             );
    //         }
    //     );
    // }

    public function bool(): void
    {
        // Daftarkan navigasi langsung saat boot (tidak hanya saat serving)ss
        $this->registerSidebarMenus();
    }

    private function registerSidebarMenus(): void
    {
        // Cegah error saat tabel belum dimigrasi
        if (!\Schema::hasTable('labs')) {
            return;
        }
        
        // Group navigasi utama
        Filament::registerNavigationGroups([
            NavigationGroup::make()->label('Data Management'),
            NavigationGroup::make()->label('Hardware Master Data'),
            NavigationGroup::make()->label('Peripheral Master Data'),
            NavigationGroup::make()->label('Lab Inventory'),
        ]);

        // Ambil data lab
        $labs = Lab::orderBy('lab_name')->get();

        // Submenu dinamis untuk tiap lab
        Filament::registerNavigationItems(
            $labs->map(fn ($lab) => NavigationItem::make()
                ->label('Lab ' . $lab->lab_name)
                // ->url(fn () => route('filament.dashboard.resources.inventory.lab', ['lab' => $lab->id]))
                ->url('/dashboard/inventories?lab_id=' . $lab->id)
                ->group('Lab Inventory')
                ->icon('heroicon-o-server')
            )->toArray()
        );
    }
}
