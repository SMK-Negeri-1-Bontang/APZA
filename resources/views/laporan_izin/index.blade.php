@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white p-6 rounded shadow-md">
    <h2 class="text-2xl font-bold">Daftar Laporan Izin</h2>

<table class="bg-white w-full">
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
            <td class="p-2">{{ $laporan->absen->user_id}}</td>
            <td class="p-2">{{ $laporan->absen->alasan }}</td>
            <td class="p-2">{{ $laporan->status }}</td>
            <td class="p-2">
                @if($laporan->bukti)
                <a href="{{ Storage::url($laporan->bukti) }}" target="_blank" class="text-blue-500">Lihat File</a>
                @endif
            </td>
            <td class="p-2">
                @if($laporan->status === 'menunggu')
                <form method="POST" action="{{ route('laporan-izin.verifikasi', $laporan->id) }}">
                    @csrf
                    @method('PUT')
                    <textarea name="catatan_verifikasi" placeholder="Catatan opsional" class="p-2"></textarea>
                    <button name="status" value="disetujui" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Setujui</button>
                    <button name="status" value="ditolak" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Tolak</button>
                </form>
                @else
                <span class="p-2">Diverifikasi oleh: {{ $laporan->verifier->nama_siswa ?? '-' }}</span>
                @if($laporan->verifier->profile_picture)
                <img src="{{ Storage::url($laporan->verifier->profile_picture) }}" alt="Foto Profil" class="w-8 h-8 rounded-full">
                @endif
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
