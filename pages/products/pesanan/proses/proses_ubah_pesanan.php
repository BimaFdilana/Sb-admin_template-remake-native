<?php
require("../../../../conf/db_conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $nomor_resi = $_POST['nomor_resi'];

    // Debug data yang diterima
    var_dump($id, $status, $nomor_resi);

    // Validasi status
    $valid_statuses = ['Pending', 'Delivery', 'Success'];
    if (!in_array($status, $valid_statuses)) {
        die('Status tidak valid.');
    }

    // Periksa apakah ID ada di database
    $query_check = "SELECT * FROM tb_pesanan WHERE id = '$id'";
    $result_check = mysqli_query($conn, $query_check);
    if (mysqli_num_rows($result_check) == 0) {
        echo "<script>alert('ID pesanan tidak valid.');</script>";
        exit;
    }

    // Update status dan nomor resi
    $query = "UPDATE tb_pesanan SET status = '$status', nomor_resi = '$nomor_resi' WHERE id = '$id'";
    echo $query;  // Debug query
    $updateResult = mysqli_query($conn, $query);

    if ($updateResult && mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('Pesanan berhasil diperbarui.');</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat memperbarui pesanan.');</script>";
        echo "Error: " . mysqli_error($conn);  // Menampilkan error MySQL
    }

    echo "<script>window.location = '../../../../index_admin.php?page=listPesanan';</script>";
}
?>