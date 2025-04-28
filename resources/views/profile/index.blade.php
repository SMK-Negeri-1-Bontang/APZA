@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <div class="bg-white rounded-lg shadow-md p-6 flex flex-col lg:flex-row gap-8">
        
        <!-- Profile Photo -->
        <div class="flex flex-col items-center text-center lg:w-1/3">
            @if($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="w-32 h-32 rounded-full object-cover mb-4">
            @else
                <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile" class="w-32 h-32 rounded-full object-cover mb-4">
            @endif
        </div>

        <!-- Biodata -->
        <div class="lg:w-2/3">
            <h2 class="text-2xl font-bold mb-4">My Profile</h2>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700">
                <div>
                    <p class="font-semibold">Name</p>
                    <p>{{ $user->name}}</p>
                </div>

                <div>
                    <p class="font-semibold">Nama Lengkap</p>
                    <p>{{ $user->nama_lengkap}}</p>
                </div>
                <div>
                    <p class="font-semibold">Email</p>
                    <p>{{ $user->email }}</p>
                </div>
                <div>
                    <p class="font-semibold">NIS</p>
                    <p>{{ $user->nis }}</p>
                </div>
                <div>
                    <p class="font-semibold">Role</p>
                    <p>{{ $user->role->role}}</p>
                </div>

               
                
                <!-- Draw a line on the table -->
                <hr class="w-full my-4 border-t border-gray-200">
                
            </div>

            <div class="mt-6 flex gap-4">
                <a href="{{ route('profile.edit') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>

                <a href="{{ route('logout') }}"
                   class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>




@endsection
