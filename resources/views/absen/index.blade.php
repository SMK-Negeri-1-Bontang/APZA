@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tabel Absen') }}</div>

                <div class="card-body">
                    @if($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{$message}}</strong>
                    </div>
                    @endif
                    <a href="{{Route('absen.create')}}" class="btn btn-success btn-md m-4"><i class="fa fa-plus"></i>Tambah Absen</a>
                    <table class="table table-strip table-bordered">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Siswa</th>
                        <th>Jurusan</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>                        
                    </thead>

                    <tbody>
                    @if(isset($absen))
                    @foreach($absen as $absen)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$absen->user->name}}</td>
                        <td>{{$absen->jurusan->nama_jurusan}}</td>
                        <td>{{$absen->Jurusan->kelas }}</td>
                        <td>
                        <a href="{{Route('absen.edit', ['user_id' => $absen->user_id])}}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                        <i class="fa fa-edit"></i>Edit
                                    </a>
                                    <form action="{{Route('absen.destroy', ['id' => $absen->id])}}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded btn-delete">
                                            <i class="fa fa-trash"></i>Hapus
                                        </button>
                                    </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                    </table>
                    {{-- Removed pagination links as per instructions --}}
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
{{-- Removed delete confirmation script as per instructions --}}
</script>
@endsection