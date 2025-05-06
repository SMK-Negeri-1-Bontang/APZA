@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="container mx-auto p-4">
    <div class="flex justify-center">
        <div class="w-full lg:w-250 xl:w-250 p-6 bg-white rounded shadow-md">
            <div class="mb-4">
                <div class="card-header">Absen Siswa</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('absen') }}">
                        @csrf
                        <input type="hidden" name="jurusan_id" value="{{ $jurusan->id }}">
                        <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                        <input type="date" name="tanggal" value="{{ now()->toDateString() }}" required>

                        <table>
                            <thead>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <select name="status[{{ $user->id }}]" required>
                                            <option value="hadir">Hadir</option>
                                                <option value="sakit">Sakit</option>
                                                <option value="izin">Izin</option>
                                                <option value="alpa">Alpa</option>

                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <button type="submit">Simpan Absensi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
