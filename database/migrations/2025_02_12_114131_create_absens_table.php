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
        Schema::create('absens', function (Blueprint $table) {
            $table->integer('id')->comment('NIS');
            $table->string('nama');
            $table->enum('kelas', ['X', 'XI', 'XII', 'XIII','kosong'])->default('kosong');
            $table->enum('jurusan', ['Kimia Industri','Kimia Analis','Rekayasa Perangkat Lunak','Teknik Pengelasan','Teknik Pemesinan','Farmasi','Teknik Pendingin dan Tata Udara','Teknik Otomasi Industri','Teknik Pemanfaatan Instalasi Tenaga Listrik','Teknik Kendaraan Ringan','kosong'])->default('kosong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absens');
    }
};
