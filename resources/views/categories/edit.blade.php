@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl border border-gray-200 p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-1">Edit Kategori Barang</h1>
        <p class="text-sm text-gray-500 mb-6">Perbarui data kategori barang</p>

        <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Kategori</label>
                <input type="text" name="nama_kategori" value="{{ old('nama_kategori', $category->nama_kategori) }}"
                       class="w-full rounded-xl border-gray-300">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="4"
                          class="w-full rounded-xl border-gray-300">{{ old('deskripsi', $category->deskripsi) }}</textarea>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-xl font-medium">
                    Update
                </button>

                <a href="{{ route('categories.index') }}"
                   class="bg-gray-100 text-gray-700 px-5 py-2 rounded-xl font-medium">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection