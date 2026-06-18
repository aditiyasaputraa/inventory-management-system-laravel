<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        $items = Item::with(['category', 'supplier'])
            ->when($request->search, function ($query, $search) {
                $query->where('nama_barang', 'like', '%' . $search . '%')
                    ->orWhere('kode_barang', 'like', '%' . $search . '%');
            })
            ->when($request->category_id, function ($query, $categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->when($request->supplier_id, function ($query, $supplierId) {
                $query->where('supplier_id', $supplierId);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('items.index', compact('items', 'categories', 'suppliers'));
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

    public function qrCode(Item $item)
    {
        return view('items.qrcode', compact('item'));
    }
}