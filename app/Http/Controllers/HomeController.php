<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil produk beserta gambar + harga + stok + kategori
        $produk = Produk::with(['gambar', 'harga', 'stok', 'kategori'])->get();

        return view('home', compact('produk'));
    }
}
