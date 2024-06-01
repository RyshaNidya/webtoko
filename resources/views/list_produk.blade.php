@extends('main')

@section('content')
<h1 class="text-3xl text-black pb-6">{{ $title }}</h1>
@if (session('sukses'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('sukses') }}</span>
    </div>
@elseif(session('gagal'))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <span class="block sm:inline">{{ session('gagal') }}</span>
</div>
@endif
<div class="w-full mt-6 ">
    <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> Tabel Data Produk Webtoko
    </p>
    <div class="bg-white  justify-center overflow-auto">
        <table class="min-w-full table-fixed  bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class=" w-1/12 text-left py-3 px-4 uppercase font-semibold text-bg">ID</th>
                    <th class=" w-1/8 text-left py-3 px-4 uppercase font-semibold text-bg">Nama Produk</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-bg">Deskripsi</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-bg">Harga</td>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-bg">Aksi</td>
                </tr>
            </thead>
            <tbody class="text-gray-700">   
                @foreach ($nama as $index => $item)
                <tr>
                    <td class=" text-left py-3 px-4">{{ $index + 1 }}</td>
                    <td class=" text-left py-3 px-4">{{ $item }}</td>
                    <td class=" text-left py-3 px-4">{{ $deskripsi[$index] }}</td>
                    <td class=" text-left py-3 px-4">Rp. {{ number_format($harga[$index] , 0, ',    ', '.')}}</td>
                    <td class=" text-left py-3 px-4">
                        <form action="{{ route('produk.delete', $id[$index]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white font-bold bg-red-500 py-1 px-2 rounded"  
                                    onclick="return confirm('Yakin ingin menghapus barang {{ $item }}')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><br>
    {{ $data->links() }}
    
</div> 
@endsection