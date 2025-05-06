@extends('layouts.app')

@section('content')
<h2>Riwayat Izin Saya</h2>

<table>
    <thead>
        <tr>
            <th>Tanggal Absen</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Catatan Verifikasi</th>
            <th>Bukti</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($izinSaya as $izin)
        <tr>
            <td>{{ $izin->absen->tanggal ?? '-' }}</td>
            <td>{{ $izin->keterangan }}</td>
            <td>{{ ucfirst($izin->status) }}</td>
            <td>{{ $izin->catatan_verifikasi ?? '-' }}</td>
            <td>
                @if ($izin->file_bukti)
                    <a href="{{ Storage::url($izin->file_bukti) }}" target="_blank">Lihat File</a>
                @else
                    -
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection