@extends('layouts.app')

@section('content')
<div class="flex gap-5 bg-gray-200 p-5">
    {{-- Kolom 1: Jurusan --}}
    <div class="w-1/4 bg-white rounded-lg p-5">
        <h4 class="mb-4">Jurusan</h4>
        @foreach($jurusans as $jurusan)
            <a href="{{ route('absen.index', ['jurusan_id' => $jurusan->id]) }}" class="btn btn-success mb-2">
                <div class="mb-2.5 p-2.5 bg-gray-200 rounded-lg text-center">
                    {{ $jurusan->nama_jurusan }}
                </div>
            </a>
        @endforeach
    </div>

    {{-- Kolom 2: Kelas --}}
    <div class="w-1/4 bg-white rounded-lg p-5">
        <h4 class="mb-4">Kelas</h4>
        @if(!empty($kelas))
            @foreach($kelas as $kelas)
                <a href="{{ route('absen.index', ['jurusan_id' => $selectedJurusan, 'kelas_id' => $kelas->id]) }}" class="btn btn-success mb-2">
                    <div class="mb-2.5 p-2.5 bg-gray-200 rounded-lg text-center">
                        {{ $kelas->nama_kelas }}
                    </div>
                </a>
            @endforeach
        @else
            <p>Pilih jurusan untuk melihat kelas.</p>
        @endif
    </div>

    {{-- Kolom 3: Absensi --}}
    <div class="w-2/4 bg-white rounded-lg p-5">
        <h4 class="mb-4">Data Absensi</h4>
        @if(!empty($absen) && count($absen) > 0)
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($absen as $absen)
                        <tr>
                            <td>{{ $absen->user->nama_siswa }}</td>
                            <td>{{ $absen->status }}</td>
                            <td>{{ \Carbon\Carbon::parse($absen->tanggal)->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @elseif($selectedKelas)
            <p>Tidak ada data absensi untuk kelas ini.</p>
        @else
            <p>Pilih jurusan dan kelas untuk melihat absensi.</p>
        @endif
    </div>
</div>
@endsection
