<?php
require("conf/db_conn.php");
$query = "SELECT * FROM tb_user";
$daftar_user = mysqli_query($conn, $query);
?> 
 
 
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

    <div class="row">
      <div class="col-md-6">

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form id="tambahUser" method="post" action="../proses/proses_tambah_user.php">
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
    </div>
</div>
<!-- /.container-fluid -->