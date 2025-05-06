@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <div class="flex justify-center">
        <div class="w-full lg:w-[600px] p-6 bg-white rounded shadow-md">
            <h2 class="text-2xl font-bold mb-4">{{ __('My Profile') }}</h2>

            @if(session('status'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Profile Picture') }}</label><br>
                    @if($user->profile_picture)
                        <img src="{{ asset('storage/' . $user->profile_picture) }}" width="100" class="mb-2 rounded">
                    @endif
                    <input type="file" name="profile_picture" class="form-input w-full border rounded px-3 py-2">
                </div>

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
               {{-- Jurusan --}}
       {{-- Jurusan --}}
       <select id="jurusan_id" name="jurusan_id" class="form-control" required>
    <option value="">-- Pilih Jurusan --</option>
    @foreach($jurusans as $jurusan)
        <option value="{{ $jurusan->id }}" @selected($user->jurusan_id == $jurusan->id)>{{ $jurusan->nama_jurusan }}</option>
    @endforeach
</select>

{{-- Kelas (dinamis) --}}
<select id="kelas_id" name="kelas_id" class="form-control" required>
    <option value="">-- Pilih Kelas --</option>
    @foreach($kelas as $k)
    <option value="{{ $k->id }}" @selected($user->kelas_id == $k->id)>{{ $k->nama_kelas }}</option>

    @endforeach
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

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-input w-full border rounded px-3 py-2" required>
                </div>
 
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <input type="password" name="password" class="form-input w-full border rounded px-3 py-2" placeholder="Leave blank if not changing">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                    <input type="password" name="password_confirmation" class="form-input w-full border rounded px-3 py-2" placeholder="Leave blank if not changing">
                </div>
                
                <div class="row mb-3">
    <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
    <div class="col-md-6">
        <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
            <option value="">Select Role</option>

            @if (auth()->user()->role->role == 'admin')
                <option value="admin" @selected($user->role->role == 'admin')>Admin</option>
                <option value="siswa" @selected($user->role->role == 'siswa')>Siswa</option>
                <option value="ketua_kelas" @selected($user->role->role == 'ketua_kelas')>Ketua Kelas</option>
            @else
                <option value="siswa" @selected($user->role->role == 'siswa')>Siswa</option>
            @endif

        </select>

        @error('role')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


                
                <input type="submit" value="{{ __('Update Profile') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            </form>
        </div>
    </div>
</div>
@endsection
