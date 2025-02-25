@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-center">
        <div class="w-full lg:w-8/12 xl:w-6/12 p-6 bg-white rounded shadow-md">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold">{{ __('Edit User') }}</h2>
            </div>

            <form method="post" action="{{route('user.update', $user->id)}}" class="space-y-4">
                @csrf
                @method('PUT')
                
                <div class="flex flex-col">
                    <label for="name" class="text-sm font-semibold text-gray-600">{{ __('Name') }}</label>
                    <input id="name" type="text" value="{{ $user->name }}" class="form-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="nama_lengkap" class="text-sm font-semibold text-gray-600">{{ __('Nama Lengkap') }}</label>
                    <input id="nama_lengkap" value="{{ $user->nama_lengkap }}" type="text" class="form-input @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required autocomplete="nama_lengkap" autofocus>
                    @error('nama_lengkap')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="email" class="text-sm font-semibold text-gray-600">{{ __('Email') }}</label>
                    <input id="email" type="email" value="{{ $user->email }}" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="hp" class="text-sm font-semibold text-gray-600">{{ __('No HP') }}</label>
                    <input id="hp" type="text" value="{{ $user->hp }}" class="form-input @error('hp') is-invalid @enderror" name="hp" value="{{ old('hp') }}" required autocomplete="hp">
                    @error('hp')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="password" class="text-sm font-semibold text-gray-600">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password">
                    <span class="text-xs text-red-500">Kosongkan jika tidak ingin merubah password</span>
                    @error('password')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="role" class="text-sm font-semibold text-gray-600">{{ __('Level') }}</label>
                    <select id="role" name="role" class="form-input @error('role') is-invalid @enderror" required>
                        <option value="{{ $user->hasRole()->value('role') }}">{{ ucfirst($user->hasRole()->value('role')) }}</option>
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                        <option value="user">User</option>
                    </select>
                    @error('role')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Simpan') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
