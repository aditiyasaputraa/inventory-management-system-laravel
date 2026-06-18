<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\IncomingItem;
use App\Models\OutgoingItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ItemsExport;
use App\Exports\IncomingItemsExport;
use App\Exports\OutgoingItemsExport;

class LaporanController extends Controller
{
    public function barangPdf()
    {
        $items = Item::with(['category', 'supplier'])->get();

        $pdf = Pdf::loadView('laporan.barang-pdf', compact('items'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-data-barang.pdf');
    }

    public function barangMasukPdf()
    {
        $incomingItems = IncomingItem::with('item')->get();

        $pdf = Pdf::loadView('laporan.barang-masuk-pdf', compact('incomingItems'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-barang-masuk.pdf');
    }

    public function barangKeluarPdf()
    {
        $outgoingItems = OutgoingItem::with('item')->get();

        $pdf = Pdf::loadView('laporan.barang-keluar-pdf', compact('outgoingItems'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-barang-keluar.pdf');
    }

    public function barangExcel()
    {
        return Excel::download(new ItemsExport, 'laporan-data-barang.xlsx');
    }

    public function barangMasukExcel()
    {
        return Excel::download(new IncomingItemsExport, 'laporan-barang-masuk.xlsx');
    }

    public function barangKeluarExcel()
    {
        return Excel::download(new OutgoingItemsExport, 'laporan-barang-keluar.xlsx');
    }
}