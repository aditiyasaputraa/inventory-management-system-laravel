<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>InvMS - Inventory System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
        <div class="p-6 flex items-center gap-3">
            <div class="w-10 h-10 bg-blue-600 text-white rounded-xl flex items-center justify-center font-bold">
                I
            </div>
            <div>
                <h1 class="font-bold text-gray-800">InvMS</h1>
                <p class="text-xs text-gray-500">Inventory System</p>
            </div>
        </div>

        <nav class="flex-1 px-4 space-y-1">
            <p class="text-xs font-semibold text-gray-400 px-3 mb-2">MAIN MENU</p>

            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg bg-blue-50 text-blue-600 font-medium">
                Dashboard
            </a>
            <a href="{{ route('items.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100">
                Data Barang
            </a>
            <a href="{{ route('categories.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100">
                Kategori Barang
            </a>
            <a href="{{ route('suppliers.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100">
                Supplier
            </a>
            <a href="{{ route('incoming-items.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100">
                Barang Masuk
            </a>
            <a href="{{ route('outgoing-items.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100">
                Barang Keluar
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100">
                Permintaan Barang
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100">
                QR Code Barang
            </a>

            <p class="text-xs font-semibold text-gray-400 px-3 pt-6 mb-2">SYSTEM</p>

            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100">
                Laporan
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100">
                Pengguna
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100">
                Pengaturan
            </a>
        </nav>

        <div class="p-4 border-t border-gray-200">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-gray-300 rounded-full"></div>
                <div class="flex-1">
                    <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name ?? 'User' }}</p>
                    <p class="text-xs text-gray-500">{{ Auth::user()->role ?? 'Admin' }}</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1">
        <header class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
            <div>
                <h2 class="text-xl font-bold text-gray-800">@yield('title', 'Dashboard')</h2>
                <p class="text-sm text-gray-500">Selamat datang kembali di sistem inventaris</p>
            </div>

            <div class="flex items-center gap-3">
                <input type="text" placeholder="Cari barang..." class="rounded-xl border-gray-300 text-sm">
                <button class="bg-blue-600 text-white px-4 py-2 rounded-xl text-sm font-medium">
                    + Tambah Barang
                </button>
            </div>
        </header>

        <section class="p-6">
            @yield('content')
        </section>
    </main>
</div>

</body>
</html>