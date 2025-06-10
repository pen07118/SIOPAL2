<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class PCInventory extends Model
{
    use HasFactory;

    protected $table = 'pc_inventories'; // 👈 Tambahkan ini

    protected $fillable = [
        'lab_id',
        'pc_name',
        'motherboard_id',
        'processor_id',
        'ram_id',
        'vga_id',
        'storage_id',
        'psu_id',
        // 'case_id',
        'monitor_id',
        'keyboard_id',
        'mouse_id',
        'webcam_id',
        'headphone_id',
        'dvd_id'
    ];

    public function lab() { return $this->belongsTo(Lab::class); }
    public function motherboard() { return $this->belongsTo(Motherboard::class); }
    public function processor() { return $this->belongsTo(Processor::class); }
    public function ram() { return $this->belongsTo(RAM::class); }
    public function vga() { return $this->belongsTo(VGA::class); }
    public function storage() { return $this->belongsTo(Storage::class); }
    public function psu() { return $this->belongsTo(PSU::class); }
    public function case() { return $this->belongsTo(Cases::class); }
    public function monitor() { return $this->belongsTo(Monitor::class); }
    public function keyboard() { return $this->belongsTo(Keyboard::class); }
    public function mouse() { return $this->belongsTo(Mouse::class); }
    public function webcam() { return $this->belongsTo(Webcam::class); }
    public function headphone() { return $this->belongsTo(Headphone::class); }
    public function dvd() { return $this->belongsTo(DVD::class); }
}   
