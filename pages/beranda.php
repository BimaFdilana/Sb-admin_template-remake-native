<?php
require("conf/db_conn.php");
$query = "SELECT * FROM tb_undangan";
$list_undangan = mysqli_query($conn, $query);
$jumlah_undangan = mysqli_num_rows($list_undangan);

$query = "SELECT * FROM tb_user";
$list_user = mysqli_query($conn, $query);
$jumlah_user = mysqli_num_rows($list_user);

$query = "SELECT * FROM tb_image";
$list_gambar = mysqli_query($conn, $query);
$jumlah_gambar = mysqli_num_rows($list_gambar);

// $query = "SELECT * FROM tb_pesanan";
// $list_gambar = mysqli_query($conn, $query);
// $jumlah_gambar = mysqli_num_rows($list_gambar);
?> 

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Card Example 1 -->
    <div class="col-md-5 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1" style="font-size: 18px;">List User</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 30px;">
                            <?php echo $jumlah_user; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Example 2 -->
    <div class="col-md-5 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size: 18px;">List Product</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 30px;">
                            <?php echo $jumlah_undangan; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-folder fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Example 3 -->
    <div class="col-md-5 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1" style="font-size: 18px;">List Gambar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 30px;">
                            <?php echo $jumlah_undangan; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-image fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-5 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1" style="font-size: 18px;">List Pesanan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800" style="font-size: 30px;">
                            <?php echo $jumlah_gambar; ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-store fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
