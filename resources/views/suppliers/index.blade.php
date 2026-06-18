@extends('layouts.app')

@section('title', 'Supplier')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Supplier</h1>
            <p class="text-sm text-gray-500">Kelola data supplier barang inventaris</p>
        </div>

        <a href="{{ route('suppliers.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-xl text-sm font-medium">
            + Tambah Supplier
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
                    <th>Nama Supplier</th>
                    <th>Kontak</th>
                    <th>Alamat</th>
                    <th>Tanggal Dibuat</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($suppliers as $supplier)
                    <tr class="border-b">
                        <td class="py-3">{{ $loop->iteration }}</td>
                        <td class="font-medium">{{ $supplier->nama_supplier }}</td>
                        <td>{{ $supplier->kontak ?? '-' }}</td>
                        <td>{{ $supplier->alamat ?? '-' }}</td>
                        <td>{{ $supplier->created_at->format('d M Y') }}</td>
                        <td class="text-right">
                            <a href="{{ route('suppliers.edit', $supplier->id) }}"
                               class="text-blue-600 font-medium mr-3">
                                Edit
                            </a>

                            <form action="{{ route('suppliers.destroy', $supplier->id) }}"
                                  method="POST"
                                  class="inline"
                                  onsubmit="return confirm('Yakin ingin menghapus supplier ini?')">
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
                        <td colspan="6" class="py-6 text-center text-gray-500">
                            Belum ada data supplier.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $suppliers->links() }}
        </div>
    </div>
</div>
@endsection