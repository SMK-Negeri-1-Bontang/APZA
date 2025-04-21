<nav class="h-full px-4 py-6 space-y-2 text-sm">
    <div class="text-2xl font-bold mb-6">My App</div>


    <x-nav-link :href="route('profile.index')" :active="request()->routeIs('profile.index')"
        class="flex items-center space-x-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-700"
    >
        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6M4 15h16v6H4v-6z"/>
        </svg>
        <span>{{ __('profile') }}</span>
    </x-nav-link>


    
    @php
        $navItems = [
            ['label' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'home'],
            ['label' => 'User', 'route' => 'user.index', 'icon' => 'user'],
            ['label' => 'Absen', 'route' => 'absen.index', 'icon' => 'calendar'],
            ['label' => 'Jurusan', 'route' => 'jurusan.index', 'icon' => 'academic-cap'],
        ];
    @endphp

    @foreach($navItems as $item)
        <x-nav-link :href="route($item['route'])" :active="request()->routeIs($item['route'])"
            class="flex items-center space-x-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-700"
        >
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                @if($item['icon'] === 'home')
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6M4 15h16v6H4v-6z"/>
                @elseif($item['icon'] === 'user')
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A4.992 4.992 0 0112 14c1.306 0 2.417.835 2.879 2M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
                @elseif($item['icon'] === 'calendar')
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-4 4h4m-9 4h4M5 3h14a2 2 0 012 2v16a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                @elseif($item['icon'] === 'academic-cap')
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6"/>
                @endif
            </svg>
            <span>{{ __($item['label']) }}</span>
        </x-nav-link>
    @endforeach
</nav>
