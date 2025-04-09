@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-center">
        <div class="w-full lg:w-250 xl:w-250 p-6 bg-white rounded shadow-md">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold">{{ __('Jurusan') }}</h2>
                <a href="{{Route('jurusan.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fa fa-plus"></i>Tambah Jurusan
                </a>
            </div>

            @if($message =Session::get('success'))
            <div class="alert alert-success" role="alert">
                <strong>{{$message}}</strong>
            </div>
            @endif

            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">No.</th>
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">Kelas</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($jurusan))
                            @foreach($jurusan as $jrs)
                            <tr>
                                <td class="border px-4 py-2">{{$loop->iteration}}</td>
                                <td class="border px-4 py-2">{{$jrs->nama_jurusan}}</td>
                                <td class="border px-4 py-2">{{$jrs->kelas}}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{Route('jurusan.edit', $jrs->id)}}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                        <i class="fa fa-edit"></i>Edit
                                    </a>
                                    <form action="{{Route('jurusan.destroy', $jrs->id)}}" method="POST" style="display: inline;">
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
                @if(isset($jurusan))
                    {{$jurusan->links()}}
                @endif
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(".btn-delete").click(function(e){
    e.preventDefault();
    var form = $(this).parents("form");
    Swal.fire({
        title: "Konfirmasi Hapus Jurusan",
        text: "Apakah Anda Yakin Akan Menghapus Jurusan ini?",
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