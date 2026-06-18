@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">

    <div class="flex justify-between items-start">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Ringkasan Inventaris</h1>
            <p class="text-sm text-gray-500">Data diambil langsung dari database</p>
        </div>

        <div class="flex gap-3">
            <div class="bg-white border rounded-xl px-4 py-2">
                <p class="text-lg font-bold text-gray-900">{{ $barangMasukBulanIni + $barangKeluarBulanIni }}</p>
                <p class="text-xs text-gray-500">Transaksi Bulan Ini</p>
            </div>

            <div class="bg-white border rounded-xl px-4 py-2">
                <p class="text-lg font-bold text-gray-900">{{ $stokRendah->count() }}</p>
                <p class="text-xs text-gray-500">Stok Rendah</p>
            </div>

            <div class="bg-white border rounded-xl px-4 py-2">
                <p class="text-lg font-bold text-gray-900">{{ $stokRendah->where('stok', 0)->count() }}</p>
                <p class="text-xs text-gray-500">Barang Habis</p>
            </div>
        </div>
    </div>

    @php
        $cards = [
            ['title' => 'Total Barang', 'value' => $totalBarang, 'desc' => 'Data barang terdaftar'],
            ['title' => 'Total Kategori', 'value' => $totalKategori, 'desc' => 'Kategori aktif'],
            ['title' => 'Total Supplier', 'value' => $totalSupplier, 'desc' => 'Supplier terdaftar'],
            ['title' => 'Barang Masuk Bulan Ini', 'value' => $barangMasukBulanIni, 'desc' => 'Total unit masuk'],
            ['title' => 'Barang Keluar Bulan Ini', 'value' => $barangKeluarBulanIni, 'desc' => 'Total unit keluar'],
            ['title' => 'Total Pengguna', 'value' => $totalPengguna, 'desc' => 'User sistem'],
        ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4">
        @foreach($cards as $card)
            <div class="bg-white rounded-2xl p-5 border border-gray-200">
                <p class="text-sm text-gray-500">{{ $card['title'] }}</p>
                <h3 class="text-2xl font-bold mt-4">{{ $card['value'] }}</h3>
                <p class="text-xs text-green-600 mt-2">{{ $card['desc'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-2xl border border-gray-200 p-5 lg:col-span-2">
            <div class="flex justify-between items-center">
                <div>
                    <h3 class="font-bold text-gray-800">Pergerakan Stok Bulanan</h3>
                    <p class="text-sm text-gray-500">Grafik transaksi barang masuk dan keluar per bulan</p>
                </div>
                <div class="flex gap-4 text-xs">
                    <span class="text-blue-600">● Masuk</span>
                    <span class="text-cyan-600">● Keluar</span>
                </div>
            </div>

            <div class="mt-6">
                <canvas id="stokChart" height="220"></canvas>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-gray-200 p-5">
            <h3 class="font-bold text-gray-800">Distribusi Kategori</h3>
            <p class="text-sm text-gray-500 mb-6">Total barang berdasarkan database</p>

            <div class="flex justify-center mb-6">
                <div class="w-36 h-36 rounded-full border-[24px] border-blue-600 flex items-center justify-center">
                    <div class="text-center">
                        <h4 class="font-bold">{{ $totalBarang }}</h4>
                        <p class="text-xs text-gray-500">Total Barang</p>
                    </div>
                </div>
            </div>

            <div class="space-y-2 text-sm">
                <div class="flex justify-between">
                    <span>Total Kategori</span>
                    <span>{{ $totalKategori }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Total Supplier</span>
                    <span>{{ $totalSupplier }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Stok Rendah</span>
                    <span>{{ $stokRendah->count() }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Barang Habis</span>
                    <span>{{ $stokRendah->where('stok', 0)->count() }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl border border-gray-200 p-5">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h3 class="font-bold text-gray-800">Peringatan Stok Rendah</h3>
                    <p class="text-sm text-gray-500">Barang dengan stok 5 atau kurang</p>
                </div>
                <a href="{{ route('items.index') }}" class="text-sm text-blue-600 font-medium">Lihat Semua →</a>
            </div>

            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left text-gray-500 border-b">
                        <th class="py-3">Kode</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse($stokRendah as $item)
                        <tr class="border-b">
                            <td class="py-3">{{ $item->kode_barang }}</td>
                            <td class="font-medium">{{ $item->nama_barang }}</td>
                            <td>{{ $item->category->nama_kategori ?? '-' }}</td>
                            <td>{{ $item->stok }} {{ $item->satuan }}</td>
                            <td>
                                @if($item->stok == 0)
                                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs">Habis</span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs">Stok Rendah</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-6 text-center text-gray-500">
                                Tidak ada barang dengan stok rendah.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="bg-white rounded-2xl border border-gray-200 p-5">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h3 class="font-bold text-gray-800">Aktivitas Terbaru</h3>
                    <p class="text-sm text-gray-500">Transaksi barang masuk dan keluar terakhir</p>
                </div>
            </div>

            <div class="space-y-4">
                @foreach($aktivitasMasuk as $masuk)
                    <div class="flex justify-between">
                        <div>
                            <p class="font-medium text-gray-800">Barang Masuk — {{ $masuk->item->nama_barang ?? '-' }}</p>
                            <p class="text-sm text-gray-500">Qty: {{ $masuk->jumlah }} {{ $masuk->item->satuan ?? '' }}</p>
                        </div>
                        <span class="text-xs text-gray-400">{{ $masuk->created_at->diffForHumans() }}</span>
                    </div>
                @endforeach

                @foreach($aktivitasKeluar as $keluar)
                    <div class="flex justify-between">
                        <div>
                            <p class="font-medium text-gray-800">Barang Keluar — {{ $keluar->item->nama_barang ?? '-' }}</p>
                            <p class="text-sm text-gray-500">Qty: {{ $keluar->jumlah }} {{ $keluar->item->satuan ?? '' }} ke {{ $keluar->penerima }}</p>
                        </div>
                        <span class="text-xs text-gray-400">{{ $keluar->created_at->diffForHumans() }}</span>
                    </div>
                @endforeach

                @if($aktivitasMasuk->isEmpty() && $aktivitasKeluar->isEmpty())
                    <p class="text-sm text-gray-500">Belum ada aktivitas transaksi.</p>
                @endif
            </div>
        </div>
    </div>

    <div class="flex justify-between text-xs text-gray-500">
        <p>© 2025 InvMS — Sistem Inventaris Barang</p>
        <p>Last sync: {{ now()->format('d M Y, H:i') }} WIB</p>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('stokChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            'Jan','Feb','Mar','Apr','Mei','Jun',
            'Jul','Agu','Sep','Okt','Nov','Des'
        ],
        datasets: [
            {
                label: 'Barang Masuk',
                data: @json($chartMasuk),
                borderWidth: 1
            },
            {
                label: 'Barang Keluar',
                data: @json($chartKeluar),
                borderWidth: 1
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>
@endsection