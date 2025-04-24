<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanIzinsTable extends Migration
{
    public function up()
    {
        Schema::create('laporan_izins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('absen_id')->constrained('absen')->onDelete('cascade'); // relasi ke absen
            $table->text('alasan');
            $table->string('bukti')->nullable(); // path file bukti (bisa gambar/surat/izin)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan_izins');
    }
};


