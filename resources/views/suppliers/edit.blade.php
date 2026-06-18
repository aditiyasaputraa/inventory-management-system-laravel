@extends('layouts.app')

@section('title', 'Edit Supplier')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-2xl border border-gray-200 p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-1">Edit Supplier</h1>
        <p class="text-sm text-gray-500 mb-6">Perbarui data supplier</p>

        <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-5">

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Nama Supplier
                    </label>

                    <input
                        type="text"
                        name="nama_supplier"
                        value="{{ old('nama_supplier', $supplier->nama_supplier) }}"
                        class="w-full rounded-xl border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Kontak
                    </label>

                    <input
                        type="text"
                        name="kontak"
                        value="{{ old('kontak', $supplier->kontak) }}"
                        class="w-full rounded-xl border-gray-300">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2">
                        Alamat
                    </label>

                    <textarea
                        name="alamat"
                        rows="4"
                        class="w-full rounded-xl border-gray-300">{{ old('alamat', $supplier->alamat) }}</textarea>
                </div>

                <div class="flex gap-3">
                    <button
                        type="submit"
                        class="bg-blue-600 text-white px-5 py-2 rounded-xl">
                        Update
                    </button>

                    <a href="{{ route('suppliers.index') }}"
                       class="bg-gray-100 text-gray-700 px-5 py-2 rounded-xl">
                        Batal
                    </a>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection