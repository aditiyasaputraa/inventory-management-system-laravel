<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with(['category', 'supplier'])->latest()->paginate(10);

        return view('items.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('items.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|string|max:50',
            'lokasi' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $kodeBarang = 'BRG-' . str_pad(Item::count() + 1, 4, '0', STR_PAD_LEFT);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('barang', 'public');
        }

        Item::create([
            'kode_barang' => $kodeBarang,
            'nama_barang' => $request->nama_barang,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'lokasi' => $request->lokasi,
            'gambar' => $gambar,
        ]);

        return redirect()->route('items.index')->with('success', 'Data barang berhasil ditambahkan.');
    }

    public function edit(Item $item)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('items.edit', compact('item', 'categories', 'suppliers'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'stok' => 'required|integer|min:0',
            'satuan' => 'required|string|max:50',
            'lokasi' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambar = $item->gambar;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('barang', 'public');
        }

        $item->update([
            'nama_barang' => $request->nama_barang,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'lokasi' => $request->lokasi,
            'gambar' => $gambar,
        ]);

        return redirect()->route('items.index')->with('success', 'Data barang berhasil diperbarui.');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Data barang berhasil dihapus.');
    }
}