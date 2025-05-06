<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::paginate(10);
        return view('kelas.index', compact('kelas'));
    }

    public function create() 
    {
        $jurusans = Jurusan::all();
        $kelas = Kelas::all();
        return view('kelas.create', compact('jurusans', 'kelas'));
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $jurusans = Jurusan::all();
        return view('kelas.edit', compact('kelas', 'jurusans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'jurusan_id' => 'required|integer|exists:jurusans,id',
        ]);
        $kelas = Kelas::create($request->only(['nama_kelas', 'jurusan_id']));
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->only(['nama_kelas', 'jurusan_id']));
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diubah.');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }
}
