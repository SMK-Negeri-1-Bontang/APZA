
<h2>Pilih Jurusan dan Kelas</h2>

<a href="{{ route('absen.input') }}" class="btn btn-primary">Input Absen</a>

<form action="{{ route('absen.input') }}" method="GET">

    <div class="form-group">
        <label for="jurusan_id">Jurusan:</label>
        <select name="jurusan_id" id="jurusan_id" required>
            @foreach ($jurusans as $jurusan)
                <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="kelas_id">Kelas:</label>
        <select name="kelas_id" id="kelas_id" required>
            @foreach ($kelas as $kelas)
                <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Lanjut Isi Absen</button>
</form>

