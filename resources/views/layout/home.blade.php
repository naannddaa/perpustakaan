@include('sweetalert::alert')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Akun</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
{{-- @include('register') --}}

<div class="container mt-5">
    <h2 class="mb-4">Data Akun Nasabah </h2>

    <!-- Form Search -->
    <div class="mb-3">
        <form class="d-flex" action="" method="get">
            <input class="form-control me-2" type="search" name="katakunci" value="" placeholder="Cari..." aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Cari</button>
        </form>
    </div>

    <!-- Tambah Data -->
    <div class="mb-3 text-end">
        <a href="{{ url('/register') }}" class="btn btn-primary">+ Tambah Data</a>
    </div>

    <!-- Tabel Data -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Gaji</th>
                    <th>Pinjaman</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataregistrasi as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->username }}</td>
                    {{-- <td>{{ $a->password }}</td> --}}
                    <td>{{ $a->nama_lengkap }}</td>
                    <td>{{ $a->alamat }}</td>
                    <td>{{ $a->gaji_pokok }}</td>
                    <td>{{ $a->pinjaman }}</td>
                    <td>
                        <!-- Tombol Edit -->
                        <button type="button" class="btn btn-warning btn-sm edit-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#modaledit-{{ $a->id }}">
                            Edit <i class="bi bi-pencil-square"></i>
                        </button>

                        <!-- Tombol Hapus -->
                        <a href="#" data-id="{{ $a->id }}" class="btn btn-danger btn-sm delete">
                            Hapus <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Edit Data -->
@foreach ($dataregistrasi as $data)
<div class="modal fade" id="modaledit-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('register.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="{{ $data->username }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password Baru (kosongkan jika tidak ingin mengubah)</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan password baru">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" value="{{ $data->nama_lengkap }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{ $data->alamat }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gaji Pokok</label>
                        <input type="text" class="form-control" name="gaji_pokok" value="{{ $data->gaji_pokok }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pinjaman</label>
                        <input type="text" class="form-control" name="pinjaman" value="{{ $data->pinjaman }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach

</div>

<!-- SweetAlert & jQuery untuk Menghapus Data -->
<script>
    $(document).ready(function() {
        $('.delete').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var row = $(this).closest("tr"); // Menyimpan baris yang akan dihapus

            swal({
                title: "Hapus Akun",
                text: "Apakah Anda yakin ingin menghapus data ini?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "/register/" + id + "/destroy",
                        type: "POST", // Gunakan POST untuk mengirim DELETE request
                        data: {
                            _method: "DELETE", // Laravel memerlukan metode DELETE
                            _token: "{{ csrf_token() }}" // Token CSRF untuk keamanan
                        },
                        success: function(response) {
                            swal("Berhasil!", "Data berhasil dihapus.", "success")
                            .then(() => {
                                row.fadeOut(500, function() {
                                    $(this).remove();
                                });
                            });
                        },
                        error: function(xhr) {
                            swal("Gagal!", "Terjadi kesalahan saat menghapus data.", "error");
                        }
                    });
                }
            });
        });

        // Pastikan modal hanya muncul saat tombol "Edit" diklik
        $('.edit-btn').click(function() {
            var targetModal = $(this).attr('data-bs-target');
            $(targetModal).modal('show');
        });
    });
</script>



<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
