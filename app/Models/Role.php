<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // protected $table 
    use HasFactory;
    protected $fillable = [
        'user_id',
        'role'
    ];
}
