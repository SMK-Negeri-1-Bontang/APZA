<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use App\Models\Jurusan;
use App\Models\User;
use App\Models\LaporanIzin;
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
        $jurusan = Jurusan::all();
        return view('absen.create', compact('users', 'jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'jurusan_id' => 'required|exists:jurusan,id',
            'kehadiran' => 'required|in:Hadir,Tidak Hadir,Izin,Tidak ada keterangan',
            'alasan' => 'required_if:kehadiran,Izin',
            'bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Simpan absen dulu
        $absen = Absen::create([
            'user_id' => $request->user_id,
            'jurusan_id' => $request->jurusan_id,
            'kehadiran' => $request->kehadiran,
        ]);

        // Kalau "Izin", simpan juga ke laporan_izins
        if ($request->kehadiran === 'Izin') {
            $buktiPath = null;

            if ($request->hasFile('bukti')) {
                $buktiPath = $request->file('bukti')->store('bukti_izin', 'public');
            }

            LaporanIzin::create([
                'absen_id' => $absen->id,
                'alasan' => $request->alasan,
                'bukti' => $buktiPath,
            ]);
        }

        return redirect()->route('welcome')->with('success', 'Absen berhasil disimpan');
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
        $jurusan = Jurusan::all();
        return view('absen.edit', compact('absen', 'users', 'jurusan'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'jurusan_id' => 'required|exists:jurusan,id',
            'kehadiran' => 'required',
            'alasan' => 'required_if:kehadiran,Izin',
            'bukti' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048'
        ]);

        $absen = Absen::findOrFail($id);
        $absen->user_id = $request->user_id;
        $absen->jurusan_id = $request->jurusan_id;
        $absen->kehadiran = $request->kehadiran;
        $absen->save();

        // Cek apakah statusnya Izin
        if ($request->kehadiran === 'Izin') {
            // Cek apakah sudah ada laporan izin untuk absen ini
            $laporan = LaporanIzin::where('absen_id', $absen->id)->first();

            if (!$laporan) {
                $laporan = new LaporanIzin();
                $laporan->absen_id = $absen->id;
            }

            $laporan->alasan = $request->alasan;

            // Simpan file bukti jika ada
            if ($request->hasFile('bukti')) {
                $path = $request->file('bukti')->store('bukti', 'public');
                $laporan->bukti = $path;
            }

            $laporan->save();
        } else {
            // Jika kehadiran bukan "Izin", hapus laporan izin jika ada
            LaporanIzin::where('absen_id', $absen->id)->delete();
        }

        return redirect()->route('absen.index')->with('success', 'Absen berhasil diperbarui.');
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
    
    /**
     * Display the chart for absen.
     */
 
}
