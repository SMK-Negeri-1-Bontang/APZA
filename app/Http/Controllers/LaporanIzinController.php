<?php

namespace App\Http\Controllers;

use App\Models\LaporanIzin;
use Illuminate\Http\Request;

class LaporanIzinController extends Controller
{
    public function index()
    {
        $laporans = LaporanIzin::with(['absen.user', 'absen.jurusan'])->latest()->get();

        return view('izin.index', compact('laporans'));


    }

    public function edit($id)
    {
        $laporan = LaporanIzin::findOrFail($id);
        return view('absen.edit', compact('absen'));
    }

    public function update(Request $request, $id)
    {
        $laporan = LaporanIzin::findOrFail($id);
        $laporan->update($request->all());
        return redirect()->route('absen.index')->with('success', 'Laporan izin berhasil diubah');
    }

    public function destroy($id)
    {
        $laporan = LaporanIzin::findOrFail($id);
        $laporan->delete();
        return redirect()->route('izin.index')->with('success', 'Laporan izin berhasil dihapus');
    }


    
}
