<?php

namespace App\Http\Controllers;

use App\Models\IncomingItem;
use App\Models\Item;
use Illuminate\Http\Request;

class IncomingItemController extends Controller
{
    public function index()
    {
        $incomingItems = IncomingItem::with('item')->latest()->paginate(10);

        return view('incoming-items.index', compact('incomingItems'));
    }

    public function create()
    {
        $items = Item::all();

        return view('incoming-items.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required',
            'jumlah' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $item = Item::findOrFail($request->item_id);

        IncomingItem::create([
            'item_id' => $request->item_id,
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);

        $item->stok += $request->jumlah;
        $item->save();

        return redirect()->route('incoming-items.index')->with('success', 'Barang masuk berhasil ditambahkan dan stok diperbarui.');
    }

    public function destroy(IncomingItem $incomingItem)
    {
        $item = $incomingItem->item;

        if ($item) {
            $item->stok -= $incomingItem->jumlah;
            if ($item->stok < 0) {
                $item->stok = 0;
            }
            $item->save();
        }

        $incomingItem->delete();

        return redirect()->route('incoming-items.index')->with('success', 'Data barang masuk berhasil dihapus dan stok dikembalikan.');
    }
}