@extends('layouts.app')

@section('title', 'Tambah Barang Masuk')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl border border-gray-200 p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-1">Tambah Barang Masuk</h1>
        <p class="text-sm text-gray-500 mb-6">Input transaksi barang masuk untuk menambah stok</p>

        <form action="{{ route('incoming-items.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Barang</label>
                <select name="item_id" class="w-full rounded-xl border-gray-300">
                    <option value="">Pilih Barang</option>
                    @foreach($items as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->kode_barang }} - {{ $item->nama_barang }} | Stok: {{ $item->stok }} {{ $item->satuan }}
                        </option>
                    @endforeach
                </select>
                @error('item_id')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Masuk</label>
                <input type="number" name="jumlah" value="{{ old('jumlah') }}"
                       class="w-full rounded-xl border-gray-300"
                       placeholder="Contoh: 10">
                @error('jumlah')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                <input type="date" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}"
                       class="w-full rounded-xl border-gray-300">
                @error('tanggal')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
                <textarea name="keterangan" rows="4"
                          class="w-full rounded-xl border-gray-300"
                          placeholder="Contoh: Pembelian stok baru dari supplier">{{ old('keterangan') }}</textarea>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-xl font-medium">
                    Simpan
                </button>

                <a href="{{ route('incoming-items.index') }}"
                   class="bg-gray-100 text-gray-700 px-5 py-2 rounded-xl font-medium">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection