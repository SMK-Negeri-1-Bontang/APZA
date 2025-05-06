@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white p-6 rounded shadow-md">
    <h2>Daftar Laporan Izin</h2>

<table class="bg-white">
    <thead class="bg-gray-200">
        <tr>
            <th class="text-left">Siswa</th>
            <th class="text-left">Keterangan</th>
            <th class="text-left">Status</th>
            <th class="text-left">Bukti</th>
            <th class="text-left">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($laporans as $laporan)
        <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-gray-100' : '' }}">
            <td>{{ $laporan->absen->student->name }}</td>
            <td>{{ $laporan->keterangan }}</td>
            <td>{{ $laporan->status }}</td>
            <td>
                @if($laporan->file_bukti)
                <a href="{{ Storage::url($laporan->file_bukti) }}" target="_blank">Lihat File</a>
                @endif
            </td>
            <td>
                @if($laporan->status === 'menunggu')
                <form method="POST" action="{{ route('laporan-izin.verifikasi', $laporan->id) }}">
                    @csrf
                    @method('PUT')
                    <textarea name="catatan_verifikasi" placeholder="Catatan opsional"></textarea>
                    <button name="status" value="disetujui">Setujui</button>
                    <button name="status" value="ditolak">Tolak</button>
                </form>
                @else
                Diverifikasi oleh: {{ $laporan->verifier->name ?? '-' }}
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

