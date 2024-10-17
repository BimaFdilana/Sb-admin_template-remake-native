<?php 
require("conf/db_conn.php"); // Memastikan file hanya dimasukkan sekali
$query_undangan = "SELECT id, nama_detail FROM db_detail";
$listUndangan = mysqli_query($conn, $query_undangan);
?>


<div class="container-fluid">
<div class="row mb-2">
  <div class="col-sm-12">
    <h1 class="h3 mb-2 text-gray-800">Admin <i class="fas fa-angle-right"></i> Add Product Undangan</h1>
  </div>
</div>
<p class="mb-4">Fill in the form below to create a new account. Ensure that all required fields are completed accurately. For more details or assistance, please refer to the user guide.
        official DataTables documentation</p>

        <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Product Undangan</h6>
    </div>
    <form method="post" action="pages/products/undangan/proses/proses_tambah_undangan.php" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="nama_undangan">Nama Undangan</label>
                <input type="text" name="nama_undangan" class="form-control" id="nama_undangan" placeholder="Masukkan nama undangan...">
            </div>
            <div class="form-group">
                <label for="jumlah_undangan">Jumlah Undangan</label>
                <input name="jumlah_undangan" class="form-control" id="jumlah_undangan" placeholder="Masukkan jumlah undangan...">
            </div>
            <div class="form-group">
                <label for="harga_undangan">Harga Undangan</label>
                <input type="number" name="harga_undangan" class="form-control" id="harga_undangan" placeholder="Masukkan harga undangan...">
            </div>
            <div class="form-group">
                <label for="jenis_undangan">Jenis Undangan</label>
                <input name="jenis_undangan" class="form-control" id="jenis_undangan" placeholder="Masukkan jenis undangan...">
            </div>
            <div class="form-group">
                <label for="id_detail">Detail Product</label>
                    <select name="id_detail" class="form-control" id="id_detail">
                    <option value="">Pilih product...</option>
                        <?php while($row = mysqli_fetch_assoc($listUndangan)): ?>
                    <option value="<?= $row['id']; ?>"><?= $row['nama_detail']; ?></option>
                        <?php endwhile; ?>
                    </select>
            </div>
            <div class="form-group">
                <label for="image">Masukkan Image</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="gambar_undangan" name="gambar_undangan" multiple>
                    <label class="custom-file-label" for="image">Pilih file...</label>
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