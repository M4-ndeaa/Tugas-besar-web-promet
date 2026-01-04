<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

// --- HALAMAN AUTH & LOGIN ---
Route::get('/', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth');
Route::post('/profile/update', [AuthController::class, 'updateProfile'])->middleware('auth');

// --- HALAMAN UTAMA (USER) ---
Route::get('/welcome', [AuthController::class, 'welcome'])->name('welcome');

// --- MANAGEMENT PRODUK (ADMIN) ---
Route::get('/produk', [ProdukController::class, 'index'])->middleware('role:1');
Route::get('/produk/tambah', [ProdukController::class, 'create'])->middleware('role:1');
Route::post('/produk/simpan', [ProdukController::class, 'store'])->middleware('role:1');
Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->middleware('role:1');
Route::post('/produk/update/{id}', [ProdukController::class, 'update'])->middleware('role:1');
Route::delete('/produk/hapus/{id}', [ProdukController::class, 'destroy'])->middleware('role:1');

// --- SISTEM KERANJANG ---
Route::get('/keranjang', function () { return view('keranjang'); });
Route::post('/keranjang/tambah/{id}', [TransaksiController::class, 'tambahKeranjang']);
Route::post('/keranjang/hapus/{id}', [TransaksiController::class, 'hapusKeranjang']);

// --- SISTEM CHECKOUT & TRANSAKSI ---
Route::post('/checkout/simpan', [TransaksiController::class, 'store']);
Route::get('/pesanan', [TransaksiController::class, 'index'])->middleware('role:1');
Route::get('/checkout/sukses', function () {return view('checkout_sukses'); });
