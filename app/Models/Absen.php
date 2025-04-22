<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'absen';

    protected $fillable = [
        'user_id',
        'jurusan_id',
        'kehadiran',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function laporanIzin()
{
    return $this->hasOne(LaporanIzin::class);
}

}
