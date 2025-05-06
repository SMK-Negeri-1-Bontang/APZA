@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Tambah Kelas</h2>

  

    <form action="{{ route('kelas.store') }}" method="POST" class="space-y-4">
        @csrf
        <div class="flex flex-col">
            <label for="nama_kelas" class="text-sm font-medium text-gray-700">Nama Kelas:</label>
            <select name="nama_kelas" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
            </select>
        </div>

        <div class="flex flex-col">
            <label for="jurusan_id" class="text-sm font-medium text-gray-700">Jurusan:</label>
            <select name="jurusan_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @foreach($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                @endforeach
            </select>
        </div>
       

        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-blue-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Simpan</button>
    </form>
</div>
@endsection
