@extends('layouts.main')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Tambah User</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item active">User Management</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <form action="/User/store" method="POST">
                @csrf
                @method('POST')

                <div class="card">
                    <div class="card-body">
                        <!-- Nama Barang -->
                        <div class="form-group">
                            <label for="name" class="form-label">Nama Barang</label>
                            <input type="text" name="name" id="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tahun Pembelian -->
                        <div class="form-group">
                            <label for="email" class="form-label">Nama Barang</label>
                            <input type="text" name="email" id="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   value="{{ old('password') }}">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Password Confirmation</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                   value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                     <!-- Kategori -->
                        <div class="form-group">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role"
                                    class="form-control @error('role') is-invalid @enderror">
                                    <option value="admin" {{ 'role' == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ 'role' == 'user' ? 'selected' : '' }}>User</option>
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tombol Simpan -->
                       <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="/products" class="btn btn-sm btn-outline-secondary mr-2">Batal</a>
                            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        </div>
                       </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
