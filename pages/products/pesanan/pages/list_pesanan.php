<?php
require("conf/db_conn.php");

// Query untuk mengambil data pesanan dengan menggabungkan dengan data user
$query = "SELECT 
        p.id AS order_id,
        p.user_id AS order_user_id,
        p.total AS order_total,
        p.items AS order_items,
        p.status AS order_status,
        p.created_at AS order_created_at,
        u.username AS user_username
    FROM 
        tb_pesanan p
    LEFT JOIN 
        tb_user u ON p.user_id = u.id
";

// Menjalankan query
$daftar_pesanan = mysqli_query($conn, $query);
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row mb-2">
        <div class="col-sm-12">
            <h1 class="h3 mb-2 text-gray-800">Admin <i class="fas fa-angle-right"></i> List Orders</h1>
        </div>
    </div>
    <p class="mb-4">The list of all orders is displayed below. Use the search or filter options to find the order you're
        looking for. For more details, click on the relevant order.</p>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Orders</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th>Order ID</th>
                            <th>Username</th>
                            <th>Total</th>
                            <th>Items</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        <?php while ($row = mysqli_fetch_assoc($daftar_pesanan)) : ?>
                        <tr>
                            <td style="text-align: center"><?= ++$no; ?></td>
                            <td><?= $row['order_id']; ?></td>
                            <td><?= $row['user_username']; ?></td>
                            <td>Rp <?= number_format($row['order_total'], 0, ',', '.'); ?></td>
                            <!-- Mengubah JSON Items ke Format Lebih Rapi -->
                            <td>
                                <?php
                                    $items = json_decode($row['order_items'], true);
                                    if ($items && is_array($items)) {
                                        echo "<table class='table table-sm' style='margin: 0;'>";
                                        echo "<tr><th>Nama</th><th>Harga</th><th>Jumlah</th></tr>";
                                        foreach ($items as $item) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($item['name']) . "</td>";
                                            echo "<td>Rp " . number_format($item['price'], 0, ',', '.') . "</td>";
                                            echo "<td>" . $item['quantity'] . "</td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                    } else {
                                        echo "Tidak ada item.";
                                    }
                                ?>
                            </td>
                            <td><?= $row['order_status']; ?></td>
                            <td><?= $row['order_created_at']; ?></td>
                            <td style="text-align: center; white-space: nowrap;">
                                <!-- Edit Order -->
                                <a href="index_admin.php?page=ubah_order&id=<?= $row['order_id']; ?>"
                                    class="btn btn-success btn-sm" role="button" title="Edit Order">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- Delete Order -->
                                <a href="pages/admin/proses/proses_hapus_order.php?id=<?= $row['order_id']; ?>"
                                    class="btn btn-danger btn-sm" role="button" title="Delete Order"
                                    onclick="return confirm('Are you sure you want to delete this order?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->