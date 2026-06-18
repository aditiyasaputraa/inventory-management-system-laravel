<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutgoingItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'jumlah',
        'penerima',
        'tanggal',
        'keterangan',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}