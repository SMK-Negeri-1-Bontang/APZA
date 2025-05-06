<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusans';

    protected $fillable = ['nama_jurusan'];

  
    public function absen()
    {
        return $this->hasMany(Absen::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function laporanIzin()
    {
        return $this->hasMany(LaporanIzin::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function User()
    {
        return $this->hasMany(User::class);
    }



    
    
}
