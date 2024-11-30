<div class="container-fluid">
    <!-- Menampilkan kontainer utama untuk halaman ini, memungkinkan elemen di dalamnya untuk terstruktur dengan baik dalam layout grid. -->
    <div class="row mb-2">
        <!-- Baris ini mengatur struktur layout dengan margin bawah (mb-2) untuk jarak antara elemen di dalamnya. -->
        <div class="col-sm-12">
            <!-- Kolom dengan ukuran 12 untuk menampung seluruh konten di baris ini. -->
            <h1 class="h3 mb-2 text-gray-800">Admin <i class="fas fa-angle-right"></i> Register Account</h1>
            <!-- Judul halaman, dengan ikon untuk menunjukkan bagian 'Register Account'. -->
        </div>
    </div>
    <p class="mb-4">
        <!-- Paragraf penjelasan untuk memberitahukan pengguna bahwa mereka akan mengisi formulir untuk membuat akun baru. -->
        Fill in the form below to create a new account. Ensure that all required fields are completed accurately.
        For more details or assistance, please refer to the user guide. official DataTables documentation
    </p>
    <div class="card shadow mb-4">
        <!-- Card untuk membungkus form dengan bayangan (shadow) dan margin bawah (mb-4) untuk jarak dengan elemen lainnya. -->
        <div class="card-header py-3">
            <!-- Bagian header card yang memberi judul 'Register Account'. -->
            <h6 class="m-0 font-weight-bold text-primary">Register Account</h6>
        </div>
        <form method="post" action="pages/admin/proses/proses_tambah_user.php">
            <!-- Formulir untuk mengumpulkan data pengguna baru. Data yang diisi akan dikirim menggunakan metode POST ke proses_tambah_user.php. -->
            <div class="card-body">
                <!-- Bagian body dari card, di mana input formulir diletakkan. -->
                <div class="form-group">
                    <!-- Grup form untuk input nama pengguna. -->
                    <label for="username">Nama Pengguna</label>
                    <!-- Label untuk kolom Nama Pengguna. -->
                    <input type="text" name="username" class="form-control" id="username"
                        placeholder="Masukan nama pengguna...">
                    <!-- Input teks untuk nama pengguna. -->
                </div>
                <div class="form-group">
                    <!-- Grup form untuk input alamat email. -->
                    <label for="email">Alamat Email</label>
                    <!-- Label untuk kolom Email. -->
                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukan email...">
                    <!-- Input email untuk memasukkan alamat email pengguna. -->
                </div>

                <div class="form-group">
                    <!-- Grup form untuk input nomor handphone. -->
                    <label for="no_hp">Nomor Handphone</label>
                    <!-- Label untuk kolom Nomor HP. -->
                    <input type="tel" name="no_hp" class="form-control" id="no_hp"
                        placeholder="Masukan nomor handphone...">
                    <!-- Input nomor telepon untuk pengguna. -->
                </div>

                <div class="form-group">
                    <!-- Grup form untuk input kata sandi. -->
                    <label for="password">Kata Sandi</label>
                    <!-- Label untuk kolom Kata Sandi. -->
                    <input type="password" name="password" class="form-control" id="password"
                        placeholder="Masukan kata sandi...">
                    <!-- Input kata sandi yang akan disembunyikan saat mengetik. -->
                </div>

                <div class="form-group">
                    <!-- Grup form untuk input pengulangan kata sandi. -->
                    <label for="retype_password">Ulangi Kata Sandi</label>
                    <!-- Label untuk kolom Ulangi Kata Sandi. -->
                    <input type="password" name="retype_password" class="form-control" id="retype_password"
                        placeholder="Ketik ulang kata sandi...">
                    <!-- Input kata sandi untuk memastikan kata sandi yang dimasukkan sebelumnya benar. -->
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <!-- Bagian footer card dengan tombol kirim. -->
                <button type="submit" class="btn btn-primary">Submit</button>
                <!-- Tombol kirim untuk mengirim formulir. -->
            </div>
        </form>
    </div>
</div>
<!-- /.container-fluid -->