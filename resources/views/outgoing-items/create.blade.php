@extends('layouts.app')

@section('title', 'Tambah Barang Keluar')

@section('content')
<div class="max-w-2xl">

    <div class="bg-white rounded-2xl border border-gray-200 p-6">

        <h1 class="text-2xl font-bold text-gray-900 mb-1">
            Tambah Barang Keluar
        </h1>

        <p class="text-sm text-gray-500 mb-6">
            Input transaksi barang keluar
        </p>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded-xl mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('outgoing-items.store') }}" method="POST">
            @csrf

            <div class="space-y-5">

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Pilih Barang
                    </label>

                    <select name="item_id" class="w-full rounded-xl border-gray-300">
                        <option value="">Pilih Barang</option>

                        @foreach($items as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->kode_barang }}
                                -
                                {{ $item->nama_barang }}
                                (Stok:
                                {{ $item->stok }}
                                {{ $item->satuan }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Jumlah Keluar
                    </label>

                    <input
                        type="number"
                        name="jumlah"
                        class="w-full rounded-xl border-gray-300"
                        placeholder="Masukkan jumlah">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Penerima
                    </label>

                    <input
                        type="text"
                        name="penerima"
                        class="w-full rounded-xl border-gray-300"
                        placeholder="Contoh: Divisi Marketing">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Tanggal
                    </label>

                    <input
                        type="date"
                        name="tanggal"
                        value="{{ date('Y-m-d') }}"
                        class="w-full rounded-xl border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        rows="4"
                        class="w-full rounded-xl border-gray-300"></textarea>
                </div>

                <div class="flex gap-3">
                    <button
                        type="submit"
                        class="bg-blue-600 text-white px-5 py-2 rounded-xl">
                        Simpan
                    </button>

                    <a href="{{ route('outgoing-items.index') }}"
                       class="bg-gray-100 text-gray-700 px-5 py-2 rounded-xl">
                        Batal
                    </a>
                </div>

            </div>
        </form>

    </div>

</div>
@endsection