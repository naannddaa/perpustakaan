@extends('layout.main') <!-- Sesuaikan dengan layout yang digunakan -->

@section('konten')
@include('sweetalert::alert')
<div class="container-scroller">
    <div class="table-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-start mb-4">Akun</h2>
        </div>

        {{-- Form Search --}}
        <div class="pb-3">
            <form class="d-flex" action="" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="" placeholder="Cari" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Cari</button>
            </form>
        </div>

        {{-- Tambah Data --}}
        <div class="pb-3" style="text-align:right;">
            <a href="{{ url('/registrasi') }}" class="btn btn-primary">+ Tambah Data</a>        </div>

        {{-- Display Data --}}
        <div class="table-responsive">
            <table class="table">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>NAMA</th>
                        <th>ALAMAT</th>
                        <th>GAJI</th>
                        <th>PINJAMAN</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataregistrasi as $a)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $a->username }}</td>
                        <td>{{ $a->password }}</td>
                        <td>{{ $a->nama_lengkap }}</td>
                        <td>{{ $a->alamat }}</td>
                        <td>{{ $a->gaji_pokok }}</td>
                        <td>{{ $a->pinjaman }}</td>
                        <td>
                            <button type="button" data-bs-toggle="modal" href="#"
                                data-bs-target="#modaledit-{{ $a->id }}"
                                class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <a href="#" data-id="{{ $a->id }}" class="btn btn-danger btn-sm delete" title="Hapus Data">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Modal Tambah Data --}}
        {{-- <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Akun</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('regis.store') }}" method="POST">
                            @csrf
                            <div class="col-12">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Gaji Pokok</label>
                                <input type="text" class="form-control" name="gaji_pokok" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Pinjaman</label>
                                <input type="text" class="form-control" name="pinjaman" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- Modal Edit Data --}}
        @foreach ($dataregistrasi as $data)
        <div class="modal fade" id="modaledit-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabeledit" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('regis.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Akun</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" value="{{ $data->username }}" required>
                            </div>
                            <div class="col-12">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" value="{{ $data->password }}" required>
                            </div>
                            <div class="col-12">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" value="{{ $data->nama_lengkap }}" required>
                            </div>
                            <div class="col-12">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="{{ $data->alamat }}" required>
                            </div>
                            <div class="col-12">
                                <label>Gaji Pokok</label>
                                <input type="text" class="form-control" name="gaji_pokok" value="{{ $data->gaji_pokok }}" required>
                            </div>
                            <div class="col-12">
                                <label>Pinjaman</label>
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

        {{-- SweetAlert Delete --}}
        <script>
            $('.delete').click(function() {
                var id = $(this).attr('data-id');
                swal({
                        title: "Hapus Akun",
                        text: "Apakah Anda yakin ingin menghapus data ini?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location = "/regis/" + id + "/destroy";
                        }
                    });
            });
        </script>
    </div>
</div>
@endsection
