@extends('layouts.app')

@section('title', 'Kategori Barang')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Kategori Barang</h1>
            <p class="text-sm text-gray-500">Kelola data kategori barang inventaris</p>
        </div>

        <a href="{{ route('categories.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-xl text-sm font-medium">
            + Tambah Kategori
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl border border-gray-200 p-5">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-left text-gray-500 border-b">
                    <th class="py-3">No</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Dibuat</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($categories as $category)
                    <tr class="border-b">
                        <td class="py-3">{{ $loop->iteration }}</td>
                        <td class="font-medium">{{ $category->nama_kategori }}</td>
                        <td>{{ $category->deskripsi ?? '-' }}</td>
                        <td>{{ $category->created_at->format('d M Y') }}</td>
                        <td class="text-right">
                            <a href="{{ route('categories.edit', $category->id) }}"
                               class="text-blue-600 font-medium mr-3">
                                Edit
                            </a>

                            <form action="{{ route('categories.destroy', $category->id) }}"
                                  method="POST"
                                  class="inline"
                                  onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
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
                        <td colspan="5" class="py-6 text-center text-gray-500">
                            Belum ada data kategori.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection