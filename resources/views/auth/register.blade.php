@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nama_siswa" class="col-md-4 col-form-label text-md-end">{{ __('Nama Siswa') }}</label>

                            <div class="col-md-6">
                                <input id="nama_siswa" type="text" class="form-control @error('nama_siswa') is-invalid @enderror" name="nama_siswa" value="{{ old('nama_siswa') }}" required autocomplete="nama_siswa" autofocus>

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
                                <input id="nama_lengkap" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required autocomplete="nama_lengkap" autofocus>

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
                                <input id="nis" type="number" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis') }}" required autocomplete="nis" autofocus>

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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


                  
                           


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
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
