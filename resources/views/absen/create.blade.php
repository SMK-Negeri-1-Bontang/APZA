@extends('layouts.app')

@section('content')
<div class="container">
<div class="container mx-auto p-4">
    <div class="flex justify-center">
        <div class="w-full lg:w-250 xl:w-250 p-6 bg-white rounded shadow-md">
            <div class=" mb-4">
                <div class="card-header">Tambah User</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('absen.store') }}" enctype="multipart/form-data">
                        @csrf
                        


                  


                        
                        <div class="row mb-3">
                            <label for="user_id" class="col-md-4 col-form-label text-md-end">{{ __('User') }}</label>
                            <div class="col-md-6">
                                <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="jurusan_id" class="col-md-4 col-form-label text-md-end">{{ __('Jurusan') }}</label>
                            <div class="col-md-6">
                                <select id="jurusan_id" name="jurusan_id" class="form-control @error('jurusan_id') is-invalid @enderror" required>
                                    @foreach($jurusan as $jurusans )
                                        <option value="{{ $jurusans->id }}">{{ $jurusans->nama_jurusan }}</option>
                                    @endforeach
                                </select>
                                @error('jurusan_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="row mb-3">
                            <label for="kehadiran" class="col-md-4 col-form-label text-md-end">{{ __('Kehadiran') }}</label>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kehadiran" id="hadir" value="Hadir" required>
                                    <label class="form-check-label" for="hadir">
                                        Hadir
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kehadiran" id="tidakHadir" value="Tidak Hadir" required>
                                    <label class="form-check-label" for="tidakHadir">
                                        Tidak Hadir
                                    </label>
                                </div>


                                <!-- Izin -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kehadiran" id="izin" value="Izin" required>
                                    <label class="form-check-label" for="izin">Izin</label>
                                </div>
                                <div id="alasanIzinContainer" class="mt-3" style="display: none;">
                                    <div class="form-group mb-2">
                                        <label for="alasan" class="col-form-label">Alasan Izin</label>
                                        <textarea name="alasan" id="alasan" class="form-control @error('alasan') is-invalid @enderror" required>{{ old('alasan', $absen->laporanIzin->alasan ?? '') }}</textarea>
                                        @error('alasan')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="bukti" class="col-form-label">Upload Bukti (Optional)</label>
                                        <input id="bukti" type="file" class="form-control @error('bukti') is-invalid @enderror" name="bukti" accept=".jpg, .jpeg, .png, .pdf">
                                        @error('bukti')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kehadiran" id="tidakAdaKeterangan" value="Tidak ada keterangan" required>
                                    <label class="form-check-label" for="tidakAdaKeterangan">
                                        Tidak ada keterangan
                                    </label>
                                </div>
                                @error('kehadiran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700">
                                    {{ __('Already registered?') }}
                                </a>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    document.addEventListener('DOMContentLoaded', function () {
        const kehadiranRadios = document.querySelectorAll('input[name="kehadiran"]');
        const alasanContainer = document.getElementById('alasanIzinContainer');
        const alasanInput = document.getElementById('alasan');
        const buktiInput = document.getElementById('bukti');

        function toggleAlasanIzin() {
            const izinChecked = document.querySelector('input[name="kehadiran"][value="Izin"]:checked');
            if (izinChecked) {
                alasanContainer.style.display = 'block';
                alasanInput.setAttribute('required', 'required');
                buktiInput.setAttribute('required', 'required');
            } else {
                alasanContainer.style.display = 'none';
                alasanInput.removeAttribute('required');
                buktiInput.removeAttribute('required');
            }
        }

        kehadiranRadios.forEach(radio => {
            radio.addEventListener('change', toggleAlasanIzin);
        });

        toggleAlasanIzin(); // Cek pertama kali
    });
</script>


@endsection
