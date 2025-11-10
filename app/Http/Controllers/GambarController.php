<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GambarController extends Controller
{
    public function index()
    {
        $gambar = Gambar::all();
        return view('gambar.index', compact('gambar'));
    }

    public function create()
    {
        return view('gambar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_prod' => 'required|integer',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('gambar')->store('uploads', 'public');

        Gambar::create([
            'id_prod' => $request->id_prod,
            'gambar' => 'storage/' . $path,
        ]);

        return redirect()->route('gambar.index')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $gambar = Gambar::where('id_prod', $id)->firstOrFail();
        return view('gambar.edit', compact('gambar'));
    }

    public function update(Request $request, $id)
    {
        $gambar = Gambar::where('id_prod', $id)->firstOrFail();

        if ($request->hasFile('gambar')) {
            $request->validate(['gambar' => 'image|mimes:jpg,jpeg,png|max:2048']);
            Storage::disk('public')->delete(str_replace('storage/', '', $gambar->gambar));
            $path = $request->file('gambar')->store('uploads', 'public');
            $gambar->update(['gambar' => 'storage/' . $path]);
        }

        return redirect()->route('gambar.index')->with('success', 'Gambar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $gambar = Gambar::where('id_prod', $id)->firstOrFail();
        Storage::disk('public')->delete(str_replace('storage/', '', $gambar->gambar));
        $gambar->delete();

        return redirect()->route('gambar.index')->with('success', 'Gambar berhasil dihapus.');
    }
}
