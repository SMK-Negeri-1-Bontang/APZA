<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-3xl font-extrabold text-gray-800 dark:text-white">
                {{ __('Welcome Back!') }}
            </h2>
            <div class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 px-3 py-1 rounded-full text-sm font-medium">
                {{ __('Status: Online') }}
            </div>
        </div>
 
    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <!-- Welcome Card -->
            <div class="bg-white dark:bg-gray-900 shadow-xl rounded-2xl p-8 transition-all hover:shadow-2xl">
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">👋 {{ __("You're logged in!") }}</h3>
                <p class="text-gray-600 dark:text-gray-300">Glad to see you again. Explore your dashboard and keep being productive!</p>
            </div>

            <!-- Dashboard Highlights -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <a href="{{ route('absen.create') }}" class="bg-gradient-to-br from-cyan-500 to-blue-500 text-white p-6 rounded-2xl shadow-lg">
                    <h4 class="text-xl font-semibold mb-2">ayo absen</h4>
                    <p class="text-sm">Submit a new absence request.</p>
                </a>
                <!-- Card 2 -->
                <a href="{{ route('kehadiran.chart') }}" class="bg-gradient-to-br from-purple-500 to-pink-500 text-white p-6 rounded-2xl shadow-lg">
                    <h4 class="text-xl font-semibold mb-2">Izin chart </h4>
                    <p class="text-sm">chart izin</p>
                </a>
                <!-- Card 3 -->
                <a href="{{ route('izin.index') }}" class="bg-gradient-to-br from-emerald-500 to-teal-500 text-white p-6 rounded-2xl shadow-lg">
                    <h4 class="text-xl font-semibold mb-2">Laporan</h4>
                    <p class="text-sm">Check new messages, alerts, and updates.</p>
                </a>
            </div>

            <!-- Extra Section: Quick Tips -->
            <div class="bg-white dark:bg-gray-800 border dark:border-gray-700 p-6 rounded-xl mt-6">
                <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-3">💡 Quick Tips</h4>
                <ul class="list-disc list-inside text-sm text-gray-700 dark:text-gray-300 space-y-1">
                    <li>Use the top menu to navigate through the app.</li>
                    <li>Dark mode is automatically enabled based on your system preference.</li>
                    <li>Check the Projects tab for your latest updates.</li>
                </ul>
            </div>
        </div>
    </div>

    </x-slot>

</x-app-layout>