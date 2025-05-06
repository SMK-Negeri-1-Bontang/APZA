<?php

// app/Models/LaporanIzin.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanIzin extends Model
{
    protected $fillable = ['absen_id', 'alasan', 'bukti', 'status', 'catatan_verifikasi', 'diverifikasi_oleh'];

    public function absen()
    {
        return $this->belongsTo(Absen::class, 'absen_id');
    }

    public function verifier()
{
    return $this->belongsTo(User::class, 'diverifikasi_oleh');
}

}

