<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Produk::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('namaProduk', 'LIKE', "%{$search}%")
                  ->orWhere('kategori', 'LIKE', "%{$search}%");
            });
        }

        $produk = $query->get();

        return view('produk', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menambahkanProduk');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'namaProduk' => 'required',
                'gambarProduk' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'kategori' => 'required',
            ]);

            $namaFile = time().'_'.$request->file('gambarProduk')->getClientOriginalName();
            $request->file('gambarProduk')->move(public_path('assets/img'), $namaFile);

            Produk::create([
                'namaProduk' => $request->namaProduk,
                'gambarProduk' => $namaFile,
                'deskripsiProduk' => $request->deskripsiProduk,
                'kategori' => $request->kategori,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'tanggalInput' => now(),
            ]);

            return redirect('/produk')->with('success', 'Berhasil!');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return redirect('/produk')->with('error', 'Data tidak ada!');
        }

        return view('editProduk', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);

        // mengambil data yang lama biar bisa di ganti
        $data = [
            'namaProduk' => $request->namaProduk,
            'deskripsiProduk' => $request->deskripsiProduk,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ];

        if ($request->hasFile('gambarProduk')) {
            // menghapus foto yang lama
            if ($produk->gambarProduk) {
                $pathLama = public_path('assets/img/'.$produk->gambarProduk);
                if (file_exists($pathLama)) {
                    unlink($pathLama);
                }
            }

            // mengupload gambar baru
            $namaFile = time().'_'.$request->file('gambarProduk')->getClientOriginalName();
            $request->file('gambarProduk')->move(public_path('assets/img'), $namaFile);

            $data['gambarProduk'] = $namaFile;
        }

        $produk->update($data);

        return redirect('/produk')->with('success', 'Data Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = Produk::find($id);

        if ($item && $item->gambarProduk) {
            $path = public_path('assets/img/'.$item->gambarProduk);

            if (file_exists($path)) {
                unlink($path);
            }
        }

        $item->delete();

        return redirect('/produk')->with('success', 'Data berhasil dihapus!');
    }
}
