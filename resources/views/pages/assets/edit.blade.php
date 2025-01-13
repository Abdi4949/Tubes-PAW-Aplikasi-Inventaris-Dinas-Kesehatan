@extends('layouts.main')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Ubah Nama Barang</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item active">Aset</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <form action="/Assets/{{ $Assets->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <!-- Nama Barang -->
                        <div class="form-group">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ old('nama_barang', $Assets->nama_barang) }}">
                            @error('nama_barang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Status Barang -->
                        <div class="form-group">
                            <label for="status" class="form-label">Status Barang</label>
                            <select name="status" id="status" 
                                    class="form-control @error('status') is-invalid @enderror">
                                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                                <option value="damaged" {{ old('status') == 'damaged' ? 'selected' : '' }}>Rusak</option>
                                <option value="missing" {{ old('status') == 'missing' ? 'selected' : '' }}>Hilang</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tahun Pembelian -->
                        <div class="form-group">
                            <label for="tahun_pembelian" class="form-label">Tahun Pembelian</label>
                            <input type="number" name="tahun_pembelian" id="tahun_pembelian" 
                                   class="form-control @error('tahun_pembelian') is-invalid @enderror" 
                                   value="{{ old('tahun_pembelian', $Assets->tahun_pembelian) }}">
                            @error('tahun_pembelian')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nomor Polisi -->
                        <div class="form-group">
                            <label for="nomor_polisi" class="form-label">Nomor Polisi</label>
                            <input type="text" name="nomor_polisi" id="nomor_polisi" 
                                   class="form-control @error('nomor_polisi') is-invalid @enderror" 
                                   value="{{ old('nomor_polisi', $Assets->nomor_polisi) }}">
                            @error('nomor_polisi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="form-group">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" 
                                      class="form-control @error('deskripsi') is-invalid @enderror" 
                                      rows="4">{{ old('deskripsi', $Assets->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Harga Beli -->
                        <div class="form-group">
                            <label for="harga_beli" class="form-label">Harga Pembelian</label>
                            <input type="number" name="harga_beli" id="harga_beli" 
                                   class="form-control @error('harga_beli') is-invalid @enderror" 
                                   value="{{ old('harga_beli', $Assets->harga_beli) }}">
                            @error('harga_beli')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Merk -->
                        <div class="form-group">
                            <label for="merk" class="form-label">Merk</label>
                            <input type="text" name="merk" id="merk" 
                                   class="form-control @error('merk') is-invalid @enderror" 
                                   value="{{ old('merk', $Assets->merk) }}">
                            @error('merk')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div class="form-group">
                            <label for="category_id" class="form-label">Kategori</label>
                            <select name="category_id" id="category_id" 
                                    class="form-control @error('category_id') is-invalid @enderror">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" 
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tombol Simpan -->
                       <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="/Assets" class="btn btn-sm btn-outline-secondary mr-2">Batal</a>
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                       </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection