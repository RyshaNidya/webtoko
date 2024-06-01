@extends('main')

@section('content')

<h1 class="text-3xl text-black pb-6">{{ $title }}</h1>

@if (session('sukses'))
  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
      <span class="block sm:inline">{{ session('sukses') }}</span>
  </div>
@endif
<div class="flex flex-wrap">
  <div class="w-full  my-6 pr-0 lg:pr-2">
      <p class="text-xl pb-6 flex items-center">
          <i class="fas fa-list mr-3"></i> Forum Tambah Produk
      </p>
      <div class="leading-loose">
          <form class="p-10 bg-white rounded shadow-xl" method="POST" 
          action="{{ route('produk.simpan') }}">
            @csrf
              <div class="">
                  <label class="block text-bg text-gray-600" for="nama">Nama Produk</label>
                  <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="nama" 
                  name="nama" type="text" required="" placeholder="Nama Produk" aria-label="Name">
              </div>
              <div class="mt-2">
                  <label class=" block text-bg text-gray-600" for="deskripsi">Deskripsi Produk</label>
                  <textarea class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="deskripsi" 
                  name="deskripsi" rows="3" required="" placeholder="Deskripsi..." aria-label="deskripsi">
                </textarea>
              </div>
              <div class="mt-2">
                <label class="block text-bg text-gray-600" for="harga">Harga Produk</label>
                <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="harga" 
                name="harga" type="number" required="" placeholder="Harga Produk" aria-label="Harga">
            </div>
              <div class="mt-6">
                  <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" 
                  type="submit">Submit</button>
              </div>    
          </form>
      </div>
  </div>
</div>
@endsection
