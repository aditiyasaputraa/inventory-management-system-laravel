<?php

namespace App\Http\Controllers;

use App\Models\OutgoingItem;
use App\Models\Item;
use Illuminate\Http\Request;

class OutgoingItemController extends Controller
{
    public function index()
    {
        $outgoingItems = OutgoingItem::with('item')->latest()->paginate(10);

        return view('outgoing-items.index', compact('outgoingItems'));
    }

    public function create()
    {
        $items = Item::all();

        return view('outgoing-items.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required',
            'jumlah' => 'required|integer|min:1',
            'penerima' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $item = Item::findOrFail($request->item_id);

        if ($request->jumlah > $item->stok) {
            return back()
                ->withInput()
                ->with('error', 'Jumlah barang keluar melebihi stok tersedia.');
        }

        OutgoingItem::create([
            'item_id' => $request->item_id,
            'jumlah' => $request->jumlah,
            'penerima' => $request->penerima,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);

        $item->stok -= $request->jumlah;
        $item->save();

        return redirect()->route('outgoing-items.index')->with('success', 'Barang keluar berhasil ditambahkan dan stok diperbarui.');
    }

    public function destroy(OutgoingItem $outgoingItem)
    {
        $item = $outgoingItem->item;

        if ($item) {
            $item->stok += $outgoingItem->jumlah;
            $item->save();
        }

        $outgoingItem->delete();

        return redirect()->route('outgoing-items.index')->with('success', 'Data barang keluar berhasil dihapus dan stok dikembalikan.');
    }
}