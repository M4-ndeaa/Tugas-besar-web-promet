@extends('layout.templateAdmin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0 text-gray-800">Ubah Produk </h1>
        <a href="/produk" class="btn btn-sm btn-secondary shadow-sm">Kembali</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="/produk/update/{{ $produk->id }}" method="POST" enctype="multipart/form-data">
                 @csrf

                 <div class="mb-3">
                    <label class="form-label">Gambar Produk</label>
                    <input type="file" name="gambarProduk" class="form-control" value="{{ old('gambarProduk', $produk->gambarProduk) }}" required> 
                    <small class="text-muted">Format: JPG  Maks: 2MB</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="namaProduk" class="form-control" value="{{ old('namaProduk', $produk->namaProduk) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi Produk</label>
                    <textarea name="deskripsiProduk" class="form-control" rows="3">{{ old('deskripsiProduk', $produk->deskripsiProduk) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Baju">Baju</option>
                        <option value="Celana">Celana</option>
                        <option value="Aksesoris">Aksesoris</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="text" name="harga" class="form-control" value="{{ old('harga', $produk->harga) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" class="form-control" value="{{ old('stok', $produk->stok) }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perebuhan Produk</button>
            </form>
        </div>
    </div>
</div>
@endsection