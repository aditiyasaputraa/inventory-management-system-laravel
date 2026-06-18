<?php

namespace App\Exports;

use App\Models\OutgoingItem;
use Maatwebsite\Excel\Concerns\FromCollection;

class OutgoingItemsExport implements FromCollection
{
    public function collection()
    {
        return OutgoingItem::select(
            'item_id',
            'jumlah',
            'penerima',
            'tanggal',
            'keterangan'
        )->get();
    }
}