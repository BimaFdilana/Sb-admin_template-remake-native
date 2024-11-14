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
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <title>Pemesanan Sukses</title>
    <style>
    .success-icon {
        font-size: 80px;
        color: #28a745;
        margin-bottom: 20px;
    }

    .container {
        margin-top: 100px;
    }
    </style>
</head>

<body>
    <div class="container text-center">
        <!-- Ikon sukses -->
        <i class="ri-check-circle-line success-icon"></i>

        <!-- Pesan sukses -->
        <h3>Pemesanan Berhasil!</h3>
        <p>Terima kasih telah memesan! Pesanan Anda sedang diproses dan akan segera kami kirimkan.</p>

        <!-- Tombol OK -->

        <form method="POST">
            <input type="hidden" name="remove_item" value="<?= $item['id']; ?>">
            <a href="../index.php" class="btn btn-success">Lanjutkan</a>
        </form>
    </div>

    <!-- Sertakan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>