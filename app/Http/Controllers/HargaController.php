<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    /**
     * Tampilkan semua data harga (halaman utama)
     */
    public function index()
    {
        $data = Harga::all();
        return view('harga.index', compact('data'));
    }

    /**
     * Tampilkan form tambah harga
     */
    public function create()
    {
        return view('harga.create');
    }

    /**
     * Simpan data harga baru ke database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_prod' => 'required|integer|unique:harga,id_prod',
            'harga'   => 'required|numeric',
        ]);

        Harga::create($validated);
        return redirect()->route('harga.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail satu harga
     */
    public function show($id)
    {
        $harga = Harga::findOrFail($id);
        return view('harga.show', compact('harga'));
    }

    /**
     * Tampilkan form edit harga
     */
    public function edit($id)
    {
        $harga = Harga::findOrFail($id);
        return view('harga.edit', compact('harga'));
    }

    /**
     * Proses update data harga
     */
    public function update(Request $request, $id)
    {
        $harga = Harga::findOrFail($id);

        $validated = $request->validate([
            'harga' => 'required|numeric',
        ]);

        $harga->update($validated);
        return redirect()->route('harga.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Hapus data harga
     */
    public function destroy($id)
    {
        $harga = Harga::findOrFail($id);
        $harga->delete();
        return redirect()->route('harga.index')->with('success', 'Data berhasil dihapus!');
    }
}
