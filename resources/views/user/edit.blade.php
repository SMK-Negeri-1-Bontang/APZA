@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="container mx-auto p-4">
    <div class="flex justify-center">
        <div class="w-full lg:w-250 xl:w-250 p-6 bg-white rounded shadow-md">
            <div class=" mb-4">
                    <form method="post" action="{{route('user.update', $user->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Nama Siswa') }}</label>
                    <input name="nama_siswa" value="{{ old('nama_siswa', $user->nama_siswa) }}" class="form-input w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Nama Lengkap') }}</label>
                    <input name="nama_lengkap" value="{{ old('nama_lengkap', $user->nama_lengkap) }}" class="form-input w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">{{ __('NIS') }}</label>
                    <input name="nis" value="{{ old('nis', $user->nis) }}" class="form-input w-full border rounded px-3 py-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Jurusan') }}</label>
                    <select name="jurusan_id" class="form-input w-full border rounded px-3 py-2" required>
                        @foreach($jurusans as $jurusan)
                            <option value="{{ $jurusan->id }}" @selected($user->jurusan_id == $jurusan->id)>{{ $jurusan->nama_jurusan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Kelas') }}</label>
                    <select name="kelas_id" class="form-input w-full border rounded px-3 py-2" required>
                        @foreach($kelas as $kelas)
                            <option value="{{ $kelas->id }}" @selected($user->kelas_id == $kelas->id)>{{ $kelas->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-input w-full border rounded px-3 py-2" required>
                </div>

                <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
            <option value="">Select Role</option>

            @if (auth()->user()->role->role == 'admin')
                <option value="admin" @if($user->role->role == 'admin') selected @endif>Admin</option>
                <option value="siswa" @if($user->role->role == 'siswa') selected @endif>Siswa</option>
                <option value="ketua_kelas" @if($user->role->role == 'ketua_kelas') selected @endif>Ketua Kelas</option>
            @endif
        </select>

                      

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                <span style="font-size:8; color:red;">Kosongkan jika tidak ingin merubah password</span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                   

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
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
