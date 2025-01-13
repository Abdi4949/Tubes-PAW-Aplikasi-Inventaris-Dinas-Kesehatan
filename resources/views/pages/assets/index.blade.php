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
                <div class="car-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Penanggung Jawab</th>
                                <th>Tahun Pembelian</th>
                                <th>Nomor Polisi</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Assets as $Asset)
                            <tr>
                                <td>{{ $Asset->id }}</td> <!-- ID dari Asset -->
                                <td>{{ $Asset->{'Nama Barang'} }}</td> <!-- Nama Barang, dengan tanda kurung kurawal -->
                                <td>{{ $Asset->{'Penanggung Jawab'} }}</td> <!-- Penanggung Jawab, dengan tanda kurung kurawal -->
                                <td>{{ $Asset->{'Tahun Pembelian'} }}</td> <!-- Tahun Pembelian, dengan tanda kurung kurawal -->
                                <td>{{ $Asset->{'Nomor Polisi'} }}</td> <!-- Nomor Polisi, dengan tanda kurung kurawal -->
                                <td>{{ $Asset->{'Deskripsi'} }}</td> <!-- Deskripsi, dengan tanda kurung kurawal -->
                                <td>{{ $Asset->category ? $Asset->category->name : 'Tidak Ada Kategori' }}</td><!-- category_id -->
                            </tr>
                        @endforeach                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
