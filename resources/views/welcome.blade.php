@extends('layout.templateAdmin')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    .new-product-container {
        display: flex; 
        justify-content: center; 
        align-items: center;
        gap: 30px; 
        background: #fdfdfd;
        border-radius: 30px;
        padding: 40px; 
        margin-bottom: 50px;
        border: 1px solid #eee;
    }

    .img-new {
        width: 300px;  
        height: 400px; 
        object-fit: cover; 
        object-position: center;
        border-radius: 20px;
        border: 8px solid white;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .img-new:hover {
        transform: translateY(-10px); 
    }

    .produk-card {
        border: none;
        border-radius: 20px;
        transition: 0.3s;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .produk-card:hover {
        transform: translateY(-5px);
    }
</style>

<div class="container-fluid p-4">

    @if(session('data_order'))
    <div class="alert alert-success alert-dismissible fade show shadow border-0 mb-5" role="alert" style="border-radius: 20px; background: #d4edda;">
        
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="outline: none; padding: 20px;">
            <span aria-hidden="true" style="font-size: 2.5rem;">&times;</span>
        </button>

        <div class="p-3">
            <h4 class="font-weight-bold text-success"><i class="bi bi-check-circle-fill"></i> Pembayaran Slay Berhasil!</h4>
            <hr>
            <p class="mb-1">Terima kasih, <b>{{ session('data_order')['pembeli'] }}</b>! Pesananmu sedang disiapkan.</p>
            <p class="mb-1">Total yang dibayar: <b>Rp {{ number_format(session('data_order')['total'], 0, ',', '.') }}</b></p>
            <p class="small text-muted mb-0">Rincian Barang: <br> {!! nl2br(e(session('data_order')['barang'])) !!}</p>
        </div>
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-warning alert-dismissible fade show shadow-sm" role="alert" style="border-radius: 15px;">
        <i class="bi bi-stars"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="text-center mb-5">
        <img src="{{ asset('assets/img/logo.jpeg') }}" class="rounded-circle shadow-sm" style="width: 130px; height: 130px; object-fit: cover;">
        <h1 class="mt-3 font-weight-bold text-gray-800">WELCOME TO BUTIK DEA SLAYYY</h1>
        <p class="text-muted">Defining Professionalism through Modern Style and Exquisite Details</p>
    </div>

    <h2 class="h4 mb-4 font-weight-bold text-uppercase" style="letter-spacing: 2px;">
        <i class="bi bi-stars text-warning"></i> New Produk
    </h2>
    
    <div class="new-product-container shadow-sm">
        <img src="{{ asset('assets/img/baru1.jpeg') }}" class="img-new">
        <img src="{{ asset('assets/img/baru2.jpeg') }}" class="img-new">
    </div>

    <h2 class="h4 mb-4 font-weight-bold text-uppercase" style="letter-spacing: 2px;">Koleksi Butik Dea Slayy</h2>
    
    <!-- memagil data yang ada pada database produk -->
    <div class="row">
        @foreach ($produk as $item)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card produk-card shadow-sm h-100">
                <div class="p-3 text-center bg-light" style="border-bottom-left-radius: 50px;">
                    <img src="{{ asset('assets/img/' . $item->gambarProduk) }}" 
                         style="width: 150px; height: 150px; object-fit: cover; border-radius: 15px;">
                </div>
                <div class="card-body">
                    <h5 class="font-weight-bold text-dark">{{ $item->namaProduk }}</h5>
                    <p class="text-muted small">{{ $item->deskripsiProduk }}</p>
                    
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="h5 mb-0 font-weight-bold text-gray-900">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                        
                        <form action="/keranjang/tambah/{{ $item->id }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-warning shadow-sm px-3" {{ $item->stok <= 0 ? 'disabled' : '' }}>
                                <i class="bi bi-cart-plus-fill"></i> {{ $item->stok <= 0 ? 'Habis' : 'Beli' }}
                            </button>
                        </form>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between small">
                        <span class="text-muted">Tersedia: <b>{{ $item->stok }}</b></span>
                        <span class="badge badge-light text-uppercase">{{ $item->kategori }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <div class="mb-5"></div>
</div>
@endsection