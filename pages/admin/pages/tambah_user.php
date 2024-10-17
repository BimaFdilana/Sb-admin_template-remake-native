 <div class="container-fluid">
<div class="row mb-2">
  <div class="col-sm-12">
    <h1 class="h3 mb-2 text-gray-800">Admin <i class="fas fa-angle-right"></i> Register Account</h1>
  </div>
</div>
<p class="mb-4">Fill in the form below to create a new account. Ensure that all required fields are completed accurately. For more details or assistance, please refer to the user guide.
        official DataTables documentation</p>

        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Register Account</h6>
          </div>
          <form method="post" action="pages/admin/proses/proses_tambah_user.php">
            <div class="card-body">
              <div class="form-group">
                <label for="username">Nama Pengguna</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Masukan nama pengguna...">
              </div>
              <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Masukan email...">
              </div>
              <div class="form-group">
                <label for="no_hp">Nomor Handphone</label>
                <input type="tel" name="no_hp" class="form-control" id="no_hp" placeholder="Masukan nomor handphone...">
              </div>
              <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Masukan kata sandi...">
              </div>
              <div class="form-group">
                <label for="retype_password">Ulangi Kata Sandi</label>
                <input type="password" name="retype_password" class="form-control" id="retype_password" placeholder="Ketik ulang kata sandi...">
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