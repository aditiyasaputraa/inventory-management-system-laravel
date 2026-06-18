@extends('layouts.app')

@section('title', 'Data Barang')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Data Barang</h1>
            <p class="text-sm text-gray-500">Kelola seluruh data barang inventaris</p>
        </div>

        <a href="{{ route('items.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-xl text-sm font-medium">
            + Tambah Barang
        </a>
    </div>
<form method="GET" action="{{ route('items.index') }}" class="bg-white rounded-2xl border border-gray-200 p-4">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <input type="text"
               name="search"
               value="{{ request('search') }}"
               placeholder="Cari kode / nama barang..."
               class="rounded-xl border-gray-300 text-sm">

        <select name="category_id" class="rounded-xl border-gray-300 text-sm">
            <option value="">Semua Kategori</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->nama_kategori }}
                </option>
            @endforeach
        </select>

        <select name="supplier_id" class="rounded-xl border-gray-300 text-sm">
            <option value="">Semua Supplier</option>
            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ request('supplier_id') == $supplier->id ? 'selected' : '' }}>
                    {{ $supplier->nama_supplier }}
                </option>
            @endforeach
        </select>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-xl text-sm font-medium">
                Filter
            </button>

            <a href="{{ route('items.index') }}"
               class="bg-gray-100 text-gray-700 px-4 py-2 rounded-xl text-sm font-medium">
                Reset
            </a>
        </div>
    </div>
</form>
    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl border border-gray-200 p-5 overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-gray-500 border-b">
                    <th class="py-3">Kode</th>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Supplier</th>
                    <th>Stok</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($items as $item)
                    <tr class="border-b">
                        <td class="py-3 font-medium">{{ $item->kode_barang }}</td>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset('storage/'.$item->gambar) }}"
                                     class="w-16 h-16 object-cover rounded-lg border">
                            @else
                                <div class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center text-xs text-gray-400">
                                    No Img
                                </div>
                            @endif
                        </td>
                        <td class="font-medium">{{ $item->nama_barang }}</td>
                        <td>{{ $item->category->nama_kategori ?? '-' }}</td>
                        <td>{{ $item->supplier->nama_supplier ?? '-' }}</td>
                        <td>{{ $item->stok }} {{ $item->satuan }}</td>
                        <td>{{ $item->lokasi ?? '-' }}</td>
                        <td>
                            @if($item->stok == 0)
                                <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs">
                                    Habis
                                </span>
                            @elseif($item->stok <= 5)
                                <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs">
                                    Stok Rendah
                                </span>
                            @else
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs">
                                    Tersedia
                                </span>
                            @endif
                        </td>
                        <td class="text-right">

                            <a href="{{ route('items.qrcode', $item->id) }}"
                                class="text-green-600 font-medium mr-3">
                                QR
                            </a>

                            <a href="{{ route('items.edit', $item->id) }}"
                                class="text-blue-600 font-medium mr-3">
                                Edit
                            </a>

                            <form action="{{ route('items.destroy', $item->id) }}"
                                    method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 font-medium">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="py-6 text-center text-gray-500">
                            Belum ada data barang.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $items->links() }}
        </div>
    </div>
</div>
@endsection