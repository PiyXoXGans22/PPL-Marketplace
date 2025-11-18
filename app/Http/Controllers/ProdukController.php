<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // ============================================================
    // Tampilkan semua produk beserta stok & kategori
    // ============================================================
    public function index()
    {
        $produk = Produk::with(['stok', 'kategori'])->get();
        return view('produk.index', compact('produk'));
    }

    // ============================================================
    // Form Tambah Produk
    // ============================================================
    public function create()
    {
        return view('produk.create');
    }

    // ============================================================
    // Simpan Produk Baru
    // ============================================================
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:150',
            'deskripsi'   => 'required|string'
        ]);

        Produk::create([
            // id sudah auto increment di DB kamu
            'nama_produk' => $request->nama_produk,
            'deskripsi'   => $request->deskripsi
        ]);

        return redirect()->route('produk.index')
                         ->with('success', 'Produk berhasil ditambahkan!');
    }

    // ============================================================
    // Form Edit Produk
    // ============================================================
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    // ============================================================
    // Update Produk
    // ============================================================
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:150',
            'deskripsi'   => 'required|string'
        ]);

        $produk = Produk::findOrFail($id);

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'deskripsi'   => $request->deskripsi
        ]);

        return redirect()->route('produk.index')
                         ->with('success', 'Produk berhasil diperbarui!');
    }

    // ============================================================
    // Hapus Produk
    // ============================================================
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produk.index')
                         ->with('success', 'Produk berhasil dihapus!');
    }
}
