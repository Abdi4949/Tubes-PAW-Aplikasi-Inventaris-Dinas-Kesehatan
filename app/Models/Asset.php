<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'status',
        'tahun_pembelian',
        'nomor_polisi',
        'deskripsi',
        'harga_beli',
        'merk',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
