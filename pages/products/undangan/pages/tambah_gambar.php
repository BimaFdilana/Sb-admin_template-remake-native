<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-12">
            <h1 class="h3 mb-2 text-gray-800">Product <i class="fas fa-angle-right"></i> Add Gambar Undangan</h1>
        </div>
    </div>
    <p class="mb-4">Fill in the form below to create a new product. Ensure that all required fields are completed accurately. For more details or assistance, please refer to the user guide.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Gambar</h6>
        </div>
        <form method="post" action="pages/products/undangan/proses/proses_tambah_gambar.php" enctype="multipart/form-data">
            <div class="card-body">
                <!-- Nama Undangan -->
                <div class="form-group">
                    <label for="nama_image">Nama Gambar</label>
                    <input type="text" name="nama_image" class="form-control" id="nama_image" placeholder="Masukkan nama gambar" required>
                </div>
                <!-- Masukkan Image (Maksimal 3 gambar) -->
                <div class="form-group">
                    <label for="image">Masukkan Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image" multiple required>
                        <label class="custom-file-label" for="image">Pilih file...</label>
                    </div>
                </div>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
