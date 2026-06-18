<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromCollection;

class ItemsExport implements FromCollection
{
    public function collection()
    {
        return Item::select(
            'kode_barang',
            'nama_barang',
            'stok',
            'satuan',
            'lokasi'
        )->get();
    }
}