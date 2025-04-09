<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusan';

    protected $fillable = [
        'nama_jurusan',
        'kelas',
    ];

    protected static function booted()
    {
        static::updated(function ($model) {
            // This is a placeholder for any additional logic you might need to execute after a model is updated.
            // Since the error message indicates the PUT method is not supported, this might be related to routing or controller logic.
            // This section is not directly related to the model itself but rather how it's being used in the application.
        });
    }
}
