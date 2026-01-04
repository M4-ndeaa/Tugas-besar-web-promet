<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'gambarProduk' => 'tas1.jpg',
                'namaProduk' => 'Tas Ransel Kanvas',
                'deskripsiProduk' => 'Bahan kanvas tahan air, muat laptop 15 inch.',
                'kategori' => 'Fashion',
                'harga' => 150000,
                'stok' => 25,
                'tanggalInput' => now(),
            ],
        ];

        foreach ($data as $val) {
            Produk::updateOrCreate(['id' => $val['id']], $val);
        }
    }
}
