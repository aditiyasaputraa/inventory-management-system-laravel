@extends('layouts.app')

@section('title', 'Barang Masuk')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Barang Masuk</h1>
            <p class="text-sm text-gray-500">Kelola transaksi barang masuk dan update stok otomatis</p>
        </div>

        <a href="{{ route('incoming-items.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-xl text-sm font-medium">
            + Tambah Barang Masuk
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
                    <th>Nama Barang</th>
                    <th>Jumlah Masuk</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse($incomingItems as $incoming)
                    <tr class="border-b">
                        <td class="py-3">{{ $loop->iteration }}</td>
                        <td class="font-medium">{{ $incoming->item->nama_barang ?? '-' }}</td>
                        <td>{{ $incoming->jumlah }} {{ $incoming->item->satuan ?? '' }}</td>
                        <td>{{ \Carbon\Carbon::parse($incoming->tanggal)->format('d M Y') }}</td>
                        <td>{{ $incoming->keterangan ?? '-' }}</td>
                        <td class="text-right">
                            <form action="{{ route('incoming-items.destroy', $incoming->id) }}"
                                  method="POST"
                                  class="inline"
                                  onsubmit="return confirm('Yakin ingin menghapus transaksi ini? Stok akan dikurangi kembali.')">
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
                            Belum ada transaksi barang masuk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $incomingItems->links() }}
        </div>
    </div>
</div>
@endsection