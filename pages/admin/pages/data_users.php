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

<!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr >
                            <th style="text-align: center;">No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Nomor Hp</th>
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
                            <td><?=$row['no_hp'];?></td>
                            <td style="text-align: center; white-space: nowrap;">
                                <!-- Edit User -->
                                <a href="index.php?page=ubah_user&id=<?=$row['id'];?>" class="btn btn-success btn-sm" role="button" title="Ubah Data User">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- Delete User -->
                                <a href="index.php?page=proses_hapus_user&id=<?=$row['id'];?>" class="btn btn-danger btn-sm" role="button" title="Ubah Data User">
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