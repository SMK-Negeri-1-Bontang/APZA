<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Exception;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        $kelas = Kelas::all();
        
        return view('auth.register', compact('jurusans', 'kelas'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:5',
            'jurusan_id' => 'required|integer|exists:jurusans,id',
            'kelas_id' => 'required|integer|exists:kelas,id',
             'nis' => 'required|unique:users,nis,',
        ]);

        $user = User::create([
            'nama_siswa' => $validatedData['nama_siswa'],
            'nama_lengkap' => $validatedData['nama_lengkap'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'nis' => $validatedData['nis'],
            'jurusan_id' => $validatedData['jurusan_id'],
            'kelas_id' => $validatedData['kelas_id'],
        ]);

        $role = Role::create([
            'user_id' => $user->id,
            'role' => 'siswa',
        ]);

        return redirect()->route('profile.index')->with('success', 'Data Berhasil Disimpan');
    }
}