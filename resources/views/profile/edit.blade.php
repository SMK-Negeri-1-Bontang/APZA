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
                    <label class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                    <input name="name" value="{{ old('name', $user->name) }}" class="form-input w-full border rounded px-3 py-2" required>
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
                <option value="user" @selected($user->role->role == 'user')>User</option>
                <option value="petugas" @selected($user->role->role == 'petugas')>Petugas</option>
            @else
                <option value="user" @selected($user->role->role == 'user')>User</option>
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
