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
            $table->foreignId('absen_id')->constrained('absens')->onDelete('cascade');  
            $table->text('alasan');
            $table->string('bukti')->nullable(); // path file bukti (bisa gambar/surat/izin)
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');
            $table->text('catatan_verifikasi')->nullable();
            $table->foreignId('diverifikasi_oleh')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laporan_izins');
    }
};


