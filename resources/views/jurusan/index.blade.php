@extends('layouts.app')

@section('content')
<div class="overflow-x-auto rounded-lg shadow">
    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
    <a href="{{Route('jurusan.create')}}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold py-1.5 px-4 rounded-lg ml-2 transition">
                            <i class="fa fa-plus mr-1"></i>Tambah Jurusan
                        </a>
        <thead class="bg-gray-50">
            <tr class="text-left text-sm font-semibold text-gray-700">
                <th class="px-6 py-3 border-b border-gray-200">No.</th>
                <th class="px-6 py-3 border-b border-gray-200">Nama</th>
                <th class="px-6 py-3 border-b border-gray-200">Kelas</th>
                <th class="px-6 py-3 border-b border-gray-200">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-sm text-gray-700">
            @if(isset($jurusan))
                @foreach($jurusan as $jrs)
                <tr class="hover:bg-gray-100 transition duration-150">
                    <td class="px-6 py-4 border-b border-gray-200">{{$loop->iteration}}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{$jrs->nama_jurusan}}</td>
                    <td class="px-6 py-4 border-b border-gray-200">{{$jrs->kelas}}</td>
                    <td class="px-6 py-4 border-b border-gray-200">
                        <a href="{{Route('jurusan.edit', $jrs->id)}}" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-1.5 px-4 rounded-lg mr-2 transition">
                            <i class="fa fa-edit mr-1"></i>Edit
                        </a>
                        <form action="{{Route('jurusan.destroy', $jrs->id)}}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete bg-red-500 hover:bg-red-600 text-white font-semibold py-1.5 px-4 rounded-lg transition">
                                <i class="fa fa-trash mr-1"></i>Hapus
                            </button>
                        </form>
                       
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    @if(isset($jurusan))
        <div class="mt-4">
            {{$jurusan->links()}}
        </div>
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