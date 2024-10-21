<?php
require("conf/db_conn.php");
$query = "SELECT * FROM tb_user";
$daftar_user = mysqli_query($conn, $query);
?> 
 
 
<div class="container-fluid">

<!-- Page Heading -->
<div class="row mb-2">
  <div class="col-sm-12">
    <h1 class="h3 mb-2 text-gray-800">Admin <i class="fas fa-angle-right"></i> List Account</h1>
  </div>
</div>
<p class="mb-4">The list of registered accounts is displayed below. Use the search or filter options to find the account you're looking for. For more details, click on the relevant account. official DataTables documentation</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Account</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor HP</th>
                            <th>Jabatan</th>
                            <th style="text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        <?php foreach($daftar_user as $row) : ?>
                        <tr>
                            <td style="text-align: center"><?= $no = $no + 1; ?></td>
                            <td><?=$row['username'];?></td>
                            <td><?=$row['email'];?></td>
                            <td><?= $row['no_hp']; ?></td>
                            <td><?=$row['role'];?></td>
                            <td style="text-align: center; white-space: nowrap;">
                                <!-- Edit User -->
                                <a href="index_admin.php?page=ubah_user&id=<?=$row['id'];?>" class="btn btn-success btn-sm" role="button" title="Ubah Data User">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- Delete User -->
                                <a href="pages/admin/proses/proses_hapus_user.php?id=<?=$row['id'];?>" class="btn btn-danger btn-sm" role="button" title="Hapus Data User" onclick="return confirm('Apakah anda yakin?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->