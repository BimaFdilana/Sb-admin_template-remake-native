<?php
require('conf/db_conn.php');

$id_undangan = $_GET['id_undangan'];  // Ambil ID undangan dari URL
$query = "SELECT * FROM tb_undangan WHERE id_undangan = '$id_undangan'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>

<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-12">
            <h1 class="h3 mb-2 text-gray-800">Admin <i class="fas fa-angle-right"></i> Edit Undangan</h1>
        </div>
    </div>

    <p class="mb-4">Fill in the form below to edit the invitation details. Make sure all required fields are completed
        accurately.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Undangan</h6>
        </div>
        <form method="post" action="pages/products/undangan/proses/proses_ubah_undangan.php">
            <input type="hidden" value="<?=$row['id_undangan']?>" name="id_undangan">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_undangan">Nama Undangan</label>
                    <input type="text" name="nama_undangan" class="form-control" id="nama_undangan"
                        placeholder="Masukkan nama undangan..." value="<?= $row['nama_undangan'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="jumlah_undangan">Jumlah Undangan</label>
                    <input type="number" name="jumlah_undangan" class="form-control" id="jumlah_undangan"
                        placeholder="Masukkan jumlah undangan..." value="<?= $row['jumlah_undangan'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="harga_undangan">Harga Undangan</label>
                    <input type="number" name="harga_undangan" class="form-control" id="harga_undangan"
                        placeholder="Masukkan harga undangan..." value="<?= $row['harga_undangan'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="jenis_undangan">Jenis Undangan</label>
                    <input type="text" name="jenis_undangan" class="form-control" id="jenis_undangan"
                        placeholder="Masukkan jenis undangan..." value="<?= $row['jenis_undangan'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi_undangan">Deskripsi Undangan</label>
                    <textarea name="deskripsi_undangan" class="form-control" id="deskripsi_undangan"
                        placeholder="Masukkan deskripsi undangan..."
                        required><?= $row['deskripsi_undangan'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="detail_undangan">Detail Undangan</label>
                    <textarea name="detail_undangan" class="form-control" id="detail_undangan"
                        placeholder="Masukkan detail undangan..." required><?= $row['detail_undangan'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="id_image">ID Image (Opsional)</label>
                    <input type="text" name="id_image" class="form-control" id="id_image"
                        placeholder="Masukkan ID image jika ada..." value="<?= $row['id_image'] ?>">
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