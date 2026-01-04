@extends('layout.templateAdmin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0" style="border-radius: 20px;">
                <div class="card-header bg-dark text-white p-3">
                    <h5 class="mb-0"><i class="bi bi-bag-heart-fill text-warning"></i> Rincian Belanja Kamu</h5>
                </div>
                
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-0 px-4">Produk</th>
                                    <th class="border-0">Harga</th>
                                    <th class="border-0 text-center">Jumlah</th>
                                    <th class="border-0 text-right">Subtotal</th>
                                    <th class="border-0 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- mentotalkan jumlah harga produk  -->
                                @php $total_semua = 0; @endphp
                                @if(Session::has('keranjang') && count(Session::get('keranjang')) > 0)
                                    @foreach(Session::get('keranjang') as $id => $details)
                                        @php 
                                            $subtotal = $details['harga'] * $details['jumlah']; 
                                            $total_semua += $subtotal;
                                        @endphp
                                        <tr>
                                            <td class="px-4 align-middle">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('assets/img/' . $details['foto']) }}" width="100" height="100" class="rounded mr-3 shadow-sm" style="object-fit: cover;">
                                                    <span class="font-weight-bold">{{ $details['nama'] }}</span>
                                                </div>
                                            </td>
                                            <!-- mengubah angka menjadi harga produk -->
                                            <td class="align-middle text-nowrap">
                                                Rp {{ number_format($details['harga'], 0, ',', '.') }}
                                            </td>
                                            <td class="align-middle text-center">
                                                {{ $details['jumlah'] }}x
                                            </td>
                                            <!-- menampilkan jumalh harga yang sudah dikalikan per produk -->
                                            <td class="align-middle text-right font-weight-bold text-primary">
                                                Rp {{ number_format($subtotal, 0, ',', '.') }}
                                            </td>
                                            <td class="text-center align-middle">
                                                <form action="/keranjang/hapus/{{ $id }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin, hapus produk dari keranjang?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-muted">
                                            <i class="bi bi-cart-x" style="font-size: 2.5rem;"></i><br>
                                            <span class="mt-2 d-block">Wah, keranjangmu kosong ...</span>
                                            <a href="/welcome" class="btn btn-warning mt-3">Belanja Sekarang</a>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>

                            <!-- total harga seluruh produk yang sudah di chekout -->
                            @if($total_semua > 0)
                            <tfoot class="bg-light">
                                <tr>
                                    <td colspan="3" class="text-right py-3 border-0 font-weight-bold">TOTAL BAYAR:</td>
                                    <td class="py-3 text-right border-0">
                                        <h4 class="text-danger font-weight-bold mb-0">
                                            Rp {{ number_format($total_semua, 0, ',', '.') }}
                                        </h4>
                                    </td>
                                    <td class="border-0"></td>
                                </tr>
                            </tfoot>
                            @endif
                        </table>
                    </div>
                </div>

                @if($total_semua > 0)
                <div class="card-footer bg-white text-right p-4">
                    <button type="button" class="btn btn-primary btn-lg px-5 shadow rounded-pill" data-toggle="modal" data-target="#modalQRIS">
                        <i class="bi bi-qr-code-scan"></i> BAYAR SEKARANG
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- pop up ketika melakukan pembayaran produk -->
<div class="modal fade" id="modalQRIS" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0" style="border-radius: 20px;">
            <div class="modal-body p-4">
                <h5 class="font-weight-bold text-center mb-4">DATA PENGIRIMAN & PEMBAYARAN</h5>
                
                <form action="/checkout/simpan" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="small font-weight-bold">NAMA PENERIMA</label>
                        <input type="text" name="nama_pembeli" class="form-control" value="{{ Auth::user()->name }}" required>
                    </div>

                    <div class="form-group">
                        <label class="small font-weight-bold">ALAMAT LENGKAP RUMAH</label>
                        <textarea name="alamat" class="form-control" rows="3" placeholder="Nama Jalan, No. Rumah, Kecamatan, Kota" required></textarea>
                    </div>

                    <!-- membuat code qr menggunakan api qr code -->
                    <hr>
                    <div class="text-center mb-3">
                        <p class="text-muted small mb-1">Scan QRIS untuk bayar:</p>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=ButikDeaSlayy" class="img-fluid border p-2 rounded shadow-sm">
                        <h4 class="text-danger font-weight-bold mt-2">Rp {{ number_format($total_semua, 0, ',', '.') }}</h4>
                    </div>

                    <input type="hidden" name="total_semua" value="{{ $total_semua }}">
                    
                    <button type="submit" class="btn btn-success btn-block btn-lg rounded-pill shadow">
                        KONFIRMASI & BAYAR SEKARANG
                    </button>
                </form>
                
                <button type="button" class="btn btn-link btn-block text-muted mt-2" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
@endsection