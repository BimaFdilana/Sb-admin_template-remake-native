<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadata untuk halaman -->
    <meta charset="utf-8"> <!-- Menentukan encoding karakter sebagai UTF-8 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Memastikan kompatibilitas dengan versi terbaru dari Internet Explorer -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Membuat halaman responsif di perangkat dengan lebar layar yang berbeda -->
    <meta name="description" content=""> <!-- Deskripsi halaman (biasanya digunakan untuk SEO) -->
    <meta name="author" content=""> <!-- Penulis halaman -->

    <!-- Judul halaman yang muncul di tab browser -->
    <title>Login</title>

    <!-- Mengimpor font kustom untuk template ini-->
    <!-- Menghubungkan FontAwesome untuk ikon (misalnya ikon pengguna, dll.) -->
    <link href="../../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Menghubungkan font Google (Nunito) untuk tipografi halaman -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Menghubungkan stylesheet kustom untuk template ini-->
    <!-- Menghubungkan file CSS utama untuk gaya halaman, kemungkinan besar template SB Admin 2 -->
    <link href="../../../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary d-flex align-items-center justify-content-center" style="height: 100vh;">
    <!-- Kontainer utama untuk bagian kartu login -->
    <div class="container">
        <!-- Bagian Kartu: Ini berisi form login -->
        <div class="col-xl-6 col-lg-8 col-md-10 mx-auto">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Isi Kartu -->
                    <div class="p-5">
                        <!-- Judul halaman login di tengah -->
                        <div class="text-center">
                            <h1 class="font-weight-bold text-gray-900 mb-4">Login</h1> <!-- Judul utama -->
                            <h3 class="h6 text-gray-500 mb-1">Enter your credential</h3> <!-- Subjudul -->
                        </div>
                        <hr> <!-- Garis pemisah -->
                        <!-- Formulir login -->
                        <form class="user" action="../proses/proses_login.php" method="post">
                            <!-- Input untuk email -->
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                    aria-describedby="emailHelp" placeholder="Email" name="email" id="email">
                            </div>
                            <!-- Input untuk password -->
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                                    placeholder="Password" id="password" name="password">
                            </div>
                            <!-- Opsi checkbox untuk "Remember Me" (Ingat saya) -->
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                                </div>
                            </div>
                            <!-- Tombol login -->
                            <div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript inti dari Bootstrap-->
    <script src="../../../assets/vendor/jquery/jquery.min.js"></script> <!-- Mengimpor jQuery -->
    <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> <!-- Mengimpor Bootstrap JS -->

    <!-- JavaScript untuk plugin inti-->
    <script src="../../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Mengimpor easing plugin untuk animasi -->

    <!-- Script kustom untuk semua halaman-->
    <script src="../../../assets/js/sb-admin-2.min.js"></script> <!-- Mengimpor script kustom untuk template ini -->

</body>

</html>