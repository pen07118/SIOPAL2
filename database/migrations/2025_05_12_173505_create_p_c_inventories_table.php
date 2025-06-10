<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pc_inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lab_id');
            $table->string('pc_name');
            $table->foreignId('motherboard_id')->constrained();
            $table->foreignId('processor_id')->constrained();
            $table->foreignId('ram_id')->constrained();
            $table->foreignId('vga_id')->constrained();
            $table->foreignId('storage_id')->constrained();
            $table->foreignId('dvd_id')->constrained();
            $table->foreignId('psu_id')->constrained();
            // $table->foreignId('case_id')->constrained();
            $table->foreignId('monitor_id')->constrained();
            $table->foreignId('keyboard_id')->constrained();
            $table->foreignId('mouse_id')->constrained('mouse');
            $table->foreignId('webcam_id')->constrained();
            $table->foreignId('headphone_id')->constrained();
            $table->timestamps();
        
            $table->foreign('lab_id')->references('id')->on('labs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_c_inventories');
    }
};
