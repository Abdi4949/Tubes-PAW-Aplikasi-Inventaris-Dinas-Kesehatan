<?php

namespace App\Exports;

use App\Models\Asset;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AssetsExport
{
    public function export()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Tambahkan header
        $headings = [
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
        $sheet->fromArray($headings, null, 'A1');

        // Ambil data
        $assets = Asset::select('id', 'nama_barang', 'status', 'tahun_pembelian', 'nomor_polisi', 'deskripsi', 'harga_beli', 'merk', 'category_id')->get();

        // Tambahkan data ke file Excel
        $row = 2;
        foreach ($assets as $asset) {
            $sheet->fromArray($asset->toArray(), null, 'A' . $row);
            $row++;
        }

        // Buat direktori jika belum ada
        $exportPath = storage_path('exports');
        if (!file_exists($exportPath)) {
            mkdir($exportPath, 0755, true);
        }

        // Simpan file
        $fileName = 'assets.xlsx';
        $filePath = $exportPath . '/' . $fileName;

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        // Kembalikan file untuk diunduh
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
