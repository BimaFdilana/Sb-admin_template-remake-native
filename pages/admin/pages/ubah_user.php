<?php
require('conf/db_conn.php');
// Menyertakan file koneksi database untuk memungkinkan operasi query ke database.

// Mendapatkan parameter 'id' dari URL melalui metode GET.
$id = $_GET['id'];

// Query untuk mengambil data pengguna berdasarkan 'id' dari tabel 'tb_user'.
$query = "SELECT * FROM tb_user WHERE id = '$id'";

// Menjalankan query di database.
$result = mysqli_query($conn, $query);

// Mengambil hasil query dalam bentuk array.
$row = mysqli_fetch_array($result);
?>

<div class="container-fluid">
    <!-- Kontainer utama untuk halaman ini, yang memberi struktur pada elemen-elemen di dalamnya. -->

    <div class="row mb-2">
        <!-- Baris untuk judul halaman, dengan margin bawah. -->

        <div class="col-sm-12">
            <!-- Kolom yang mengambil seluruh lebar pada perangkat dengan ukuran kecil hingga besar. -->
            <h1 class="h3 mb-2 text-gray-800">Admin <i class="fas fa-angle-right"></i> Edit Account</h1>
            <!-- Judul halaman dengan ikon untuk menunjukkan bagian 'Edit Account'. -->
        </div>
    </div>

    <p class="mb-4">
        <!-- Paragraf yang menjelaskan fungsionalitas halaman ini, yaitu untuk mengedit akun. -->
        Fill in the form below to edit the account. Ensure that all required fields are completed
        accurately. For more details or assistance, please refer to the user guide.
    </p>

    <div class="card shadow mb-4">
        <!-- Card untuk menampilkan form pengeditan akun dengan bayangan (shadow) dan margin bawah (mb-4). -->

        <div class="card-header py-3">
            <!-- Bagian header card, memberi judul 'Edit Account'. -->
            <h6 class="m-0 font-weight-bold text-primary">Edit Account</h6>
        </div>

        <form method="post" action="pages/admin/proses/proses_ubah_user.php">
            <!-- Formulir untuk mengirim data yang diubah melalui metode POST ke proses_ubah_user.php. -->

            <!-- Menyembunyikan input ID agar tetap terkirim saat formulir disubmit. -->
            <input type="hidden" value="<?=$row['id']?>" name="id">

            <div class="card-body">
                <!-- Bagian tubuh card untuk memasukkan input formulir. -->

                <div class="form-group">
                    <!-- Grup form untuk input nama pengguna. -->
                    <label for="username">Nama Pengguna</label>
                    <input type="text" name="username" class="form-control" id="username"
                        placeholder="Masukkan nama pengguna..." value="<?= $row['username'] ?>" required>
                    <!-- Input untuk nama pengguna, diisi dengan nilai yang diambil dari database. -->
                </div>

                <div class="form-group">
                    <!-- Grup form untuk input alamat email. -->
                    <label for="email">Alamat Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email..."
                        value="<?= $row['email'] ?>" required>
                    <!-- Input untuk email pengguna, diisi dengan nilai yang diambil dari database. -->
                </div>

                <div class="form-group">
                    <!-- Grup form untuk input nomor handphone. -->
                    <label for="no_hp">Nomor Handphone</label>
                    <input type="tel" name="no_hp" class="form-control" id="no_hp"
                        placeholder="Masukkan nomor handphone..." value="<?= $row['no_hp'] ?>" required>
                    <!-- Input untuk nomor telepon, diisi dengan nilai yang diambil dari database. -->
                </div>

                <div class="form-group">
                    <!-- Grup form untuk input role pengguna. -->
                    <label for="role">Role</label>
                    <input type="text" name="role" class="form-control" id="role" placeholder="Masukkan role..."
                        value="<?= $row['role'] ?>" required>
                    <!-- Input untuk role pengguna, diisi dengan nilai yang diambil dari database. -->
                </div>

                <div class="form-group">
                    <!-- Grup form untuk input kata sandi (opsional). -->
                    <label for="password">Kata Sandi (Opsional)</label>
                    <input type="password" name="password" class="form-control" id="password"
                        placeholder="Kosongkan jika tidak ingin mengubah">
                    <!-- Input untuk kata sandi. Pengguna dapat mengosongkan jika tidak ingin mengubahnya. -->
                </div>

                <div class="form-group" id="retype-password-container" style="display: none;">
                    <!-- Grup form untuk input pengulangan kata sandi, disembunyikan awalnya. -->
                    <label for="retype_password">Ulangi Kata Sandi</label>
                    <input type="password" name="retype_password" class="form-control" id="retype_password"
                        placeholder="Ketik ulang kata sandi...">
                    <!-- Input untuk mengonfirmasi kata sandi yang baru dimasukkan. -->
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <!-- Bagian footer dari card, di mana tombol kirim ditempatkan. -->
                <button type="submit" class="btn btn-primary">Submit</button>
                <!-- Tombol untuk mengirimkan formulir setelah pengeditan selesai. -->
            </div>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

<script>
const passwordInput = document.getElementById('password');
const retypePasswordContainer = document.getElementById('retype-password-container');

// Tampilkan field "Ulangi Kata Sandi" hanya jika password diisi
passwordInput.addEventListener('input', function() {
    // Jika kolom password diisi, tampilkan kolom "Ulangi Kata Sandi".
    if (passwordInput.value.trim() !== '') {
        retypePasswordContainer.style.display = 'block';
    } else {
        retypePasswordContainer.style.display = 'none';
    }
});
</script>
<!-- Script JavaScript untuk menampilkan atau menyembunyikan kolom "Ulangi Kata Sandi" berdasarkan apakah kata sandi diisi atau tidak. -->