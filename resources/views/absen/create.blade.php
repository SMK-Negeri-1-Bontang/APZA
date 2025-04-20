@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah User</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('absen.store') }}">
                        @csrf
                        


                  


                        
                        <div class="row mb-3">
                            <label for="user_id" class="col-md-4 col-form-label text-md-end">{{ __('User') }}</label>
                            <div class="col-md-6">
                                <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<!-- 
                        <div class="row mb-3">
                            <label for="jurusan_id" class="col-md-4 col-form-label text-md-end">{{ __('Nama Jurusan dan kelas ') }}</label>
                            <div class="col-md-6">
                                <select id="jurusan_id" name="jurusan_id" class="form-control @error('jurusan_id') is-invalid @enderror" required>
                                    @foreach($jurusans as $jurusan)
                                        <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }} - {{ $jurusan->kelas }}</option>
                                    @endforeach
                                </select>
                                @error('jurusan_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->
                        
                        <div class="row mb-3">
                            <label for="jurusan_id" class="col-md-4 col-form-label text-md-end">{{ __('Jurusan') }}</label>
                            <div class="col-md-6">
                                <select id="jurusan_id" name="jurusan_id" class="form-control @error('jurusan_id') is-invalid @enderror" required>
                                    @foreach($jurusans as $jurusan)
                                        <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                                @error('jurusan_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
