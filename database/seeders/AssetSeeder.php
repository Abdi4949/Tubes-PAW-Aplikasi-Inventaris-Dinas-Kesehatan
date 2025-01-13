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
            "Nama Barang" => "Innova",
            "Penanggung Jawab" => "Rifqi Abdillah",
            "Tahun Pembelian" => 2008,
            "Nomor Polisi" => "L 2008 AB",
            "Deskripsi" => "barang bagus",
            "category_id" => 1,

        ]);
    }
}
