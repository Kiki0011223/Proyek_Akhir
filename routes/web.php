<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\menu_utama_Controller;
use App\Http\Controllers\pengembalian_buku_Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pinjam_buku_Controller;


// Route sebelum user login
Route::get('/', function () {
    return view('welcome');
});

// Route agar dashboard bisa di akses setelah login
Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

// Route setelah user login
Route::middleware('auth')->group(function () {

    // Route untuk mengatur profile user
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route untuk menampilkan chart 
    Route::get('/dashboard', [menu_utama_Controller::class, 'chart'])->name('dashboard');

    // Route untuk menampilkan Tampilan menu utama , tabel pinjam buku dan tabel pengembalian buku
    Route::get('/Tampilan_pinjam_buku_tabel', [pinjam_buku_Controller::class, 'tabel'])->name('tabel_pinjam');
    Route::get('/Tampilan_pengembalian_buku_tabel', [pengembalian_buku_Controller::class, 'tabel'])->name('tabel_pengembalian');
    Route::get('/Tampilan_menu_utama', [menu_utama_Controller::class, 'tampil'])->name('Tampilan_menu_utama');

    // Route untuk menampilkan pinjam buku berdasarkan id buku yang di pinjam
    Route::get('/Tampil_pinjam_buku/{id_buku}', [menu_utama_Controller::class, 'tampil2'])->name('tampil2');

    // Route untuk membuat data baru pinjam buku berdasarkan id buku yang di pinjam
    Route::post('/Tampil_pinjam_buku/{id_buku}', [menu_utama_Controller::class, 'create_pinjam1'])->name('create_pinjam');

    // Route untuk tombol action kembalikan di menu pinjam buku
    Route::get('/Tampilan_pengembalian_buku/{id_pinjam}', [pinjam_buku_Controller::class, 'kembalikan']);

    // Route untuk membuat data baru pengembalian berdasarkan id pinjam setelah tombol kembalikan di tekan
    Route::post('/Tampilan_pengembalian_buku/{id_pinjam}', [pinjam_buku_Controller::class, 'create_pengembalian1'])
    ->name('create_pengembalian');
    
    // Route crud menu utama
    Route::get('/menu_utama_create', [menu_utama_Controller::class, 'create']);
    Route::post('/save', [menu_utama_Controller::class, 'save']);
    Route::get('/menu_utama_read', [menu_utama_Controller::class, 'read'])->name('menu_utama_read');
    Route::get('/menu_utama_update/{id_buku}', [menu_utama_Controller::class, 'update']);
    Route::post('/edit', [menu_utama_Controller::class, 'edit']);
    Route::get('/delete/{id_buku}', [menu_utama_Controller::class, 'delete']);
    Route::get('/menu_utama_view',[menu_utama_Controller::class, 'view']);
    
    // Route curd pengembalian buku
    Route::get('/pengembalian_create', [pengembalian_buku_Controller::class, 'create_pengembalian']);
    Route::post('/save_pengembalian', [pengembalian_buku_Controller::class, 'save_pengembalian']);
    Route::get('/pengembalian_read', [pengembalian_buku_Controller::class, 'read_pengembalian'])->name('pengembalian_read');
    Route::get('/pengembalian_update/{id_pengembalian}', [pengembalian_buku_Controller::class, 'update_pengembalian']);
    Route::post('/edit_pengembalian', [pengembalian_buku_Controller::class, 'edit_pengembalian']);
    Route::get('/delete_pengembalian/{id_pengembalian}', [pengembalian_buku_Controller::class, 'delete_pengembalian']);

    // Route curd pinjam buku
    Route::get('/pinjam_create', [pinjam_buku_Controller::class, 'create_pinjam']);
    Route::post('/save_pinjam', [pinjam_buku_Controller::class, 'save_pinjam']);
    Route::get('/pinjam_read', [pinjam_buku_Controller::class, 'read_pinjam'])->name('pinjam_read');
    Route::get('/pinjam_update/{id_pinjam}', [pinjam_buku_Controller::class, 'update_pinjam']);
    Route::post('/edit_pinjam', [pinjam_buku_Controller::class, 'edit_pinjam']);
    Route::get('/delete_pinjam/{id_pinjam}', [pinjam_buku_Controller::class, 'delete_pinjam']);
    
});

require __DIR__.'/auth.php';