<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab;

class LabInventoryDetailController extends Controller
{
    public function show(Lab $lab)
    {
        // $lab = Lab::findOrFail($lab->id);
        // return view('filament.pages.lab-inventory-detail', compact('lab'));
        return view('filament.resources.dashboard-resource.pages.lab-inventory-detail', compact('lab'));
    }
}
