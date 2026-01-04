@extends('layout.templateAdmin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">PESANAN MASUK</h1>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered ">
                    <thead class="bg-light">
                        <tr>
                            <th>Tgl & Jam</th>
                            <th>Nama Pembeli</th>
                            <th>Alamat Pengiriman</th> <th>Rincian Produk (Harga & Subtotal)</th>
                            <th>Total Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $t)
                        <tr>
                            <td class="small">{{ $t->created_at->format('d/m/Y H:i') }}</td>
                            <td class="font-weight-bold">{{ $t->nama_pembeli }}</td>
                            
                            <td>
                                <small>{{ $t->alamat ?? 'Alamat tidak tersedia' }}</small>
                            </td>

                            <td class="small">
                                {!! nl2br(e($t->rincian_barang)) !!}
                            </td>

                            <td class="text-success font-weight-bold">
                                Rp {{ number_format($t->total_bayar, 0, ',', '.') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection