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

if (isset($_POST['add_to_cart'])) {
    $id_undangan = $_POST['id_undangan'];
    $nama_undangan = $_POST['nama_undangan'];
    $harga_undangan = $_POST['harga_undangan'];
    
    // Tambahkan ke keranjang
    addToCart($id_undangan, $nama_undangan, $harga_undangan);
    
    // Simpan pesan keberhasilan dalam sesi
    $_SESSION['cart_success_message'] = "Produk berhasil ditambahkan ke keranjang!";
    
    // Muat ulang halaman
    header("Location: " . $_SERVER['REQUEST_URI']); // Kembali ke halaman yang sama
    exit();
}


// Query untuk mengambil data undangan
$query = "SELECT u.id_undangan, u.nama_undangan, u.jumlah_undangan, u.harga_undangan, u.jenis_undangan, u.deskripsi_undangan, u.detail_undangan, i.image
          FROM tb_undangan u
          LEFT JOIN tb_image i ON u.id_image = i.id_image";
$list_data_undangan = mysqli_query($conn, $query);
?>
<br>

<?php if (isset($_SESSION['cart_success_message'])): ?>
<script>
alert("<?= $_SESSION['cart_success_message']; ?>");
</script>
<?php unset($_SESSION['cart_success_message']); // Hapus pesan setelah ditampilkan ?>
<?php endif; ?>

<style>
.custom-btn {
    width: 45px;
    height: 45px;
    font-size: 18px;
    /* Ukuran ikon */
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 20%;
    /* Membuat tombol bulat */
    transition: transform 0.2s ease, background-color 0.3s ease, border 0.3s ease;
    border: 2px solid transparent;
    /* Border default */
}

.custom-btn i {
    margin: 0;
}

/* Garis tepi berwarna #e69100 pada ikon */
.custom-btn:hover {
    border-color: #A6AEBF;
    /* Garis tepi saat hover */
}



/* Efek saat tombol diklik */
.custom-btn:active {
    transform: scale(0.9);
    /* Efek zoom saat diklik */
    background-color: #A6AEBF;
    /* Mengubah warna latar belakang saat klik */
}
</style>
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
                    <div class="row d-flex justify-content-center" style="gap: 15px;">
                        <!-- Tombol Beli dengan ukuran khusus -->
                        <button type="submit" name="add_to_cart" class="custom-btn">
                            <i class="fas fa-shopping-cart"></i>
                        </button>

                        <!-- Tombol Detail dengan ukuran khusus -->
                        <button type="button" name="view_details" class="custom-btn" data-toggle="modal"
                            data-target="#exampleModal-<?= $row["id_undangan"]; ?>">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
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
                <div class="col-12 mb-3 text-center">
                    <?php $gambar = $row["image"]; ?>
                    <img src="<?= $gambar ? "image/product_image/$gambar" : 'image/avatar/default-150x150.png'; ?>"
                        class="img-fluid rounded mb-2" alt="Gambar Produk" />
                </div>

                <!-- Nama Undangan -->
                <h1 class="text-center font-weight-bold text-dark">
                    <?= $row["nama_undangan"]; ?>
                </h1>

                <!-- Harga Undangan -->
                <h3 class="text-center" style=" color:#4a4a4a;">
                    <?= "Rp " . number_format($row["harga_undangan"], 0, ',', '.'); ?> /Pcs
                </h3>
                <hr><br>
                <!-- Detail Informasi -->
                <div class="container mt-3">
                    <div class="row">
                        <!-- Stok -->
                        <div class="col-6 text-dark">
                            <strong>Stok:</strong> <?= $row["jumlah_undangan"]; ?>
                        </div>

                        <!-- Jenis Undangan -->
                        <div class="col-6 text-dark">
                            <strong>Jenis Undangan:</strong> <?= $row["jenis_undangan"]; ?>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <!-- Detail Undangan -->
                        <div class="col-12 text-dark">
                            <strong>Detail:</strong><br>
                            <?= $row["detail_undangan"]; ?>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <!-- Deskripsi Undangan -->
                        <div class="col-12 text-dark">
                            <strong>Deskripsi:</strong><br> <?= $row["deskripsi_undangan"]; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

</section>