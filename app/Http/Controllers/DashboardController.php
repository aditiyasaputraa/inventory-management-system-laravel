<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\IncomingItem;
use App\Models\OutgoingItem;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Item::count();
        $totalKategori = Category::count();
        $totalSupplier = Supplier::count();
        $barangMasukBulanIni = IncomingItem::whereMonth('tanggal', now()->month)->sum('jumlah');
        $barangKeluarBulanIni = OutgoingItem::whereMonth('tanggal', now()->month)->sum('jumlah');
        $totalPengguna = User::count();

        $stokRendah = Item::with('category')
            ->where('stok', '<=', 5)
            ->latest()
            ->take(5)
            ->get();

        $aktivitasMasuk = IncomingItem::with('item')->latest()->take(3)->get();
        $aktivitasKeluar = OutgoingItem::with('item')->latest()->take(3)->get();

        $chartMasuk = [];
        $chartKeluar = [];

        for ($i = 1; $i <= 12; $i++) {
            $chartMasuk[] = IncomingItem::whereMonth('tanggal', $i)->sum('jumlah');
            $chartKeluar[] = OutgoingItem::whereMonth('tanggal', $i)->sum('jumlah');
        }

        return view('dashboard', compact(
            'totalBarang',
            'totalKategori',
            'totalSupplier',
            'barangMasukBulanIni',
            'barangKeluarBulanIni',
            'totalPengguna',
            'stokRendah',
            'aktivitasMasuk',
            'aktivitasKeluar',
            'chartMasuk',
            'chartKeluar'
        ));
    }
}