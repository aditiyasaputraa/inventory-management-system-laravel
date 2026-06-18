@extends('layouts.app')

@section('title', 'QR Code Barang')

@section('content')
<div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-2xl border border-gray-200 p-8 text-center">

        <h1 class="text-2xl font-bold text-gray-900 mb-2">
            QR Code Barang
        </h1>

        <p class="text-gray-500 mb-6">
            Scan QR Code untuk melihat informasi barang.
        </p>

        <div class="flex justify-center mb-6">
            {!! QrCode::size(250)->generate(
                'Kode Barang : '.$item->kode_barang.
                "\nNama Barang : ".$item->nama_barang.
                "\nKategori : ".($item->category->nama_kategori ?? '-').
                "\nSupplier : ".($item->supplier->nama_supplier ?? '-').
                "\nStok : ".$item->stok.' '.$item->satuan.
                "\nLokasi : ".$item->lokasi
            ) !!}
        </div>

        <div class="space-y-2 text-left bg-gray-50 rounded-xl p-4">
            <p><strong>Kode:</strong> {{ $item->kode_barang }}</p>
            <p><strong>Nama:</strong> {{ $item->nama_barang }}</p>
            <p><strong>Kategori:</strong> {{ $item->category->nama_kategori ?? '-' }}</p>
            <p><strong>Supplier:</strong> {{ $item->supplier->nama_supplier ?? '-' }}</p>
            <p><strong>Stok:</strong> {{ $item->stok }} {{ $item->satuan }}</p>
            <p><strong>Lokasi:</strong> {{ $item->lokasi }}</p>
        </div>

        <div class="mt-6">
            <a href="{{ route('items.index') }}"
               class="bg-blue-600 text-white px-5 py-2 rounded-xl">
                Kembali
            </a>
        </div>

    </div>

</div>
@endsection