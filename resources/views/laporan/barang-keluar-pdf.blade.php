<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Barang Keluar</title>

    <style>
        body{
            font-family: Arial;
            font-size:12px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:15px;
        }

        th,td{
            border:1px solid black;
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

<h2>LAPORAN BARANG KELUAR</h2>

<table>
    <thead>
        <tr>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Penerima</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
        </tr>
    </thead>

    <tbody>
        @foreach($outgoingItems as $item)
        <tr>
            <td>{{ $item->item->nama_barang ?? '-' }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->penerima }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->keterangan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>