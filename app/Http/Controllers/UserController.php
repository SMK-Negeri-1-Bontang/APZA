<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $users = User::paginate(5);
        return view('user.index', ['users' => $users]);  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|unique:users|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'role' => 'required',
        ]);

        try {
            $user = User::create([
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                
            ]);

            if ($user) {
                $role = new Role;
                $role->user_id = $user->id;
                $role->role = $request->role;
                $role->save();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Disimpan');
        }

        return redirect('user')->with('success', 'Data Berhasil Disimpan');
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
        if (!$user) {
            abort(404);
        }
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|min:5|unique:users,nama_lengkap,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required',
        ]);

        try {
            $user = User::find($id); 
            $user->nama_lengkap = $request->nama_lengkap;
            $user->email = $request->email;

            if ($request->password != '') {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            if ($user) {
                $role = Role::where('user_id', $id)->first();
                if ($role) {
                    $role->role = $request->role;
                } else {
                    $role = new Role;
                    $role->user_id = $user->id;
                    $role->role = $request->role;
                } 
                $role->save();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data Gagal Disimpan');
        }

        return redirect('user')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        try {
            $user->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'User Gagal dihapus');
        }

        return redirect()->back()->with('success', 'User Berhasil dihapus');
    }
}
