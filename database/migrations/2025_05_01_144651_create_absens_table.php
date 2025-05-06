<?php

// database/migrations/xxxx_xx_xx_create_absens_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('absens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // relasi ke tabel users
           
            $table->foreignId('kelas_id')->constrained()->onDelete('cascade'); // relasi ke tabel kelas
            $table->foreignId('jurusan_id')->constrained()->onDelete('cascade'); // relasi ke tabel jurusan
            $table->enum('status', ['hadir', 'izin', 'sakit', 'alpa'])->default('alpa');
            $table->string('bukti')->nullable();
            $table->string('alasan')->nullable();
            $table->date('tanggal');
            
            
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('absens');
    }
};
