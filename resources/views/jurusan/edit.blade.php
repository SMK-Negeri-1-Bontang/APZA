@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Jurusan</div>
                <div class="card-body">
                    <form method="post" action="{{route('jurusan.update', $jurusan->id)}}">
                        @csrf
                        @method('PATCH') <!-- Changed from PUT to PATCH -->
                        
                        <div class="row mb-3">
                            <label for="nama_jurusan" class="col-md-4 col-form-label text-md-end">{{ __('Nama Jurusan') }}</label>
                            <div class="col-md-6">
                                <input id="nama_jurusan" type="text" value="{{ $jurusan->nama_jurusan }}" class="form-control @error('nama_jurusan') is-invalid @enderror" name="nama_jurusan" value="{{ old('nama_jurusan') }}" required autocomplete="nama_jurusan" autofocus>
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
                                    <option value="{{ $jurusan->kelas }}">{{ $jurusan->kelas }}</option>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                    <option value="XIII">XIII</option>
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
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan') }}
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
