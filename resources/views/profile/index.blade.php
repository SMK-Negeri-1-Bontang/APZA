@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
<div class="row justify-content-center">
    <div class="container mx-auto p-4">
    <div class="flex justify-center">
        <div class="w-full lg:w-250 xl:w-250 p-6 bg-white rounded shadow-md">
            <div class=" mb-4">
    <h2 class="text-2xl font-bold mb-4">My Profile</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($user->profile_picture)
    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="w-24 h-24 rounded-full object-cover">
@else
    <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile" class="w-24 h-24 rounded-full object-cover">
@endif


    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">Name</label>
        <input name="name" value="{{ old('name', $user->name) }}" class="form-input" disabled>
    </div>

    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">nis</label>
        <input name="phone" value="{{ old('phone', $user->nis) }}" class="form-input" disabled>
    </div>

    <div class="mb-3">
        <label class="block text-sm font-medium text-gray-700">email</label>
        <textarea name="address" class="form-textarea" disabled>{{ old('address', $user->email) }}</textarea>
    </div>

    <a href="{{ route('profile.edit') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Profile</a>

<a href="{{ route('logout') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</div>
@endsection
