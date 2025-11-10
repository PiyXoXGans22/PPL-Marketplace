@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">📦 Daftar Harga Produk</h2>

    <div class="card mb-4">
        <div class="card-header">Tambah / Update Harga</div>
        <div class="card-body">
            <form id="formHarga">
                @csrf
                <div class="mb-3">
                    <label for="id_prod" class="form-label">ID Produk</label>
                    <input type="number" class="form-control" id="id_prod" name="id_prod" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" step="0.01" class="form-control" id="harga" name="harga" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Daftar Harga</div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID Produk</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tabelHarga">
                    <!-- Data akan dimuat dengan JavaScript -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const apiURL = '/api/harga';
    const table = document.getElementById('tabelHarga');
    const form = document.getElementById('formHarga');

    async function loadHarga() {
        const res = await axios.get(apiURL);
        table.innerHTML = res.data.map(h => `
            <tr>
                <td>${h.id_prod}</td>
                <td>${h.harga}</td>
                <td>
                    <button class="btn btn-sm btn-danger" onclick="hapusHarga(${h.id_prod})">Hapus</button>
                </td>
            </tr>
        `).join('');
    }

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const id_prod = form.id_prod.value;
        const harga = form.harga.value;

        try {
            await axios.put(`${apiURL}/${id_prod}`, { harga });
        } catch {
            await axios.post(apiURL, { id_prod, harga });
        }

        form.reset();
        loadHarga();
    });

    async function hapusHarga(id) {
        if (confirm('Yakin ingin menghapus data ini?')) {
            await axios.delete(`${apiURL}/${id}`);
            loadHarga();
        }
    }

    loadHarga();
</script>
@endsection
