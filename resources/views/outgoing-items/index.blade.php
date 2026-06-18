@extends('layouts.app')

@section('title', 'Barang Keluar')

@section('content')
<div class="space-y-6">

    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Barang Keluar</h1>
            <p class="text-sm text-gray-500">Kelola transaksi barang keluar dan pengurangan stok otomatis</p>
        </div>

        <a href="{{ route('outgoing-items.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded-xl text-sm font-medium">
            + Tambah Barang Keluar
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded-xl">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl border border-gray-200 p-5">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b text-left text-gray-500">
                    <th class="py-3">No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Keluar</th>
                    <th>Penerima</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($outgoingItems as $outgoing)
                    <tr class="border-b">
                        <td class="py-3">{{ $loop->iteration }}</td>
                        <td>{{ $outgoing->item->nama_barang ?? '-' }}</td>
                        <td>{{ $outgoing->jumlah }}</td>
                        <td>{{ $outgoing->penerima }}</td>
                        <td>{{ \Carbon\Carbon::parse($outgoing->tanggal)->format('d M Y') }}</td>
                        <td>{{ $outgoing->keterangan ?? '-' }}</td>
                        <td class="text-right">
                            <form action="{{ route('outgoing-items.destroy',$outgoing->id) }}"
                                  method="POST"
                                  class="inline"
                                  onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">
                                @csrf
                                @method('DELETE')

                                <button class="text-red-600">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="py-6 text-center text-gray-500">
                            Belum ada transaksi barang keluar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $outgoingItems->links() }}
        </div>
    </div>

</div>
@endsection