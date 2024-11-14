<?php
session_start();
require("conf/db_conn.php");

// Inisialisasi keranjang belanja
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Fungsi untuk menambahkan item ke keranjang
function addToCart($item_id, $name, $price, $quantity = 1) {
    $item_found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] === $item_id) {
            $item['quantity'] += $quantity;
            $item_found = true;
            break;
        }
    }

    if (!$item_found) {
        $_SESSION['cart'][] = [
            'id' => $item_id,
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity
        ];
    }
}

// Menambahkan item ke keranjang
if (isset($_POST['add_to_cart'])) {
    $id_undangan = $_POST['id_undangan'];
    $nama_undangan = $_POST['nama_undangan'];
    $harga_undangan = $_POST['harga_undangan'];
    
    addToCart($id_undangan, $nama_undangan, $harga_undangan);
    header("Location: index.php?page=cart"); // Mengarahkan ke halaman keranjang
    exit();
}

// Query untuk mengambil data undangan
$query = "SELECT u.id_undangan, u.nama_undangan, u.jumlah_undangan, u.harga_undangan, u.jenis_undangan, u.deskripsi_undangan, u.detail_undangan, i.image
          FROM tb_undangan u
          LEFT JOIN tb_image i ON u.id_image = i.id_image";
$list_data_undangan = mysqli_query($conn, $query);
?>
<br>

<section class="room__container" id="room">
    <h2 class="section__header">Undangan Digital & VR</h2>
    <div class="room__grid">
        <?php foreach ($list_data_undangan as $row) : ?>
        <div class="room__card">
            <div class="room__card__image">
                <a href="#" data-toggle="modal" data-target="#exampleModal-<?= $row["id_undangan"]; ?>">
                    <?php 
                        $gambar = $row["image"];
                        if ($gambar == null) {
                            echo "<img src='image/avatar/default-150x150.png'/>";
                        } else {
                            echo "<img src='image/product_image/$gambar' />";
                        }
                    ?>
                </a>
            </div>
            <div class="room__card__details">
                <div>
                    <h4><?= $row["nama_undangan"]; ?></h4>
                    <p><?= "Rp " . number_format($row["harga_undangan"], 0, ',', '.'); ?> /Pcs</p>
                </div>

                <form method="POST">
                    <input type="hidden" name="id_undangan" value="<?= $row["id_undangan"]; ?>">
                    <input type="hidden" name="nama_undangan" value="<?= $row["nama_undangan"]; ?>">
                    <input type="hidden" name="harga_undangan" value="<?= $row["harga_undangan"]; ?>">
                    <button type="submit" name="add_to_cart" class="btn btn-danger">Beli</button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>



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
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

</section>