<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LabInventoryDetailController;
use App\Filament\Resources\InventoryResource\Pages\LabInventoryPage;

Route::get('/', function () {
    // return view('welcome');
    return to_route('filament.dashboard.pages.dashboard');
});

Route::get('/lab-inventory/{lab}', LabInventoryPage::class)
->name('lab-inventory.page');

    // Route::get('/lab-inventory/{lab}', \App\Filament\Resources\InventoryResource\Pages\LabInventoryPage::class)
    // ->name('filament.dashboard.resources.inventory.lab');

//  Route::get('/dashboard/lab-inventory/{lab}', [LabInventoryDetailController::class, 'show'])
//  ->name('filament.dashboard.pages.lab-inventory-detail');

    
    // ->middleware(['auth', 'verified'])
    // ->group(function () {
    //     // Route untuk mengelola inventory lab
    //     Route::get('/inventory', [LabInventoryDetailController::class, 'show'])
    //         ->name('lab-inventory.show');
    // });
