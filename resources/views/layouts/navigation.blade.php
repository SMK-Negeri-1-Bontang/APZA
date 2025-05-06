<nav class="h-full w-64 bg-white dark:bg-gray-900 px-4 py-6 space-y-4 text-sm border-r dark:border-gray-700">
    {{-- Logo --}}
    <div class="flex items-center gap-4 mb-8">
        <img src="https://3.bp.blogspot.com/-gavKyb1tAbE/VjlxeyGbu7I/AAAAAAAAAXU/V0fTfHFIn5A/s1600/logo%2Bsmk1.jpg" alt="Logo" class="w-12 h-12 rounded-full shadow-md object-cover">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white"> APZA</h1>
    </div>

    {{-- Profile Link --}}
    <x-nav-link :href="route('profile.index')" :active="request()->routeIs('profile.index')"
        class="flex items-center space-x-3 px-3 py-2 rounded-md font-medium hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-800 dark:text-gray-200 cursor-pointer"
    >
        @if(Auth::user() && Auth::user()->profile_picture)
            <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" class="w-8 h-8 rounded-full object-cover">
        @else
            <svg class="w-8 h-8 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5.121 17.804A4.992 4.992 0 0112 14c1.306 0 2.417.835 2.879 2M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        @endif
        <span>{{ __('Profile') }}</span>
    </x-nav-link>

    {{-- Menu Items --}}
    <ul class="space-y-2">
        @php
            $navItems = [
                ['label' => 'Home', 'route' => 'welcome', 'icon' => 'home', 'roles' => ['admin', 'ketua_kelas', 'siswa']],
                ['label' => 'Dashboard', 'route' => 'dashboard.index', 'icon' => 'home', 'roles' => ['admin', 'ketua_kelas', 'siswa']],
                ['label' => 'Absen', 'route' => 'absen.create', 'icon' => 'calendar', 'roles' => ['admin', 'ketua_kelas', 'siswa']],
                ['label' => 'User', 'route' => 'user.index', 'icon' => 'user', 'roles' => ['admin']],
                ['label' => 'Absen', 'route' => 'absen.index', 'icon' => 'calendar', 'roles' => ['ketua_kelas', 'admin']],
                ['label' => 'Jurusan', 'route' => 'jurusan.index', 'icon' => 'academic-cap', 'roles' => ['ketua_kelas', 'admin']],
                ['label' => 'Laporan Izin', 'route' => 'izin.index', 'icon' => 'file-document', 'roles' => ['ketua_kelas', 'admin']],
                ['label' => 'Riwayat Izin Saya', 'route' => 'izin.saya', 'icon' => 'file-document', 'roles' => ['admin', 'ketua_kelas', 'siswa']],
                ['label' => 'Kelas', 'route' => 'kelas.index', 'icon' => 'academic-cap', 'roles' => ['admin']],

            ];
        @endphp
        @foreach($navItems as $item)
    @if(auth()->check() && in_array(auth()->user()->role->role, $item['roles']))
        <li>
            <x-nav-link :href="route($item['route'])" :active="request()->routeIs($item['route'])"
                class="flex items-center space-x-3 px-3 py-2 rounded-md font-medium hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-800 dark:text-gray-200 cursor-pointer"
            >
                {{-- Icon --}}
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    @switch($item['icon'])
                        @case('home')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6M4 15h16v6H4v-6z"/>
                        @break

                        @case('user')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M5.121 17.804A4.992 4.992 0 0112 14c1.306 0 2.417.835 2.879 2M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
                        @break

                        @case('calendar')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10m-4 4h4m-9 4h4M5 3h14a2 2 0 012 2v16a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                        @break

                        @case('academic-cap')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 14l9-5-9-5-9 5 9 5zm0 0v6"/>
                        @break

                        @case('file-document')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M7 8h10M7 12h4m1 8l2-2m-4 0a2 2 0 012-2V5a2 2 0 012 2h3l2 2v1a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                        @break

                        @case('file-document')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M7 8h10M7 12h4m1 8l2-2m-4 0a2 2 0 012-2V5a2 2 0 012 2h3l2 2v1a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                        @break
                    @endswitch
                </svg>
                <span>{{ __($item['label']) }}</span>
            </x-nav-link>
        </li>
    @endif
@endforeach

    </ul>
</nav>
