<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Barang</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            font-size:12px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:15px;
        }

        th,td{
            border:1px solid #000;
            padding:8px;
        }

        th{
            background:#f2f2f2;
        }

        h2{
            text-align:center;
        }
    </style>
</head>
<body>

<h2>LAPORAN DATA BARANG</h2>

<table>
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Supplier</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th>Lokasi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->kode_barang }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->category->nama_kategori ?? '-' }}</td>
            <td>{{ $item->supplier->nama_supplier ?? '-' }}</td>
            <td>{{ $item->stok }}</td>
            <td>{{ $item->satuan }}</td>
            <td>{{ $item->lokasi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>