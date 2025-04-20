<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use App\Models\Jurusan;
use App\Models\User;
use Exception;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absen = Absen::all();
        return view('absen.index', compact('absen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $jurusans = Jurusan::all();
        return view('absen.create', compact('users', 'jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'jurusan_id' => 'required|integer',
            'kehadiran' => 'required|in:Hadir,Tidak Hadir,Izin,Tidak ada keterangan',
        ]);

        $absen = new Absen();
        $absen->user_id = $validatedData['user_id'];
        $absen->jurusan_id = $validatedData['jurusan_id'];
        $absen->kehadiran = $validatedData['kehadiran'];
        $absen->save();

        return redirect()->route('absen.index')->with('success', 'Absen created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $absen = Absen::with('jurusan')->findOrFail($id);
        return view('absen.show', compact('absen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $absen = Absen::findOrFail($id);
        $users = User::all();
        $jurusans = Jurusan::all();
        return view('absen.edit', compact('absen', 'users', 'jurusans'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_id) 
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'jurusan_id' => 'required|integer',
            'kehadiran' => 'required|in:Hadir,Tidak Hadir,Izin,Tidak ada keterangan',
        ]);

        $absen = Absen::where('user_id', $user_id)->firstOrFail();
        $absen->user_id = $validatedData['user_id'];
        $absen->jurusan_id = $validatedData['jurusan_id'];
        $absen->kehadiran = $validatedData['kehadiran'];
        $absen->save();

        return redirect()->route('absen.index')->with('success', 'Absen updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $absen = Absen::findOrFail($id);
        $absen->delete();

        return redirect()->route('absen.index')->with('success', 'Absen deleted successfully.');
    }
}
