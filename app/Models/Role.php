<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // protected $table 
    protected $fillable = [
        'user_id',
        'nama'
    ];

    // Definisikan relasi user di sini
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
{
    return $this->hasMany(User::class);
}

    
}
