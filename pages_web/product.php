<?php
require("conf/db_conn.php");

// Query untuk mengambil data undangan, menambahkan LIMIT 3 untuk hanya mengambil 3 data
$query = "SELECT u.id_undangan, u.nama_undangan, u.jumlah_undangan, u.harga_undangan, u.jenis_undangan, u.deskripsi_undangan, u.detail_undangan, i.image
          FROM tb_undangan u
          LEFT JOIN tb_image i ON u.id_image = i.id_image";  // Hanya mengambil 3 data
$list_data_undangan = mysqli_query($conn, $query);
?>

<section class="menu" id="menu">
    <div class="section__container menu__container">
        <div class="menu__header">
            <div>
                <p class="section__subheader">PRODUCT</p>
            </div>
            <div>
                <h2 class="section__header"></h2>
            </div>
            <div class="section__nav">
                <span><i class="ri-arrow-left-line"></i></span>
                <span><i class="ri-arrow-right-line"></i></span>
            </div>
        </div>
        <div class="menu__images">
            <img src="image/assets/gambar1.jpg" alt="menu" />
            <img src="image/assets/gambar2.jpg" alt="menu" />
            <img src="image/assets/gambar4.jpg" alt="menu" />
        </div>
    </div>
</section>


<section class="room__container" id="room">
    <h2 class="section__header">Undangan Digital & VR</h2>
    <div class="room__grid">
        <?php foreach ($list_data_undangan as $row) : ?>
        <div class="room__card">
            <div class="room__card__image">
                <?php $gambar = $row["image"];
                if ($gambar == null) {
                    echo "<img src='image/avatar/default-150x150.png'/>";
                } else {
                    echo "<img src='image/product_image/$gambar' />";
                }
                ?>
            </div>
            <div class="room__card__details">
                <h4><?= $row["nama_undangan"]; ?></h4>
                <h3><?= $row["harga_undangan"]; ?></h3>
                <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#exampleModal-<?= $row["id_undangan"]; ?>">
                    Beli
                </button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php foreach ($list_data_undangan as $row) : ?>
    <div class="modal fade" id="exampleModal-<?= $row["id_undangan"]; ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: black;" id="exampleModalLongTitle">Detail Product</h5>
                </div>
                <div class="modal-body">
                    <div class="col-12 mb-2 text-center">
                        <?php $gambar = $row["image"];
                    if ($gambar == null) {
                        echo "<img src='image/avatar/default-150x150.png'/>";
                    } else {
                        echo "<img src='image/product_image/$gambar' />";
                    }
                    ?>
                    </div>
                    <!-- Nama Undangan dalam <h1> -->
                    <h1 style="font-weight: bold; color: black;"><?= $row["nama_undangan"]; ?></h1>
                    <!-- Jumlah berada di samping nama, dengan warna abu-abu tua dan container kuning -->

                    <div class="col-sm-5 col-6" style="color: black;">
                        Stok: <?= $row["jumlah_undangan"]; ?>
                    </div>
                    <div class="w-100 d-none d-md-block"></div>
                    <!-- Jenis Undangan diubah menjadi "Jenis Undangan:" -->
                    <div class="col-sm-5 col-6" style="color: black;"><strong>Jenis Undangan:</strong>
                        <?= $row["jenis_undangan"]; ?></div>
                    <div class="w-100 d-none d-md-block"></div>

                    <!-- Harga dipindahkan di bawah nama undangan dengan <h2> dan format uang, ditambah /PCS -->
                    <h2 style="font-weight: bold; color: black;">
                        <?= "Rp " . number_format($row["harga_undangan"], 0, ',', '.'); ?> /PCS
                    </h2>
                    <div class="w-100 d-none d-md-block"></div>

                    <!-- Detail diubah menjadi "Detail:" -->
                    <div class="col-sm-5 col-6" style="color: black;"><strong>Detail:</strong>
                        <?= $row["detail_undangan"]; ?></div>
                    <div class="w-100 d-none d-md-block"></div>

                    <!-- Deskripsi diubah menjadi "Deskripsi:" -->
                    <div class="col-sm-5 col-6" style="color: black;"><strong>Deskripsi:</strong>
                        <?= $row["deskripsi_undangan"]; ?></div>
                    <div class="w-100 d-none d-md-block"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Beli</button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

</section>