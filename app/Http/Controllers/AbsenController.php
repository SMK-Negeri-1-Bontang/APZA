<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;  
use App\Models\Jurusan;
use App\Models\User;
use App\Models\LaporanIzin;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jurusans = Jurusan::all();
        $kelas = Kelas::all();
        $selectedJurusan = $request->jurusan_id;
        $selectedKelas = $request->kelas_id ;
        $kelas = [];
        $absen = [];
    
        // Ambil kelas berdasarkan jurusan yang dipilih
        if ($selectedJurusan) {
            $kelas = Kelas::where('jurusan_id', $selectedJurusan)->get();
        }
    
        // Ambil absensi jika kelas dipilih
        if ($selectedJurusan && $selectedKelas) {
            $absen = Absen::with('user')
                ->where('jurusan_id', $selectedJurusan)
                ->where('kelas_id', $selectedKelas)
                ->whereDate('tanggal', now())

                ->get();
        }
    
        return view('absen.index', compact(
            'jurusans',
            'kelas',
            'selectedJurusan',
            'selectedKelas',
            'absen'
        ));
    }
    
    
  

    public function create()
    {
        $user = Auth::user();
        $tanggal = Carbon::today();
        $sudahAbsen = Absen::where('user_id', $user->id)
                            ->whereDate('tanggal', $tanggal)
                            ->exists();
        $kelas = Kelas::where('id', $user->kelas_id)->get();
        $jurusan = Jurusan::where('id', $user->jurusan_id)->get();
    
        return view('absen.create', compact('kelas', 'jurusan'));
        if ($sudahAbsen) {
            return redirect()->back()->with('error', 'Kamu sudah absen.');
        }
    }
    
    

    public function store(Request $request)
    {



        
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'jurusan_id' => 'required|exists:jurusans,id',
            'status' => 'required|in:hadir,izin,sakit,alpa',
            'alasan' => 'required_if:status,izin',
            'bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'tanggal' => 'required|date',
            
            'kelas_id' => 'required|exists:kelas,id',
            
        ]);
        $userId = auth()->id();
        $tanggal = Carbon::today();
    
        $sudahAbsen = Absen::where('user_id', $userId)
                            ->whereDate('tanggal', $tanggal)
                            
                            ->exists();
    
        if ($sudahAbsen) {
            return redirect()->back()->with('error', 'Anda sudah absen untuk waktu ini hari ini.');
        }

        $absen = Absen::create([
            'user_id' => $request->user_id,
            'jurusan_id' => $request->jurusan_id,
            'status' => $request->status,
            'alasan' => $request->status === 'izin' ? $request->alasan : null,
            'bukti' => $request->status === 'izin' ? $request->file('bukti')->store('bukti_izin', 'public') : null,
            'kelas_id' => $request->kelas_id,
            'tanggal' => $request->tanggal,
            
          
        ]); 

        if ($request->status === 'izin') {
            $buktiPath = $request->hasFile('bukti') ? $request->file('bukti')->store('bukti_izin', 'public') : null;

            LaporanIzin::create([
                'absen_id' => $absen->id,
                'alasan' => $request->alasan,
                'bukti' => $buktiPath,
            ]);
        }

        return redirect()->route('dashboard.index')->with('success', 'Absen berhasil disimpan');
    }

    public function show($id)
    {
        $absen = Absen::with('jurusan')->findOrFail($id);
        return view('absen.show', compact('absen'));
    }

    public function edit($id)
    {
        $absen = Absen::findOrFail($id);
        $users = User::all();
        $jurusans = Jurusan::all();
        return view('absen.edit', compact('absen', 'users', 'jurusans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kelas_id' => 'required|exists:kelas,id',
            'jurusan_id' => 'required|exists:jurusans,id',
            'status' => 'required|in:hadir,izin,sakit,alpa',
            'alasan' => 'required_if:status,izin',
            'bukti' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'tanggal' => 'required|date|unique:absens,tanggal,' . $id . ',id,user_id,' . $request->user_id,
            'dilaporkan_oleh' => 'required|exists:users,id',
        ]);

        $absen = Absen::findOrFail($id);
        $absen->update($request->only(['user_id', 'jurusan_id', 'status', 'kelas_id', 'dilaporkan_oleh', 'tanggal']));

        if ($request->status === 'izin') {
            $laporan = LaporanIzin::firstOrNew(['absen_id' => $absen->id]);
            $laporan->alasan = $request->alasan;

            if ($request->hasFile('bukti')) {
                $laporan->bukti = $request->file('bukti')->store('bukti', 'public');
            }

            $laporan->save();
        } else {
            LaporanIzin::where('absen_id', $absen->id)->delete();
        }

        return redirect()->route('absen.index')->with('success', 'Absen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $absen = Absen::findOrFail($id);
        $absen->delete();

        return redirect()->route('absen.index')->with('success', 'Absen deleted successfully.');
    }

    public function pilih_kelas()
    {
        return 'Route dan Controller aktif!';
    }
    
    
    public function simpan(Request $request)
    {  
        $jurusan_id = $request->jurusan_id;
        $kelas_id = $request->kelas_id;
      
        
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'status' => 'required|array',
            'status.*' => 'required|in:hadir,izin,sakit,alpa',
        ]);

        foreach ($request->status as $status) {
            $absen = Absen::firstOrNew(['user_id' => $status['id'], 'tanggal' => $request->tanggal]);
            $absen->status = $status['status'];
            $absen->save();
        }

        return redirect()->route('absen.index')->with('success', 'Absen berhasil disimpan.');
    }

    public function tampilkanSiswa(Request $request)
    {
        $jurusan_id = $request->jurusan_id;
        $kelas_id = $request->kelas_id;
        $jurusan = Jurusan::findOrFail($jurusan_id);
        $kelas = Kelas::findOrFail($kelas_id);
    
        // Ambil siswa dari jurusan dan kelas tersebut
       $siswa = User::where('role', 'siswa')
                    ->where('jurusan_id', $jurusan_id)
                    ->where('kelas_id', $kelas_id)
                    ->get();
    
        if ($siswa->isEmpty()) {
            return back()->with('error', 'Tidak ada siswa ditemukan untuk jurusan dan kelas tersebut.');
        }
    
        // Kirim ke view absen.input
        return view('absen.input', compact('siswa', 'jurusan_id', 'kelas_id'));

    }
    public function input(Request $request)
    {
        $jurusanId = $request->jurusan_id;
        $kelasId = $request->kelas_id;
    
        $jurusan = Jurusan::findOrFail($jurusanId);
        $kelas = Kelas::findOrFail($kelasId);
    
        $siswa = User::where('role', 'siswa')
                    ->where('kelas_id', $kelasId)
                    ->get();
    
        return view('absen.input', compact('siswa', 'jurusan', 'kelas'));
    }

  
      
    


}

