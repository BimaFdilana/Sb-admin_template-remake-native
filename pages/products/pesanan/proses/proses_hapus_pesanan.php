<?php
include("../../../../conf/db_conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $query = "SELECT * FROM tb_pesanan WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];

        $query = "DELETE FROM tb_pesanan WHERE id='$id'";
        $deleteResult = mysqli_query($conn, $query);

        if ($deleteResult) {
            echo "<script>alert('Berhasil menghapus data $id.');</script>";
        } else {
            echo "<script>alert('Gagal menghapus data $id, terjadi kesalahan.');</script>";
        }
    } else {
        echo "<script>alert('Gagal menghapus, data tidak ditemukan.');</script>";
    }
    echo "<script>window.location = '../../../../index_admin.php?page=listPesanan';</script>";
}
?>