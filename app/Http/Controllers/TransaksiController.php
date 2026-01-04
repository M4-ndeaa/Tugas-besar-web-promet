<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::latest()->get();

        return view('pesanan', compact('transaksi'));
    }

    public function tambahKeranjang($id)
    {
        $item = Produk::find($id);

        // mengecek stok produk
        if (!$item || $item->stok <= 0) {
            return back()->with('error', 'Stok sudah habis slay!');
        }

        $item->decrement('stok', 1);
        $keranjang = Session::get('keranjang', []);

        if (isset($keranjang[$id])) {
            ++$keranjang[$id]['jumlah'];
        } else {
            $keranjang[$id] = [
                'nama' => $item->namaProduk,
                'jumlah' => 1,
                'harga' => $item->harga,
                'foto' => $item->gambarProduk,
            ];
        }

        Session::put('keranjang', $keranjang);

        return back()->with('success', 'Baju masuk keranjang!');
    }

    public function hapusKeranjang($id)
    {
        $keranjang = Session::get('keranjang', []);

        if (isset($keranjang[$id])) {
            $item = Produk::find($id);
            // mengembalikan data barang pada database
            if ($item) {
                $item->increment('stok', $keranjang[$id]['jumlah']);
            }
            unset($keranjang[$id]);
            Session::put('keranjang', $keranjang);
        }

        return back()->with('success', 'Barang dibatalkan!');
    }

    public function store(Request $request)
    {
        $keranjang = Session::get('keranjang');
        if (!$keranjang) {
            return redirect('/welcome');
        }

        $rincian = '';
        foreach ($keranjang as $item) {
            $rincian .= $item['nama'].' ('.$item['jumlah']."x)\n";
        }

        Transaksi::create([
            'nama_pembeli' => $request->nama_pembeli,
            'rincian_barang' => $rincian,
            'total_bayar' => $request->total_semua,
            'alamat' => $request->alamat,
        ]);

        $data_sukses = [
            'pembeli' => $request->nama_pembeli,
            'total' => $request->total_semua,
            'barang' => $rincian,
        ];

        // menghapus data yang ada di keranjang setelah sukses membayar
        Session::forget('keranjang');

        return redirect('/welcome')->with([
            'success' => 'Pembayaran Slay Berhasil!',
            'data_order' => $data_sukses,
        ]);
    }
}
