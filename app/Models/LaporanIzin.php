<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanIzin extends Model
{
    use HasFactory;

    protected $fillable = ['absen_id', 'alasan', 'bukti'];

    public function absen()
    {
        return $this->belongsTo(Absen::class);
    }
    

    
}
