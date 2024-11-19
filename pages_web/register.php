<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <title>BaleeKun-Digital</title>
</head>

<body>
    <br>
    <div class="col-xl-4 col-lg-8 col-md-10 mx-auto">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Card Body -->
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="font-weight-bold text-gray-900 mb-4">Register</h1>
                        <h3 class="h6 text-gray-500 mb-1">Enter Find Your Product</h3>
                    </div>
                    <hr>
                    <form class="user" action="pages/admin/proses/proses_tambah_user.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" id="exampleInputUsername"
                                aria-describedby="usernameHelp" placeholder="Masukkan Nama Pengguna..." name="username"
                                id="username">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                aria-describedby="emailHelp" placeholder="Masukkan Email..." name="email" id="email">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="no_hp" value="085175244552">
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                                    placeholder="Masukkan Kata Sandi..." name="password">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="toggle-password">
                                        <i class="ri-eye-line"></i> <!-- Ikon mata -->
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user"
                                id="exampleInputretype_password" placeholder="Ketik Ulang Kata Sandi..."
                                id="retype_password" name="retype_password">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-warning btn-user btn-block">Register</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <p>Sudah memiliki akun? <a href="index.php?page=login" class="text-primary">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="assets/js/main.js"></script>

    <script>
    // Tambahkan event listener untuk toggle password
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.getElementById('toggle-password');
        const passwordField = document.querySelector(
            '[name="password"]'); // Menggunakan querySelector untuk memilih input password

        togglePassword.addEventListener('click', function() {
            // Ganti tipe input dari password ke text, atau sebaliknya
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;

            // Ganti ikon mata terbuka/tutup
            const icon = togglePassword.querySelector('i');
            if (passwordField.type === 'password') {
                icon.classList.replace('ri-eye-off-line', 'ri-eye-line'); // Mata terbuka
            } else {
                icon.classList.replace('ri-eye-line', 'ri-eye-off-line'); // Mata tertutup
            }
        });
    });
    </script>
</body>

</html>