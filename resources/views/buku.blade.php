@extends('auth.layout')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container-scroller">
        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="text-start mb-4">Data Buku</h2>
            </div>

            {{-- Form Search --}}
            <div class="pb-3">
                <form class="d-flex" action="{{ route('buku.index') }}" method="GET">
                    <input class="form-control me-1" type="search" name="katakunci" placeholder="Cari" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                </form>
            </div>

            {{-- Tambah Data --}}
            <div class="pb-3" style="text-align:right;">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">+ Tambah Data</a>
            </div>

            {{-- Display Data --}}
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Tanggal Beli</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($databuku as $a)
                        <tr>
                            <td>{{ $a->judul }}</td>
                            <td>{{ $a->pengarang }}</td>
                            <td>{{ $a->tgl_pembelian }}</td>
                            <td>{{ $a->jumlah }}</td>
                            <td>{{ $a->status }}</td>
                            <td>
                                <button type="button" data-bs-toggle="modal" href="#"
                                    data-bs-target="#modaledit"
                                    class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <a href="#" data-id="" class="btn btn-danger btn-sm delete right" title="Hapus Data">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center">
                {{ $databuku->links() }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
