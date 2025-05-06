<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Exception;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        
        $users = User::paginate(5);
        return view('user.index')->with('users', $users);  
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        $kelas = Kelas::all();
        return view('user.create', compact('jurusans', 'kelas'));
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
            'role' => 'required|string|max:50',
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
            'role' => $validatedData['role'],
        ]);

        return redirect()->route('user.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            abort(404);
        }
        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */

     public function edit(string $id)
    {
        $user = User::find($id);
        $jurusans = Jurusan::all();
        $kelas = Kelas::all();
        if (!$user) {
            abort(404);
        }
        return view('user.edit', ['user' => $user, 'jurusans' => $jurusans, 'kelas' => $kelas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'nis' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required|string|max:50',
            'jurusan_id' => 'required|integer',
            'kelas_id' => 'required|integer',
        ]);

        // Update user details
        $user->update([
            'nama_siswa' => $validated['nama_siswa'],
            'nama_lengkap' => $validated['nama_lengkap'],
            'nis' => $validated['nis'],
            'email' => $validated['email'],
            'jurusan_id' => $validated['jurusan_id'],
            'kelas_id' => $validated['kelas_id'],
        ]);

        // Update role
        $role = Role::where('user_id', $user->id)->first();
        if ($role) {
            $role->role = $validated['role'];
            $role->save();
        } else {
            $role = new Role;
            $role->user_id = $user->id;
            $role->role = $validated['role'];
            $role->save();
        }

        return redirect()->route('user.index')->with('success', 'Profile updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            abort(404);
        }

        try {
            $user->delete();
            Role::where('user_id', $id)->delete(); // Remove associated role
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'User Gagal dihapus');
        }

        return redirect()->back()->with('success', 'User Berhasil dihapus');
    }

    public function getKelas($jurusan_id)
{
    $kelas = Kelas::where('jurusan_id', $jurusan_id)->get();
    return response()->json($kelas);
}

}
