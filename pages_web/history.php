<?php
// Mulai sesi untuk mengakses session variables
session_start();

// Koneksi ke database
require("conf/db_conn.php");

// Fungsi untuk memformat angka menjadi format mata uang
function format_currency($amount) {
    return "Rp " . number_format($amount, 0, ',', '.');
}

// Ambil ID pengguna dari session
$user_id = $_SESSION['id'];

// Query untuk mengambil data pesanan terbaru berdasarkan ID pengguna
$query_latest = "SELECT 
        p.id AS order_id,
        p.user_id AS order_user_id,
        p.total AS order_total,
        p.items AS order_items,
        p.status AS order_status,
        p.created_at AS order_created_at,
        p.nomor_resi AS order_resi,  -- Menambahkan nomor resi
        u.username AS user_username
    FROM 
        tb_pesanan p
    LEFT JOIN 
        tb_user u ON p.user_id = u.id
    WHERE 
        p.user_id = '$user_id'
    ORDER BY p.created_at DESC
    LIMIT 1"; // Mengambil pesanan terakhir

// Query untuk mengambil riwayat pesanan sebelumnya
$query_history = "SELECT 
        p.id AS order_id,
        p.user_id AS order_user_id,
        p.total AS order_total,
        p.items AS order_items,
        p.status AS order_status,
        p.created_at AS order_created_at,
        p.nomor_resi AS order_resi,  -- Menambahkan nomor resi
        u.username AS user_username
    FROM 
        tb_pesanan p
    LEFT JOIN 
        tb_user u ON p.user_id = u.id
    WHERE 
        p.user_id = '$user_id'
    ORDER BY p.created_at DESC
    LIMIT 10 OFFSET 1"; // Mengambil riwayat pesanan sebelumnya (tidak termasuk yang terakhir)
 // Mengambil riwayat pesanan sebelumnya (tidak termasuk yang terakhir)

// Menjalankan query
$latest_order = mysqli_query($conn, $query_latest);
$history_orders = mysqli_query($conn, $query_history);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Pesanan</title>

    <!-- Link Bootstrap CDN -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Icon Library -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <section class="section__container feature__container" id="feature">
            <p class="section__subheader">History Pemesanan</p>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="feature__card">
                        <span><i class="ri-error-warning-line"></i></span>
                        <h4>Panding</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature__card">
                        <span><i class="ri-truck-line"></i></span>
                        <h4>Delivery</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature__card">
                        <span><i class="ri-checkbox-circle-line"></i></span>
                        <h4>Success</h4>
                    </div>
                </div>
            </div>
        </section>

        <!-- Table for Latest Order -->
        <h3>Pesanan Terbaru</h3>
        <?php if (mysqli_num_rows($latest_order) > 0): ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Items</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Nomor Resi</th> <!-- Menambahkan kolom nomor resi -->
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($latest_order)): ?>
                <tr>
                    <td>
                        <?php
                        // Menguraikan data JSON items
                        $items = json_decode($row['order_items'], true); 
                        foreach ($items as $item) {
                            echo "<strong>" . htmlspecialchars($item['name']) . "</strong> x " . htmlspecialchars($item['quantity']) . "<br>";
                        }
                        ?>
                    </td>
                    <td><?php echo format_currency($row['order_total']); ?></td>
                    <td><?php echo $row['order_status']; ?></td>
                    <td>
                        <?php 
                            // Cek apakah nomor resi kosong atau NULL
                            echo !empty($row['order_resi']) ? htmlspecialchars($row['order_resi']) : "Nomor Resi Belum Dimasukkan"; 
                        ?>
                    </td> <!-- Menampilkan nomor resi atau pesan jika kosong -->
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>Belum ada pesanan terbaru.</p>
        <?php endif; ?>

        <!-- Table for Previous Orders -->
        <h4>Riwayat Pesanan</h4>
        <?php if (mysqli_num_rows($history_orders) > 0): ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Items</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Tanggal Dibuat</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($history_orders)): ?>
                <tr>
                    <td>
                        <?php
                        // Menguraikan data JSON items
                        $items = json_decode($row['order_items'], true); 
                        foreach ($items as $item) {
                            echo "" . htmlspecialchars($item['name']) . " x " . htmlspecialchars($item['quantity']) . "<br>";
                        }
                        ?>
                    </td>
                    <td><?php echo format_currency($row['order_total']); ?></td>
                    <td><?php echo $row['order_status']; ?></td>
                    <td><?php echo $row['order_created_at']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>Belum ada riwayat pesanan.</p>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS (optional for interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>