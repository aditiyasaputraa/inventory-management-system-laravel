@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
<div class="max-w-4xl">
    <div class="bg-white rounded-2xl border border-gray-200 p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-1">Tambah Barang</h1>
        <p class="text-sm text-gray-500 mb-6">Masukkan data barang inventaris baru</p>

        <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Barang</label>
                    <input type="text" name="nama_barang" value="{{ old('nama_barang') }}"
                           class="w-full rounded-xl border-gray-300"
                           placeholder="Contoh: Laptop ASUS X515">
                    @error('nama_barang')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select name="category_id" class="w-full rounded-xl border-gray-300">
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Supplier</label>
                    <select name="supplier_id" class="w-full rounded-xl border-gray-300">
                        <option value="">Pilih Supplier</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                        @endforeach
                    </select>
                    @error('supplier_id')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Stok Awal</label>
                    <input type="number" name="stok" value="{{ old('stok', 0) }}"
                           class="w-full rounded-xl border-gray-300">
                    @error('stok')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Satuan</label>
                    <input type="text" name="satuan" value="{{ old('satuan') }}"
                           class="w-full rounded-xl border-gray-300"
                           placeholder="Contoh: Unit, Buah, Rim">
                    @error('satuan')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi') }}"
                           class="w-full rounded-xl border-gray-300"
                           placeholder="Contoh: Gudang A / Rak 01">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Barang</label>
                    <input type="file" name="gambar"
                           class="w-full rounded-xl border border-gray-300 p-2">
                    @error('gambar')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-xl font-medium">
                    Simpan
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