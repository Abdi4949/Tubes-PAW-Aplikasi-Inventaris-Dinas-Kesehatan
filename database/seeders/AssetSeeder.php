<?php

namespace Database\Seeders;

use App\Models\Asset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Asset::create([
            'nama_barang' => 'Innova',
            'status' => 'available',
            'tahun_pembelian' => 2008,
            'nomor_polisi' => 'L 2008 AB',
            'deskripsi' => 'Kondisi barang bagus',
            'harga_beli' => 300000000,
            'merk' => 'Toyota',
            'category_id' => 1,
        ]);

        Asset::create([
            'nama_barang' => 'Innova',
            'status' => 'missing',
            'tahun_pembelian' => 2008,
            'nomor_polisi' => 'L 2008 AB',
            'deskripsi' => 'Kondisi barang bagus',
            'harga_beli' => 300000000,
            'merk' => 'Toyota',
            'category_id' => 1,
        ]);

        Asset::create([
            'nama_barang' => 'Innova',
            'status' => 'damaged',
            'tahun_pembelian' => 2008,
            'nomor_polisi' => 'L 2008 AB',
            'deskripsi' => 'Kondisi barang bagus',
            'harga_beli' => 300000000,
            'merk' => 'Toyota',
            'category_id' => 1,
        ]);
    }
}