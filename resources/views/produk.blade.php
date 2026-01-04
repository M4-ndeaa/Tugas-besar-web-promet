@extends('layout.templateAdmin')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0 text-gray-800">Data Produk</h1>
    <a href="/produk/tambah" class="btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
    </a>
</div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama </th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th> 
                            <th>Tgl Input</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($produk->isEmpty())
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data di database</td>
                            </tr>
                        @else
                            @foreach ($produk as $item)
                                <tr>
                                    <td>
                                        <img class="rounded" 
                                             src="{{ asset('assets/img/' . $item->gambarProduk) }}" 
                                             alt="Produk" 
                                             style="width: 120px; height: 120px; object-fit: cover;">
                                    </td>
                                    <td>{{ $item->namaProduk }}</td> 
                                    <td>{{ $item->deskripsiProduk }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td>{{ $item->tanggalInput }}</td>
                                    <td>
                                        <a href="/produk/edit/{{ $item->id }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        
                                        <form action="/produk/hapus/{{ $item->id }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data?')">
                                                 <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                    </td>
                                </tr>
                            @endforeach 
                        @endif 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 