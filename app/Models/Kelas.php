<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Absen;

class Kelas extends Model
{
    protected $fillable = ['nama_kelas', 'jurusan_id'];



    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function absen()
    {
        return $this->hasMany(Absen::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    

    public function User()
    {
        return $this->hasMany(User::class);
    }




    
}
