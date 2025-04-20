@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="container mx-auto p-4">
    <div class="flex justify-center">
        <div class="w-full lg:w-250 xl:w-250 p-6 bg-white rounded shadow-md">
            <div class=" mb-4">
                <div class="card-header">Tambah Jurusan</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('jurusan.store') }}">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="nama_jurusan" class="col-md-4 col-form-label text-md-end">{{ __('Nama Jurusan') }}</label>
                            <div class="col-md-6">
                                <input id="nama_jurusan" type="text" class="form-control @error('nama_jurusan') is-invalid @enderror" name="nama_jurusan" value="{{ old('nama_jurusan') }}" required autocomplete="nama_jurusan" autofocus>
                                @error('nama_jurusan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="kelas" class="col-md-4 col-form-label text-md-end">{{ __('Kelas') }}</label>
                            <div class="col-md-6">
                                <select id="kelas" class="form-control @error('kelas') is-invalid @enderror" name="kelas" required autofocus>
                                    <option value="">Pilih Kelas</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                    <option value="XII">XIII</option>
                                </select>
                                @error('kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    {{ __('Tambah Jurusan') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
