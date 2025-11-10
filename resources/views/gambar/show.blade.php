@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <h2>Detail Gambar Produk</h2>

  <div class="card">
    <div class="card-body">
      <p><strong>ID Produk:</strong> {{ $gambar->id_prod }}</p>
      <p><strong>Path Gambar:</strong> {{ $gambar->gambar }}</p>
      <img src="{{ asset($gambar->gambar) }}" width="300" class="rounded shadow mt-2">
    </div>
  </div>

  <a href="{{ route('gambar.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
