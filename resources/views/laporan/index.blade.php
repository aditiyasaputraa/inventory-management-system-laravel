@extends('layouts.app')

@section('title', 'Laporan')

@section('content')
<div class="space-y-6">

    <div>
        <h1 class="text-2xl font-bold text-gray-900">Laporan Inventaris</h1>
        <p class="text-sm text-gray-500">
            Cetak dan unduh laporan inventaris dalam format PDF.
        </p>
    </div>

    <div class="grid md:grid-cols-3 gap-6">

        <div class="bg-white rounded-2xl border border-gray-200 p-6">
            <h3 class="font-bold text-lg mb-2">
                Data Barang
            </h3>

            <p class="text-sm text-gray-500 mb-4">
                Cetak seluruh data barang inventaris.
            </p>

            <a href="{{ route('laporan.barang.pdf') }}"
               class="inline-block bg-blue-600 text-white px-4 py-2 rounded-xl">
                Download PDF
            </a>

            <a href="{{ route('laporan.barang.excel') }}"
                class="inline-block bg-green-600 text-white px-4 py-2 rounded-xl mt-2">
                Download Excel
            </a>
        </div>

        <div class="bg-white rounded-2xl border border-gray-200 p-6">
            <h3 class="font-bold text-lg mb-2">
                Barang Masuk
            </h3>

            <p class="text-sm text-gray-500 mb-4">
                Cetak laporan transaksi barang masuk.
            </p>

            <a href="{{ route('laporan.barangMasuk.pdf') }}"
               class="inline-block bg-green-600 text-white px-4 py-2 rounded-xl">
                Download PDF
            </a>

            <a href="{{ route('laporan.barangMasuk.excel') }}"
                class="inline-block bg-green-600 text-white px-4 py-2 rounded-xl mt-2">
                Download Excel
            </a>
        </div>

        <div class="bg-white rounded-2xl border border-gray-200 p-6">
            <h3 class="font-bold text-lg mb-2">
                Barang Keluar
            </h3>

            <p class="text-sm text-gray-500 mb-4">
                Cetak laporan transaksi barang keluar.
            </p>

            <a href="{{ route('laporan.barangKeluar.pdf') }}"
               class="inline-block bg-red-600 text-white px-4 py-2 rounded-xl">
                Download PDF
            </a>

            <a href="{{ route('laporan.barangKeluar.excel') }}"
                class="inline-block bg-green-600 text-white px-4 py-2 rounded-xl mt-2">
                Download Excel
            </a>
        </div>

    </div>

</div>
@endsection