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
        p.nomor_resi AS order_resi,
        u.username AS user_username
    FROM 
        tb_pesanan p
    LEFT JOIN 
        tb_user u ON p.user_id = u.id
    ORDER BY p.created_at DESC";  // Mengurutkan berdasarkan created_at DESC (dari yang terbaru ke terlama)

$daftar_pesanan = mysqli_query($conn, $query);
?>

<div class="container-fluid">
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
            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editOrderModal"
                data-id="<?= $row['order_id']; ?>" data-status="<?= $row['order_status']; ?>"
                data-nomor-resi="<?= $row['order_resi']; ?>">
                <i class="fas fa-edit"> Update Resi & Proses Pengiriman</i>
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>OrderID</th>
                            <th>Username</th>
                            <th>Total</th>
                            <th>Items</th>
                            <th>Status</th>
                            <th>Nomor Resi</th>
                            <th>Created At</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($daftar_pesanan)) : ?>
                        <tr>
                            <!-- Order ID -->
                            <td style="text-align: center;"><strong><?= $row['order_id']; ?></strong></td>
                            <!-- Nama Baru -->
                            <td><?= $row['user_username']; ?></td>
                            <td>Rp <?= number_format($row['order_total'], 0, ',', '.'); ?></td>
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
                            <td><?= $row['order_resi']; ?></td>
                            <td><?= $row['order_created_at']; ?></td>
                            <td style="text-align: center; white-space: nowrap;">
                                <!-- Delete Order -->
                                <a href="pages/products/pesanan/proses/proses_hapus_pesanan.php?id=<?= $row['order_id']; ?>"
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

<!-- Modal untuk Edit Order -->
<div class="modal fade" id="editOrderModal" tabindex="-1" role="dialog" aria-labelledby="editOrderModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="editOrderForm" method="post" action="pages/products/pesanan/proses/proses_ubah_pesanan.php">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOrderModalLabel">Edit Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="OrderId">OrderID</label>
                        <input type="text" name="id" class="form-control" id="orderId" placeholder="Masukan OrderID">
                    </div>
                    <div class="form-group">
                        <label for="orderStatus">Status</label>
                        <select name="status" id="orderStatus" class="form-control">
                            <option value="Pending">Pending</option>
                            <option value="Delivery">Delivery</option>
                            <option value="Success">Success</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="orderResi">Nomor Resi</label>
                        <input type="text" name="nomor_resi" id="orderResi" class="form-control"
                            placeholder="Enter Tracking Number">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
// Menangani data untuk modal
$('#editOrderModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var orderId = button.data('id');
    var orderStatus = button.data('status');
    var orderResi = button.data('nomor-resi');

    var modal = $(this);
    modal.find('#orderId').val(orderId);
    modal.find('#orderStatus').val(orderStatus);
    modal.find('#orderResi').val(orderResi);
});
</script>