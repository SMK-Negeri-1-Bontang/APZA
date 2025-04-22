@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white p-6 rounded shadow-md">
        <h2 class="text-xl font-bold mb-4">Laporan Izin</h2>

        <table class="table-auto w-full text-left border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Jurusan</th>
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Alasan</th>
                    <th class="px-4 py-2">Bukti</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($laporans as $laporan)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $laporan->absen->user->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $laporan->absen->jurusan->nama_jurusan ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $laporan->created_at->format('d M Y') }}</td>
                        <td class="px-4 py-2">{{ $laporan->alasan }}</td>
                        <td class="px-4 py-2">
                            @if ($laporan->bukti)
                                <a href="{{ asset('storage/' . $laporan->bukti) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $laporan->bukti) }}" alt="Bukti" class="w-20 h-20">
                                </a>
                            @else
                                <span class="text-gray-500">Tidak ada</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            @if ($laporan->absen)
                                <a href="{{ route('absen.edit', $laporan->absen->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">
                                    Edit
                                </a>
                            @else
                                <span class="text-gray-400">Absen tidak ditemukan</span>
                            @endif

                            <form action="{{ route('izin.destroy', ['id' => $laporan->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">Tidak ada laporan izin.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
