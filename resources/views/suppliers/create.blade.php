@extends('layouts.app')

@section('title', 'Tambah Supplier')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl border border-gray-200 p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-1">Tambah Supplier</h1>
        <p class="text-sm text-gray-500 mb-6">Masukkan data supplier baru</p>

        <form action="{{ route('suppliers.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Supplier</label>
                <input type="text" name="nama_supplier" value="{{ old('nama_supplier') }}"
                       class="w-full rounded-xl border-gray-300"
                       placeholder="Contoh: PT Sumber Elektronik">
                @error('nama_supplier')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kontak</label>
                <input type="text" name="kontak" value="{{ old('kontak') }}"
                       class="w-full rounded-xl border-gray-300"
                       placeholder="Contoh: 08123456789">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                <textarea name="alamat" rows="4"
                          class="w-full rounded-xl border-gray-300"
                          placeholder="Contoh: Jakarta Utara">{{ old('alamat') }}</textarea>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-xl font-medium">
                    Simpan
                </button>

                <a href="{{ route('suppliers.index') }}"
                   class="bg-gray-100 text-gray-700 px-5 py-2 rounded-xl font-medium">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection