<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\Role;
use Exception;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index', ['user' => Auth::user()]);
    }

    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'nis' => 'required|string|max:50',
            'email' => 'required|email',
            'profile_picture' => 'nullable|image|max:2048',
            'role' => 'required|string|max:50',
        ]);

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $validated['profile_picture'] = $request->file('profile_picture')->store('profiles', 'public');
        }

        $user->update($validated);

        // Update role
        $role = Role::where('user_id', $user->id)->first();
        if ($role) {
            $role->role = $request->role;
            $role->save();
        } else {
            $role = new Role;
            $role->user_id = $user->id;
            $role->role = $request->role;
            $role->save();
        }

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully!');
    }

   
}
