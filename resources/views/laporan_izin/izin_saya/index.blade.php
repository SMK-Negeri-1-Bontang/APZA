@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white p-6 rounded shadow-md">
    <h2 class="text-2xl font-bold">Daftar Laporan Izin</h2>

<table class="bg-white w-full border-collapse">
    <thead>
        <tr>
            <th class="px-4 py-2 border-b">Tanggal Absen</th>
            <th class="px-4 py-2 border-b">Keterangan</th>
            <th class="px-4 py-2 border-b">Status</th>
            <th class="px-4 py-2 border-b">Catatan Verifikasi</th>  
            <th class="px-4 py-2 border-b">Bukti</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($izinSaya as $izin)
        <tr>
            <td class="px-4 py-2 border-b">{{ $izin->absen->tanggal ?? '-' }}</td>
            <td class="px-4 py-2 border-b">{{ $izin->absen->alasan ?? '-' }}</td>
            <td class="px-4 py-2 border-b">{{ ucfirst($izin->status) }}</td>
            <td class="px-4 py-2 border-b">{{ $izin->catatan_verifikasi ?? '-' }}</td>
            <td class="px-4 py-2 border-b">
                @if ($izin->bukti)
                    <button onclick="window.open('{{ Storage::url($izin->bukti) }}', '_blank')" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Lihat File</button>
                @else
                    -
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>

@endsection
