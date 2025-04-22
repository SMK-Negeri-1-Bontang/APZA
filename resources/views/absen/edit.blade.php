@extends('layouts.app')

@section('content')
<div class="container">
<div class="container mx-auto p-4">
    <div class="flex justify-center">
        <div class="w-full lg:w-250 xl:w-250 p-6 bg-white rounded shadow-md">
            <div class=" mb-4">
                <div class="card-header">Edit Absen</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('absen.update', ['user_id' => $absen->user_id]) }}">
                        @csrf
                        @method('PATCH')
                        
                        <div class="row mb-3">
                            <label for="user_id" class="col-md-4 col-form-label text-md-end">{{ __('User') }}</label>
                            <div class="col-md-6">
                                <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $user->id == $absen->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="jurusan_id" class="col-md-4 col-form-label text-md-end">{{ __('Jurusan') }}</label>
                            <div class="col-md-6">
                                <select id="jurusan_id" name="jurusan_id" class="form-control @error('jurusan_id') is-invalid @enderror" required>
                                    @foreach($jurusans as $jurusan)
                                        <option value="{{ $jurusan->id }}" {{ $jurusan->id == $absen->jurusan_id ? 'selected' : '' }}>{{ $jurusan->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                                @error('jurusan_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kehadiran" class="col-md-4 col-form-label text-md-end">{{ __('Kehadiran') }}</label>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kehadiran" id="hadir" value="Hadir" required @checked($absen->kehadiran == 'Hadir')>
                                    <label class="form-check-label" for="hadir">
                                        Hadir
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kehadiran" id="tidakHadir" value="Tidak Hadir" required @checked($absen->kehadiran == 'Tidak Hadir')>
                                    <label class="form-check-label" for="tidakHadir">
                                        Tidak Hadir
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kehadiran" id="izin" value="Izin" required @checked($absen->kehadiran == 'Izin')>
                                    <label class="form-check-label" for="izin">
                                        Izin
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kehadiran" id="tidakAdaKeterangan" value="Tidak ada keterangan" required @checked($absen->kehadiran == 'Tidak ada keterangan')>
                                    <label class="form-check-label" for="tidakAdaKeterangan">
                                        Tidak ada keterangan
                                    </label>
                                </div>
                                @error('kehadiran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{ route('absen.index') }}" class="inline-block text-blue-500 hover:text-blue-700">
                                    {{ __('Back to Absen List') }}
                                </a>
                                <button type="submit" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    {{ __('Update') }}
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
