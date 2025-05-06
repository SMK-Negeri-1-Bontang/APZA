@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="container mx-auto p-4">
    <div class="flex justify-center">
        <div class="w-full lg:w-250 xl:w-250 p-6 bg-white rounded shadow-md">
            <div class="mb-4">
                <div class="card-header">Tambah User</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="nama_siswa" class="col-md-4 col-form-label text-md-end">{{ __('Nama Siswa') }}</label>

                            <div class="col-md-6">
                                <input id="nama_siswa" type="text" class="form-control @error('nama_siswa') is-invalid @enderror" name="nama_siswa" value="{{ old('nama_siswa') }}" required autocomplete="nama_siswa">

                                @error('nama_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama_lengkap" class="col-md-4 col-form-label text-md-end">{{ __('Nama Lengkap') }}</label>

                            <div class="col-md-6">
                                <input id="nama_lengkap" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required autocomplete="nama_lengkap">

                                @error('nama_lengkap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nis" class="col-md-4 col-form-label text-md-end">{{ __('NIS') }}</label>

                            <div class="col-md-6">
                                <input id="nis" type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis') }}" required autocomplete="nis">

                                @error('nis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Jurusan --}}
<select id="jurusan_id" name="jurusan_id" class="form-control" required>
    <option value="">-- Pilih Jurusan --</option>
    @foreach($jurusans as $jurusan)
        <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
    @endforeach
</select>

{{-- Kelas (dinamis) --}}
<select id="kelas_id" name="kelas_id" class="form-control" required>
    <option value="">-- Pilih Kelas --</option>
</select>

{{-- Script AJAX --}}
<script>
    document.getElementById('jurusan_id').addEventListener('change', function () {
        const jurusanId = this.value;
        const kelasSelect = document.getElementById('kelas_id');
        kelasSelect.innerHTML = '<option value="">Memuat...</option>';

        fetch(`/get-kelas/${jurusanId}`)
            .then(response => response.json())
            .then(data => {
                kelasSelect.innerHTML = '<option value="">-- Pilih Kelas --</option>';
                data.forEach(kelas => {
                    const option = document.createElement('option');
                    option.value = kelas.id;
                    option.textContent = kelas.nama_kelas;
                    kelasSelect.appendChild(option);
                });
            });
    });
</script>


                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Level') }}</label>
                            <div class="col-md-6">
                                <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                                    <option value="siswa">Siswa</option>
                                    <option value="ketua_kelas">Ketua Kelas</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a class="inline-block bg-transparent text-blue-500 hover:text-blue-700 text-sm py-2 px-4 border border-blue-500 hover:border-blue-700 rounded text-left" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                                <button type="submit" class="inline-block bg-blue-500 hover:bg-blue-700 text-white text-sm py-2 px-4 border border-blue-500 hover:border-blue-700 rounded">
                                    {{ __('Register') }}
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
