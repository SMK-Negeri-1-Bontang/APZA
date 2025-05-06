<?php
// app/Http/Controllers/LaporanIzinController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanIzin;
use App\Models\Attedance;
use Illuminate\Support\Facades\Storage;


class LaporanIzinController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'absen_id' => 'required|exists:attendances,id',
            'keterangan' => 'required|string',
            'file_bukti' => 'nullable|file|max:2048',
        ]);

        $path = $request->file('file_bukti')?->store('bukti_izin');

        LaporanIzin::create([
            'absen_id' => $request->absen_id,
            'keterangan' => $request->keterangan,
            'file_bukti' => $path,
        ]);

        return redirect()->back()->with('success', 'Laporan izin disimpan.');
    }


    public function index()
    {
        $laporans = LaporanIzin::with(['absen.user', 'verifier'])->latest()->get();
        return view('laporan_izin.index', compact('laporans'));


    }

    public function edit($id)
    {
        $laporan = LaporanIzin::findOrFail($id);
        return view('absen.edit', compact('absen'));
    }

  

    public function destroy($id)
    {
        $laporan = LaporanIzin::findOrFail($id);
        $laporan->delete();
        return redirect()->route('izin.index')->with('success', 'Laporan izin berhasil dihapus');
    }

    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
            'catatan_verifikasi' => 'nullable|string',
        ]);
    
        $laporan = LaporanIzin::findOrFail($id);
        $laporan->update([
            'status' => $request->status,
            'catatan_verifikasi' => $request->catatan_verifikasi,
            'diverifikasi_oleh' => auth()->id(),
        ]);
    
        return redirect()->back()->with('success', 'Laporan telah diverifikasi.');
    }
    public function izinSaya()
{
    $siswa = auth()->user();

    $izinSaya = LaporanIzin::whereHas('absen', function ($query) use ($siswa) {
        $query->where('user_id', $siswa->id);
    })->latest()->get();

    return view('laporan_izin.izin_saya.index', compact('izinSaya'));
}

    
}
