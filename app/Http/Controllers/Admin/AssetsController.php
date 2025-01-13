<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Asset;
use App\Models\Category;

class AssetsController extends Controller
{
    public function index() {
        $Assets = Asset::with('category')->get();

        return view('pages.Assets.index', [
            "Assets" => $Assets,
        ]);
    }

    public function create() {
        $categories = Category::all();

        return view('pages.Assets.create', [
            "categories" => $categories,
        ]);
    }
    
    public function store(Request $request) {
        // Validasi input pengguna
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'status' => 'required|in:available,damaged,missing',
            'tahun_pembelian' => 'required|integer',
            'nomor_polisi' => 'nullable|string|max:20',
            'deskripsi' => 'nullable|string',
            'harga_beli' => 'required|numeric',
            'merk' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        // Simpan data ke database
        Asset::create($validated);
    
        // Redirect dengan pesan sukses
        return redirect('/Assets')->with('success', 'Asset berhasil ditambahkan.');
    }

public function update(Request $request, $id) {
    // Validasi input pengguna
    $validated = $request->validate([
        'nama_barang' => 'required|string|max:255',
        'status' => 'required|in:available,damaged,missing',
        'tahun_pembelian' => 'required|integer',
        'nomor_polisi' => 'nullable|string|max:20',
        'deskripsi' => 'nullable|string',
        'harga_beli' => 'required|numeric',
        'merk' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
    ]);

    // Cari aset berdasarkan ID
    $asset = Asset::findOrFail($id);

    // Update data aset
    $asset->update($validated);

    // Redirect dengan pesan sukses
    return redirect('/Assets')->with('success', 'Asset berhasil diperbarui.');
}

    

    public function edit($id) {
        $categories = Category::all();
        $Assets = Asset::findOrFail($id);

        return view('pages.Assets.edit', [
            "categories" => $categories,
            "Assets" => $Assets
        ]);
    }
    
    public function delete($id)
    {
        $Assets = Asset::where('id', $id);
        $Assets->delete();

        return redirect('/Assets');
    }
}
