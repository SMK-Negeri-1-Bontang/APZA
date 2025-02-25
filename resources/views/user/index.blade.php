@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="row justify-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('profile') }}</div>

                <div class="card-body">
                    @if($message =Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{$message}}</strong>
                    </div>
                    @endif
                    <a href="{{Route('user.create')}}" class="btn btn-success btn-md m-4"><i class="fa fa-plus"></i>Tambah User</a>
                    <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>                        
                    </thead>

                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->nama_lengkap}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{ucfirst($user->hasRole()->value('role'))}}</td>
                        <td>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-secondary mx-1 shadow" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.813z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>
                                    </a>
                            </div>
                            <form method="POST" action="{{ route('user.destroy',$user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-delete"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
</svg>
                                </button>
                            </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(".btn-delete").click(function(e){
    e.preventDefault();
    var form = $(this).parents("form");
    Swal.fire({
        title: "Konfirmasi Hapus User",
        text: "Apakah Anda Yakin Akan Menghapus User ini?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!"
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});
</script>
@endsection