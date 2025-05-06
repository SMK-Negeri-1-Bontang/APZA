@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-center">
        <div class="w-full lg:w-250 xl:w-250 p-6 bg-white rounded shadow-md">
            <div class="mb-4">
                <div class="card-header">Create Absen</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('absen.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        
                    
   <div>
    <label for="nama">Nama</label>
    <input type="text" value="{{ auth()->user()->nama_siswa }}" disabled>
    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
</div>

    <label for="kelas_id">Kelas</label>
    <select name="kelas_id" id="kelas_id" required>
        @foreach($kelas as $k)
            <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
        @endforeach
    </select>

    <label for="jurusan_id">Jurusan</label>
    <select name="jurusan_id" id="jurusan_id" required>
        @foreach($jurusan as $j)
            <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
        @endforeach
    </select>
    @if($kelas->isEmpty() || $jurusan->isEmpty())
    <p>Akun Anda belum terhubung dengan kelas atau jurusan. Silakan hubungi admin.</p>
@else
    <!-- Form tampil di sini -->
@endif



    <!-- Kelas dan Jurusan (seperti sebelumnya) -->

    <label for="status">Status Kehadiran</label>
    <select name="status" id="status" required onchange="toggleIzinFields()">
        <option value="hadir">Hadir</option>
        <option value="izin">Izin</option>
        <option value="sakit">Sakit</option>
        <option value="alpa">Alpha</option>
    </select>

    <div id="izinFields" style="display: none; margin-top: 1em;">
        <label for="alasan">Alasan Izin</label>
        <textarea name="alasan" id="alasan" rows="3" ></textarea>

        <label for="bukti">Upload Bukti (opsional, PDF/JPG/PNG)</label>
        <input type="file" name="bukti" accept=".pdf,.jpg,.jpeg,.png">
    </div>

    <label for="tanggal">Tanggal</label>
    <input type="date" name="tanggal" id="tanggal" required>

    
    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Simpan Absensi</button>
</form>

<script>
    function toggleIzinFields() {
        const status = document.getElementById('status').value;
        const izinFields = document.getElementById('izinFields');
        izinFields.style.display = (status === 'izin') ? 'block' : 'none';
    }

    // Trigger saat halaman dimuat
    document.addEventListener('DOMContentLoaded', toggleIzinFields);
</script>


   


   




  


                 

                 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
