@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">

    <div class="flex justify-between items-start">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Ringkasan Inventaris</h1>
            <p class="text-sm text-gray-500">Periode: 1 Juli 2025 - 15 Juli 2025</p>
        </div>

        <div class="flex gap-3">
            <div class="bg-white border rounded-xl px-4 py-2">
                <p class="text-lg font-bold text-gray-900">24</p>
                <p class="text-xs text-gray-500">Transaksi Hari Ini</p>
            </div>

            <div class="bg-white border rounded-xl px-4 py-2">
                <p class="text-lg font-bold text-gray-900">3</p>
                <p class="text-xs text-gray-500">Permintaan Pending</p>
            </div>

            <div class="bg-white border rounded-xl px-4 py-2">
                <p class="text-lg font-bold text-gray-900">2</p>
                <p class="text-xs text-gray-500">Barang Habis</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4">
        @php
            $cards = [
                ['title' => 'Total Barang', 'value' => '1,248', 'desc' => '+8.2% dari bulan lalu'],
                ['title' => 'Total Kategori', 'value' => '24', 'desc' => '+2 baru bulan ini'],
                ['title' => 'Total Supplier', 'value' => '38', 'desc' => '+1 baru bulan ini'],
                ['title' => 'Barang Masuk Bulan Ini', 'value' => '312', 'desc' => '+18.4% dari bulan lalu'],
                ['title' => 'Barang Keluar Bulan Ini', 'value' => '241', 'desc' => '+15.1% dari bulan lalu'],
                ['title' => 'Total Pengguna', 'value' => '16', 'desc' => '+2 bulan ini'],
            ];
        @endphp

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
                    <p class="text-sm text-gray-500">Barang masuk dan keluar per bulan</p>
                </div>
                <div class="flex gap-4 text-xs">
                    <span class="text-blue-600">● Masuk</span>
                    <span class="text-cyan-600">● Keluar</span>
                </div>
            </div>

            <div class="h-64 flex items-end gap-5 mt-4">
                @foreach(['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu'] as $bulan)
                    <div class="flex-1 flex flex-col items-center gap-2">
                        <div class="flex items-end gap-2 h-48">
                            <div class="w-7 bg-blue-600 rounded-t-lg" style="height: {{ rand(80,170) }}px"></div>
                            <div class="w-7 bg-cyan-500 rounded-t-lg" style="height: {{ rand(60,150) }}px"></div>
                        </div>
                        <span class="text-xs text-gray-500">{{ $bulan }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-gray-200 p-5">
            <h3 class="font-bold text-gray-800">Distribusi Kategori</h3>
            <p class="text-sm text-gray-500 mb-6">Persentase stok per kategori</p>

            <div class="flex justify-center mb-6">
                <div class="w-36 h-36 rounded-full border-[24px] border-blue-600 flex items-center justify-center">
                    <div class="text-center">
                        <h4 class="font-bold">1,248</h4>
                        <p class="text-xs text-gray-500">Total</p>
                    </div>
                </div>
            </div>

            <div class="space-y-2 text-sm">
                <div class="flex justify-between"><span>Elektronik</span><span>32%</span></div>
                <div class="flex justify-between"><span>ATK</span><span>25%</span></div>
                <div class="flex justify-between"><span>Furniture</span><span>18%</span></div>
                <div class="flex justify-between"><span>Peralatan</span><span>15%</span></div>
                <div class="flex justify-between"><span>Lainnya</span><span>10%</span></div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl border border-gray-200 p-5">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h3 class="font-bold text-gray-800">Peringatan Stok Rendah</h3>
                    <p class="text-sm text-gray-500">Barang yang perlu segera diisi ulang</p>
                </div>
                <a href="#" class="text-sm text-blue-600 font-medium">Lihat Semua →</a>
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
                    <tr class="border-b">
                        <td class="py-3">BRG-0042</td>
                        <td class="font-medium">Printer Canon IP2870</td>
                        <td>Elektronik</td>
                        <td>2 Unit</td>
                        <td><span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs">Stok Rendah</span></td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-3">BRG-0087</td>
                        <td class="font-medium">Kertas A4 80gr</td>
                        <td>ATK</td>
                        <td>5 Rim</td>
                        <td><span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full text-xs">Stok Rendah</span></td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-3">BRG-0103</td>
                        <td class="font-medium">Toner HP LaserJet</td>
                        <td>Elektronik</td>
                        <td>0 Buah</td>
                        <td><span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs">Habis</span></td>
                    </tr>
                    <tr>
                        <td class="py-3">BRG-0201</td>
                        <td class="font-medium">Mouse Wireless Logitech</td>
                        <td>Elektronik</td>
                        <td>0 Unit</td>
                        <td><span class="bg-red-100 text-red-700 px-2 py-1 rounded-full text-xs">Habis</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="bg-white rounded-2xl border border-gray-200 p-5">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <h3 class="font-bold text-gray-800">Aktivitas Terbaru</h3>
                    <p class="text-sm text-gray-500">Log aktivitas sistem hari ini</p>
                </div>
                <a href="#" class="text-sm text-blue-600 font-medium">Lihat Semua →</a>
            </div>

            <div class="space-y-4">
                <div class="flex justify-between">
                    <div>
                        <p class="font-medium text-gray-800">Barang Masuk — Laptop ASUS X515</p>
                        <p class="text-sm text-gray-500">Qty: 10 unit dari PT. Solusi Digital</p>
                    </div>
                    <span class="text-xs text-gray-400">5 menit lalu</span>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="font-medium text-gray-800">Barang Keluar — Kertas HVS A4</p>
                        <p class="text-sm text-gray-500">Qty: 20 rim ke Divisi Marketing</p>
                    </div>
                    <span class="text-xs text-gray-400">32 menit lalu</span>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="font-medium text-gray-800">Permintaan Baru — Mouse Wireless</p>
                        <p class="text-sm text-gray-500">Diajukan oleh Budi Santoso</p>
                    </div>
                    <span class="text-xs text-gray-400">1 jam lalu</span>
                </div>

                <div class="flex justify-between">
                    <div>
                        <p class="font-medium text-gray-800">Pengguna Baru Ditambahkan</p>
                        <p class="text-sm text-gray-500">Siti Rahma — Staff Gudang</p>
                    </div>
                    <span class="text-xs text-gray-400">3 jam lalu</span>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-between text-xs text-gray-500">
        <p>© 2025 InvMS — Sistem Inventaris Barang v2.4.1</p>
        <p>Last sync: 15 Juli 2025, 14:30 WIB</p>
    </div>
</div>
@endsection 