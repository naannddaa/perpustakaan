<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container d-flex justify-content-center">
    <div class="card shadow-lg mt-3" style="width: 30rem;">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">R E G I S T E R</h3>
            <form id="register-form" action="{{ route('register.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" id="name" name="username" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" minlength="6" required>
                    <small class="text-danger d-none" id="password-error">Password harus minimal 6 karakter!</small>
                </div>

                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>

                <div class="mb-3">
                    <label for="gaji" class="form-label">Gaji Pokok</label>
                    <input type="number" class="form-control" id="gaji" name="gaji_pokok" required>
                </div>

                <div class="mb-3">
                    <label for="pinjaman" class="form-label">Pinjaman</label>
                    <input type="number" class="form-control" id="pinjaman" name="pinjaman" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Daftar</button>
            </form>
            <p class="mt-3 text-center">Sudah punya akun? <a>Login</a></p>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("register-form");

    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Mencegah pengiriman langsung

        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "PASTIKAN DATA YANG ANDA MASUKKAN SUDAH BENAR!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Buat Akun!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Kirim formulir jika dikonfirmasi
            }
        });
    });
});
</script>

</body>
</html>
