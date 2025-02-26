<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use App\Models\Jurusan;
use Exception;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $absen = Absen::with('jurusan')->paginate(5); 
        return view('absen.index', compact('absen'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::all(); 
        return view('absen.create', compact('jurusans')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jurusan_id' => 'required|integer|exists:jurusan,id',
            'kelas' => 'required|string|max:255',
        ]);

        $absen = new Absen();
        $absen->nama = $validatedData['nama'];
        $absen->jurusan_id = $validatedData['jurusan_id'];
        $absen->kelas = $validatedData['kelas'];
        $absen->save();

        return redirect()->route('absen.index')->with('success', 'Absen berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $absen = Absen::with('jurusan')->findOrFail($id);
        return view('absen.show', compact('absen'));
    }
}
