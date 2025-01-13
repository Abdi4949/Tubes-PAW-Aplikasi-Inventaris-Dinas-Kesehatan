@extends('layouts.main')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Aset</h1>
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
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="/Assets/create" class="btn btn-primary">
                        Tambah Barang
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Status Barang</th>
                                <th>Tahun Pembelian</th>
                                <th>Nomor Polisi</th>
                                <th>Deskripsi</th>
                                <th>Harga Beli</th>
                                <th>Merk</th>
                                <th>Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Assets as $Asset)
                            <tr>
                                <td>{{ $Asset->id }}</td>
                                <td>{{ $Asset->{'nama_barang'} }}</td> 
                                <td>
                                    @if($Asset->status === 'available')
                                        <span style="color: green; font-weight: bold;">Tersedia</span>
                                    @elseif($Asset->status === 'damaged')
                                        <span style="color: orange; font-weight: bold;">Rusak</span>
                                    @elseif($Asset->status === 'missing')
                                        <span style="color: red; font-weight: bold;">Hilang</span>
                                    @endif
                                </td>
                                <td>{{ $Asset->{'tahun_pembelian'} }}</td>
                                <td>{{ $Asset->{'nomor_polisi'} }}</td>
                                <td>{{ $Asset->{'deskripsi'} }}</td> 
                                <td>{{ number_format($Asset->harga_beli, 0, ',', '.') }}</td>
                                <td>{{ $Asset->{'merk'} }}</td>
                                <td>{{ $Asset->category ? $Asset->category->name : 'Tidak Ada Kategori' }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="/Assets/edit/{{ $Asset->id }}" class="btn btn-sm btn-warning mr-2">
                                            Edit
                                        </a>
                                        <form action="/Assets/{{ $Asset->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
