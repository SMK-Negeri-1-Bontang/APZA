<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_siswa',
        'nama_lengkap',
        'jurusan_id',
        'kelas_id',
        'nis',
        'email',
        'password',
        'profile_picture',
      
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //untuk absen
    public function absens()
    {
        return $this->hasMany(Absen::class);
    }

    // Method to get the user's role
    public function role()
    {
        return $this->hasOne(Role::class); // Menyesuaikan dengan relasi yang benar
    }

    // Method to check if the user has a specific role
    public function hasRole($roleName)
    {
        return $this->role && $this->role->role === $roleName;
    }

    public function isAdmin()
    {
        return $this->role && $this->role->role === 'admin';
    }

    public function isSiswa()
    {
        return $this->role && $this->role->role === 'siswa';
    }

    public function isKetuaKelas()
    {
        return $this->role && $this->role->role === 'ketua_kelas';
    }
    public function kelas()
{
    return $this->belongsTo(Kelas::class);
}

public function jurusan()
{
    return $this->belongsTo(Jurusan::class);
}





}
