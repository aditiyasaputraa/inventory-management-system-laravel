@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
<div class="max-w-4xl">
    <div class="bg-white rounded-2xl border border-gray-200 p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-1">Edit Barang</h1>
        <p class="text-sm text-gray-500 mb-6">Perbarui data barang inventaris</p>

        <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kode Barang</label>
                    <input type="text" value="{{ $item->kode_barang }}" disabled
                           class="w-full rounded-xl border-gray-300 bg-gray-100">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Barang</label>
                    <input type="text" name="nama_barang" value="{{ old('nama_barang', $item->nama_barang) }}"
                           class="w-full rounded-xl border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select name="category_id" class="w-full rounded-xl border-gray-300">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Supplier</label>
                    <select name="supplier_id" class="w-full rounded-xl border-gray-300">
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ $item->supplier_id == $supplier->id ? 'selected' : '' }}>
                                {{ $supplier->nama_supplier }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Stok</label>
                    <input type="number" name="stok" value="{{ old('stok', $item->stok) }}"
                           class="w-full rounded-xl border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Satuan</label>
                    <input type="text" name="satuan" value="{{ old('satuan', $item->satuan) }}"
                           class="w-full rounded-xl border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi', $item->lokasi) }}"
                           class="w-full rounded-xl border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Baru</label>
                    <input type="file" name="gambar"
                           class="w-full rounded-xl border border-gray-300 p-2">
                </div>
            </div>

            @if($item->gambar)
                <div>
                    <p class="text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini</p>
                    <img src="{{ asset('storage/'.$item->gambar) }}" class="w-24 h-24 object-cover rounded-xl border">
                </div>
            @endif

            <div class="flex gap-3">
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-xl font-medium">
                    Update
                </button>

                <a href="{{ route('items.index') }}"
                   class="bg-gray-100 text-gray-700 px-5 py-2 rounded-xl font-medium">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection