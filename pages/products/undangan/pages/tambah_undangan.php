<?php 
require("conf/db_conn.php"); // Memastikan file hanya dimasukkan sekali
$query_image = "SELECT id_image, nama_image FROM tb_image";
$daftar_image = mysqli_query($conn, $query_image);
?>


<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-12">
            <h1 class="h3 mb-2 text-gray-800">Admin <i class="fas fa-angle-right"></i> Add Product Undangan</h1>
        </div>
    </div>
    <p class="mb-4">Fill in the form below to create a new product. Ensure that all required fields are completed accurately. For more details or assistance, please refer to the user guide.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Product Undangan</h6>
        </div>
        <form method="post" action="pages/products/undangan/proses/proses_tambah_undangan.php">
            <div class="card-body">
                <!-- Nama Undangan -->
                <div class="form-group">
                    <label for="nama_undangan">Nama Undangan</label>
                    <input type="text" name="nama_undangan" class="form-control" id="nama_undangan" placeholder="Masukkan nama undangan..." required>
                </div>

                <!-- Jumlah Undangan -->
                <div class="form-group">
                    <label for="jumlah_undangan">Jumlah Undangan</label>
                    <input type="number" name="jumlah_undangan" class="form-control" id="jumlah_undangan" placeholder="Masukkan jumlah undangan..." required>
                </div>

                <!-- Harga Undangan -->
                <div class="form-group">
                    <label for="harga_undangan">Harga Undangan</label>
                    <input type="number" name="harga_undangan" class="form-control" id="harga_undangan" placeholder="Masukkan harga undangan..." required>
                </div>

                <!-- Jenis Undangan -->
                <div class="form-group">
                    <label for="jenis_undangan">Jenis Undangan</label>
                    <input type="text" name="jenis_undangan" class="form-control" id="jenis_undangan" placeholder="Masukkan jenis undangan..." required>
                </div>

                <!-- Deskripsi Undangan -->
                <div class="form-group">
                    <label for="deskripsi_undangan">Deskripsi Undangan</label>
                    <textarea name="deskripsi_undangan" class="form-control" id="deskripsi_undangan" placeholder="Masukkan deskripsi undangan..." required></textarea>
                </div>

                <!-- Detail Undangan -->
                <div class="form-group">
                    <label for="detail_undangan">Detail Undangan</label>
                    <textarea name="detail_undangan" class="form-control" id="detail_undangan" placeholder="Masukkan detail undangan..." required></textarea>
                </div>

                <div class="form-group">
                    <label for="id_image">Gambar</label>
                    <select name="id_image" class="form-control" id="id_image">
                    <option value="">Pilih Gambar...</option>
                    <?php while($row = mysqli_fetch_assoc($daftar_image)): ?>
                        <option value="<?= $row['id_image']; ?>"><?= $row['nama_image']; ?></option>
                    <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
