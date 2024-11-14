<?php
session_start();

// Periksa apakah permintaan POST untuk menghapus atau memperbarui kuantitas item di keranjang
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Hapus item dari keranjang berdasarkan ID produk
    if (isset($_POST['remove_item'])) {
        $remove_id = $_POST['remove_item'];
        
        foreach ($_SESSION['cart'] as $index => $item) {
            if ($item['id'] == $remove_id) {
                unset($_SESSION['cart'][$index]);
                break;
            }
        }
        
        // Reindex array setelah penghapusan
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        
        // Simpan pesan keberhasilan dalam sesi
        $_SESSION['cart_success_message'] = "Produk berhasil dihapus dari keranjang!";
        
        // Muat ulang halaman
        header("Location: " . $_SERVER['REQUEST_URI']); // Kembali ke halaman yang sama
        exit();
    }


    // Mengupdate kuantitas item di keranjang
    if (isset($_POST['update_item'])) {
        $update_id = $_POST['update_item'];
        $action = $_POST['action'];
        
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $update_id) {
                if ($action == 'increase') {
                    $item['quantity']++;
                } elseif ($action == 'decrease' && $item['quantity'] > 1) {
                    $item['quantity']--;
                } elseif (isset($_POST['quantity'])) {
                    // Update kuantitas langsung dari input
                    $item['quantity'] = $_POST['quantity'];
                }
                break;
            }
        }
    }
}
?>


<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="assets/css/styles.css" /> -->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <title>BaleeKun-Digital</title>
</head>

<body>
    <?php if (isset($_SESSION['cart_success_message'])): ?>
    <script>
    alert("<?= $_SESSION['cart_success_message']; ?>");
    </script>
    <?php unset($_SESSION['cart_success_message']); // Hapus pesan setelah ditampilkan ?>
    <?php endif; ?>

    <br>
    <section class="about" id="about">
        <div class="section__container about__container">
            <div class="about__content">
                <!-- Judul dengan Ikon Keranjang -->
                <h4 style="display: flex; align-items: center;">
                    <i class="ri-shopping-cart-fill" style="font-size: 30px; margin-right: 10px;"></i>
                    KERANJANG
                </h4>
                <?php if (empty($_SESSION['cart'])): ?>
                <p style="color: black;">Keranjang Anda kosong.</p>
                <?php else: ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
            $total = 0;
            foreach ($_SESSION['cart'] as $item): 
                $item_total = $item['price'] * $item['quantity'];
                $total += $item_total;
            ?>
                        <tr>
                            <td><?= htmlspecialchars($item['name']); ?></td>
                            <td>Rp <?= number_format($item['price'], 0, ',', '.'); ?></td>
                            <td>
                                <div style="display: flex; align-items: center;">
                                    <!-- Tombol Kurang -->
                                    <form method="POST" style="display: inline;">
                                        <input type="hidden" name="update_item" value="<?= $item['id']; ?>">
                                        <input type="hidden" name="action" value="decrease">
                                        <button type="submit" class="btn btn-secondary"
                                            style="font-size: 18px;">-</button>
                                    </form>

                                    <!-- Input Kuantitas -->
                                    <form method="POST" style="display: inline;">
                                        <input type="hidden" name="update_item" value="<?= $item['id']; ?>">
                                        <input type="text" name="quantity" value="<?= $item['quantity']; ?>" min="1"
                                            class="form-control quantity-input" style="width: 70px; margin: 0 10px;"
                                            data-item-id="<?= $item['id']; ?>">
                                    </form>


                                    <!-- Tombol Tambah -->
                                    <form method="POST" style="display: inline;">
                                        <input type="hidden" name="update_item" value="<?= $item['id']; ?>">
                                        <input type="hidden" name="action" value="increase">
                                        <button type="submit" class="btn btn-secondary"
                                            style="font-size: 18px;">+</button>
                                    </form>
                                </div>
                            </td>

                            <td>
                                <!-- Hapus item dari keranjang -->
                                <form method="POST">
                                    <input type="hidden" name="remove_item" value="<?= $item['id']; ?>">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Tampilkan Total Harga -->
                <div style="font-size: 18px; margin-top: 20px; text-align: right; color: black;">
                    <strong>Total: Rp <?= number_format($total, 0, ',', '.'); ?></strong>
                </div>

                <!-- Form untuk Lanjut ke Pembayaran -->
                <form action="pages_web/proses/proses_pembayaran.php" method="POST">
                    <input type="hidden" name="total" value="<?= $total; ?>">
                    <input type="hidden" name="user_id" value="<?= $_SESSION['id']; ?>">
                    <input type="hidden" name="items" value="<?= htmlspecialchars(json_encode($_SESSION['cart'])); ?>">

                    <button type="submit" class="btn btn-primary">Lanjut ke Pembayaran</button>
                </form>

                <?php endif; ?>
            </div>

            <div class="about__image">
                <img src="image/assets/gambar4.jpg" alt="about" />
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- Sertakan jQuery terlebih dahulu -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    // Fungsi untuk menghitung harga total berdasarkan kuantitas
    function updateTotalPrice(inputElement) {
        // Ambil ID item dan harga dari elemen yang ada
        var itemId = inputElement.getAttribute("data-item-id");
        var price = parseFloat(document.getElementById("price-" + itemId).textContent.replace('Rp ', '').replace(',',
            '.'));
        var quantity = parseInt(inputElement.value);

        // Hitung harga total
        var totalPrice = price * quantity;

        // Update elemen harga total yang sesuai
        document.getElementById("total-" + itemId).textContent = "Rp " + totalPrice.toLocaleString('id-ID');
    }

    // Tambahkan event listener pada input kuantitas
    document.querySelectorAll('.quantity-input').forEach(function(input) {
        input.addEventListener('input', function() {
            updateTotalPrice(this);
        });
    });
    </script>


    <!-- Sertakan Bootstrap JS setelah jQuery -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>