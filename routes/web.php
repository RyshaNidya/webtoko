<?php

use App\Http\Controllers\ListProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/produk', [ListProdukController::class , 'show']);
Route::get('/tambah', [ListProdukController::class , 'tambah']);
Route::post('/tambah', 
            [ListProdukController::class , 'simpan'])
            ->name('produk.simpan');
Route::delete('/produk/{id}', 
                [ListProdukController::class, 'delete'])
                ->name('produk.delete');

