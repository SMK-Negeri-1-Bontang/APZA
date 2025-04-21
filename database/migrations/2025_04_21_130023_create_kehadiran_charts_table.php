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
        Schema::create('kehadiran_charts', function (Blueprint $table) {
            $table->id();
            $table->string('kehadiran'); // E.g. Hadir, Izin
            $table->integer('jumlah');
            $table->date('tanggal')->nullable(); // Optional for filtering
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehadiran_charts');
    }
};
