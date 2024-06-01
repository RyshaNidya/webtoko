<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ListProdukController extends Controller
{
    public function show(){
        $data = Produk::paginate(5);
        foreach ($data as $produk){
            $id[] = $produk->id; 
            $nama[] = $produk->nama;
            $deskripsi[] = $produk->deskripsi;
            $harga[] = $produk->harga;
        }
        $title = "DAFTAR PRODUK";
        return view('list_produk', compact('data','id','nama', 'deskripsi', 'harga', 'title' ));
    }

    public function tambah(){
        $title = "TAMBAH PRODUK";

        return view('tambah', compact('title'));
    }

    public function simpan(Request $request){
        $produk = new Produk;
        $produk->nama = $request->input('nama');
        $produk->deskripsi = $request->input('deskripsi');
        $produk->harga = $request->input('harga');
        $produk->save();
        return redirect()->back()->with('sukses', 'Berhasil Menambahkan Produk Baru.');
    }

    public function delete($id){
        $produk = Produk::where('id', $id)->first();
        if($produk){
            $produk->delete();
            return redirect()->back()->with('sukses', 'Berhasil Menghapus data.');
        } else {
            return redirect()->back()->with('gagal', 'Gagal Menghapus data.');

        }
    }
}
