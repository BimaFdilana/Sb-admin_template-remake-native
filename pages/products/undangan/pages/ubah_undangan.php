<?php
require('conf/db_conn.php');

$id_undangan = $_GET['id_undangan'];  // Ambil ID undangan dari URL
$query = "SELECT * FROM tb_undangan WHERE id_undangan = '$id_undangan'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

$query_images = "SELECT * FROM tb_image";
$daftar_image = mysqli_query($conn, $query_images);

?>

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-12">
            <h1 class="h3 mb-2 text-gray-800">Admin <i class="fas fa-angle-right"></i> Edit Undangan</h1>
        </div>
    </div>

    <p class="mb-4">Fill in the form below to edit the invitation details. Make sure all fields are completed
        accurately.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Undangan</h6>
        </div>
        <form method="post" action="pages/products/undangan/proses/proses_ubah_undangan.php">
            <input type="hidden" value="<?=$row['id_undangan']?>" name="id_undangan">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_undangan">Nama Undangan</label>
                            <input style="width: 100%; height: 45px;" type="text" name="nama_undangan"
                                class="form-control" id="nama_undangan" placeholder="Masukkan nama undangan..."
                                value="<?= $row['nama_undangan'] ?>">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jumlah_undangan">Jumlah Undangan</label>
                            <input style="width: 100%; height: 45px;" type="number" name="jumlah_undangan"
                                class="form-control" id="jumlah_undangan" placeholder="Masukkan jumlah undangan..."
                                value="<?= $row['jumlah_undangan'] ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="harga_undangan">Harga Undangan</label>
                            <input style="width: 100%; height: 45px;" type="number" name="harga_undangan"
                                class="form-control" id="harga_undangan" placeholder="Masukkan harga undangan..."
                                value="<?= $row['harga_undangan'] ?>">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_undangan">Jenis Undangan</label>
                            <input style="width: 100%; height: 45px;" type="text" name="jenis_undangan"
                                class="form-control" id="jenis_undangan" placeholder="Masukkan jenis undangan..."
                                value="<?= $row['jenis_undangan'] ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="deskripsi_undangan">Deskripsi Undangan</label>
                            <textarea style="width: 100%; height: 150px;" name="deskripsi_undangan" class="form-control"
                                id="deskripsi_undangan"
                                placeholder="Masukkan deskripsi undangan..."><?= $row['deskripsi_undangan'] ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="detail_undangan">Detail Undangan</label>
                            <textarea style="width: 100%; height: 150px;" name="detail_undangan" class="form-control"
                                id="detail_undangan"
                                placeholder="Masukkan detail undangan..."><?= $row['detail_undangan'] ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <?php while($image = mysqli_fetch_assoc($daftar_image)): ?>
                            <label for="id_image">Gambar</label>
                            <select style="width: 250px; height: 45px;" name="id_image" class="form-control"
                                id="id_image">
                                <!-- Opsi default -->
                                <option value="">Pilih Gambar...</option>

                                <!-- Loop untuk menampilkan daftar gambar -->

                                <option value="<?= $image['id_image']; ?>"
                                    <?= $image['id_image'] == $row['id_image'] ? 'selected' : '' ?>>
                                    <?= $image['nama_image']; ?>
                                </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-check ml-3">
                            <input type="checkbox" class="form-check-input" id="hapus_gambar" name="hapus_gambar"
                                onchange="toggleImageField(this)">
                            <label class="form-check-label" for="hapus_gambar">Hapus Gambar</label>
                        </div>
                    </div>
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
function toggleImageField(checkbox) {
    const imageField = document.getElementById('id_image');
    if (checkbox.checked) {
        imageField.disabled = true; // Nonaktifkan dropdown
        imageField.value = ""; // Reset nilai dropdown
    } else {
        imageField.disabled = false; // Aktifkan dropdown
    }
}
</script>