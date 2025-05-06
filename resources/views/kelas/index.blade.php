@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Daftar Kelas</h2>

<a href="{{Route('kelas.create')}}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold py-1.5 px-4 rounded-lg ml-2 transition">
    <i class="fa fa-plus mr-1"></i>Tambah Kelas
</a>

<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Nama Kelas
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Jurusan
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($kelas as $kelas)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                            {{ $kelas->nama_kelas }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                            @if($kelas->jurusan)
                                {{ $kelas->jurusan->nama_jurusan}}
                            @else
                                Tidak Ada Jurusan
                            @endif
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex space-x-2">
                            <form action="{{ route('kelas.destroy', $kelas->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-block bg-red-500 hover:bg-red-600 text-white font-semibold py-1.5 px-4 rounded-lg ml-2 transition">
                                    <i class="fa fa-trash mr-1"></i>Hapus
                                </button>
                            </form>
                            <a href="{{ route('kelas.edit', $kelas->id) }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1.5 px-4 rounded-lg ml-2 transition">
                                <i class="fa fa-edit mr-1"></i>Edit
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
