<table>
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
        @foreach ($assets as $index => $asset)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $asset->ID }}</td>
                <td>{{ $asset->nama_barang }}</td>
                <td>{{ $asset->status }}</td>
                <td>{{ $asset->tahun_pembelian }}</td>
                <td>{{ $asset->deskripsi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

