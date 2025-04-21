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
                    <label class="block text-sm font-medium text-gray-700">{{ __('NIS') }}</label>
                    <input name="nis" value="{{ old('nis', $user->nis) }}" class="form-input w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-input w-full border rounded px-3 py-2" required>
                </div>
 
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <input type="password" name="password" class="form-input w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
                    <input type="password" name="password_confirmation" class="form-input w-full border rounded px-3 py-2" required>
                </div>

                <input type="submit" value="{{ __('Update Profile') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            </form>
        </div>
    </div>
</div>
@endsection
