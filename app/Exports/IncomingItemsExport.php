<?php

namespace App\Exports;

use App\Models\IncomingItem;
use Maatwebsite\Excel\Concerns\FromCollection;

class IncomingItemsExport implements FromCollection
{
    public function collection()
    {
        return IncomingItem::select(
            'item_id',
            'jumlah',
            'tanggal',
            'keterangan'
        )->get();
    }
}