<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }
        .registrasi-box {
            width: 400px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-control {
            border-radius: 25px;
            padding-right: 40px;
        }
        .btn-primary {
            border-radius: 25px;
        }
        .password-container {
            position: relative;
        }
        .toggle-password {
            position: absolute;
            top: 72%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            color: gray;
        }
        .error-box {
            display: none;
            background-color: #ffdddd;
            color: #d8000c;
            padding: 8px;
            border-radius: 5px;
            font-size: 12px;
            margin-bottom: 10px;
            text-align: left;
            border: 1px solid #d8000c;
        }
        .forgot-password {
            display: block;
            text-align: left;
            margin-top: 10px;
            text-decoration: underline;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="registrasi-box">
        <h3 class="text-center mb-3">Registrasi</h3>
        <div id="errorMessage" class="error-box"></div>
        <form id="registrasiForm" action="{{ route('registrasi.store') }}" method="POST">
            @csrf <!-- Tambahkan CSRF token untuk keamanan -->
            <div class="mb-2">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="masukkan username">
            </div>

            <div class="mb-2 password-container">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="masukkan password">
                <i class="bi bi-eye toggle-password" id="togglePassword"></i>
            </div>

            <div class="mb-2">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="masukkan nama lengkap anda">
            </div>

            <div class="mb-2">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="masukkan alamat">
            </div>

            <div class="mb-2">
                <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" placeholder="masukkan gaji pokok">
            </div>

            <div class="mb-2">
                <label for="pinjaman" class="form-label">Pinjaman</label>
                <input type="text" class="form-control" id="pinjaman" name="pinjaman" placeholder="masukkan pinjaman">
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-2" id="submitButton">Buat Akun</button>
            <a href="#" class="">Sudah Punya Akun? Login</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Toggle show/hide password
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
            this.classList.toggle('bi-eye-slash');
            this.classList.toggle('bi-eye');
        });

        // Form Validation dengan SweetAlert
        document.getElementById('registrasiForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Mencegah form submit default

            let isValid = true;
            let errorMessage = "";

            const usernameField = document.getElementById("username");
            const passwordField = document.getElementById("password");
            const namaLengkapField = document.getElementById("nama_lengkap");
            const alamatField = document.getElementById("alamat");
            const gajiPokokField = document.getElementById("gaji_pokok");
            const pinjamanField = document.getElementById("pinjaman");

            // Validasi input
            if (!usernameField.value.trim()) {
                errorMessage += "Username harus diisi!<br>";
                isValid = false;
            }

            if (!passwordField.value.trim()) {
                errorMessage += "Password harus diisi!<br>";
                isValid = false;
            }

            if (!namaLengkapField.value.trim()) {
                errorMessage += "Nama lengkap harus diisi!<br>";
                isValid = false;
            }

            if (!alamatField.value.trim()) {
                errorMessage += "Alamat harus diisi!<br>";
                isValid = false;
            }

            if (!gajiPokokField.value.trim() || isNaN(gajiPokokField.value)) {
                errorMessage += "Gaji pokok harus berupa angka!<br>";
                isValid = false;
            }

            if (!pinjamanField.value.trim() || isNaN(pinjamanField.value)) {
                errorMessage += "Pinjaman harus berupa angka!<br>";
                isValid = false;
            }

            // Jika ada error, tampilkan SweetAlert
            if (!isValid) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: errorMessage, // Menampilkan pesan error
                });
                return;
            }

            // Jika validasi berhasil, tampilkan konfirmasi
            Swal.fire({
                title: 'Yakin ingin membuat akun?',
                text: "Pastikan data yang Anda masukkan sudah benar!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Buat Akun!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit form jika konfirmasi diterima
                    this.submit();
                }
            });
        });

        // Tampilkan notifikasi sukses jika ada session success
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '{{ session('success') }}',
        });
        @endif
    </script>
</body>
</html>
