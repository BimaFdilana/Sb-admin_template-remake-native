<?php
require('conf/db_conn.php');

$id = $_GET['id'];
$query = "SELECT * FROM tb_user WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-12">
            <h1 class="h3 mb-2 text-gray-800">Admin <i class="fas fa-angle-right"></i> Edit Account</h1>
        </div>
    </div>
    <p class="mb-4">Fill in the form below to edit the account. Ensure that all required fields are completed
        accurately. For more details or assistance, please refer to the user guide.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Account</h6>
        </div>
        <form method="post" action="pages/admin/proses/proses_ubah_user.php">
            <input type="hidden" value="<?=$row['id']?>" name="id">
            <div class="card-body">
                <div class="form-group">
                    <label for="username">Nama Pengguna</label>
                    <input type="text" name="username" class="form-control" id="username"
                        placeholder="Masukkan nama pengguna..." value="<?= $row['username'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email..."
                        value="<?= $row['email'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="no_hp">Nomor Handphone</label>
                    <input type="tel" name="no_hp" class="form-control" id="no_hp"
                        placeholder="Masukkan nomor handphone..." value="<?= $row['no_hp'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <input type="text" name="role" class="form-control" id="role" placeholder="Masukkan role..."
                        value="<?= $row['role'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Kata Sandi (Opsional)</label>
                    <input type="password" name="password" class="form-control" id="password"
                        placeholder="Kosongkan jika tidak ingin mengubah">
                </div>
                <div class="form-group" id="retype-password-container" style="display: none;">
                    <label for="retype_password">Ulangi Kata Sandi</label>
                    <input type="password" name="retype_password" class="form-control" id="retype_password"
                        placeholder="Ketik ulang kata sandi...">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
    if (passwordInput.value.trim() !== '') {
        retypePasswordContainer.style.display = 'block';
    } else {
        retypePasswordContainer.style.display = 'none';
    }
});
</script>

<!-- /.container-fluid -->