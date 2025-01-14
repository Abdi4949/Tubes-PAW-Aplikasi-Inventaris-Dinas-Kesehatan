<?php

namespace App\Exports;

use App\Models\Asset;

class AssetsExport 
{
    public function collection()
    {
        // Ambil data dari model Asset
        return Asset::select('id', 'nama_barang', 'status', 'tahun_pembelian', 'nomor_polisi', 'deskripsi', 'harga_beli', 'merk', 'category_id')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Barang',
            'Status',
            'Tahun Pembelian',
            'Nomor Polisi',
            'Deskripsi',
            'Harga Beli',
            'Merk',
            'Kategori',
        ];
    }
}
