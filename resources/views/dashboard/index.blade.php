@extends('layouts.app')

@section('content')
<div class="p-4">
    <h1 class="text-2xl font-bold mb-4">BERITA SMAKENZA</h1>

    <div class="bg-white p-6 rounded shadow-md">
        <h2 class="text-xl font-semibold mb-2">SMKN 1 Bontang Raih Prestasi di Ajang Lomba Keterampilan Siswa Nasional</h2>
        <p class="text-gray-600 text-sm mb-4">Dipublikasikan pada 7 Mei 2025</p>

        <p class="mb-4">
            Bontang – SMK Negeri 1 Bontang kembali menorehkan prestasi membanggakan. Dalam ajang Lomba Kompetensi Siswa (LKS) tingkat nasional yang diadakan pada akhir April 2025, tim dari jurusan Teknik Komputer dan Jaringan (TKJ) berhasil meraih juara 1 setelah melalui berbagai tahapan seleksi ketat.
        </p>

        <p class="mb-4">
            Kepala sekolah SMKN 1 Bontang, Ibu Siti Rahmawati, M.Pd, menyampaikan rasa bangga dan apresiasi tinggi kepada para siswa dan guru pembimbing. “Ini adalah hasil dari kerja keras dan kolaborasi yang luar biasa antara siswa, guru, dan seluruh pihak sekolah,” ujarnya.
        </p>

        <p class="mb-4">
            Dengan capaian ini, SMKN 1 Bontang semakin menunjukkan eksistensinya sebagai salah satu SMK unggulan di Kalimantan Timur yang konsisten mencetak lulusan berkualitas dan siap kerja.
        </p>

        <div class="mt-6">
            <a href="{{ url('/') }}" class="inline-block bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
                ← Kembali ke Beranda
            </a>
        </div>
    </div>

    {{-- LINK SOSIAL MEDIA YANG DITINGKATKAN --}}
<div class="mt-10 border-t pt-6">
    <h3 class="text-lg font-semibold mb-4">Ikuti Kami di Media Sosial</h3>
    <div class="flex flex-wrap gap-4">
        <a href="https://facebook.com/yourpage" target="_blank" class="flex items-center space-x-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12a10 10 0 10-11.5 9.9v-7h-2v-3h2v-2.3c0-2 1.2-3.1 3-3.1.9 0 1.8.1 1.8.1v2h-1c-1 0-1.3.6-1.3 1.2V11h2.3l-.4 3h-1.9v7A10 10 0 0022 12z"/></svg>
            <span>Facebook</span>
        </a>
        <a href="https://instagram.com/yourpage" target="_blank" class="flex items-center space-x-2 bg-gradient-to-r from-pink-500 to-yellow-500 text-white px-4 py-2 rounded hover:opacity-90 transition">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M7.5 2A5.5 5.5 0 002 7.5v9A5.5 5.5 0 007.5 22h9a5.5 5.5 0 005.5-5.5v-9A5.5 5.5 0 0016.5 2h-9zM12 7a5 5 0 110 10 5 5 0 010-10zm6.5-.75a1.25 1.25 0 11-2.5 0 1.25 1.25 0 012.5 0zM12 9a3 3 0 100 6 3 3 0 000-6z"/></svg>
            <span>Instagram</span>
        </a>
        <a href="https://tiktok.com/@yourpage" target="_blank" class="flex items-center space-x-2 bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition">
            <img src="https://www.pngall.com/wp-content/uploads/13/TikTok-Logo-PNG-Image-HD.png" alt="Icon" class="w-5 h-5">
            <span>TikTok</span>
        </a>

        
        <a href="https://youtube.com/yourchannel" target="_blank" class="flex items-center space-x-2 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.6 3H4.4A1.4 1.4 0 003 4.4v15.2A1.4 1.4 0 004.4 21h15.2a1.4 1.4 0 001.4-1.4V4.4A1.4 1.4 0 0019.6 3zM10 15V9l5 3-5 3z"/></svg>
            <span>YouTube</span>
        </a>
    </div>
</div>

@endsection
