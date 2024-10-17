<?php
include("../../../../conf/db_conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_undangan = $_GET['id_undangan'];
    $query = "SELECT * FROM tb_undangan WHERE id_undangan = '$id_undangan'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $nama_undangan = $row['nama_undangan'];

        $query = "DELETE FROM tb_undangan WHERE id_undangan='$id_undangan'";
        $deleteResult = mysqli_query($conn, $query);

        if ($deleteResult) {
            echo "<script>alert('Berhasil menghapus data $nama_undangan.');</script>";
        } else {
            echo "<script>alert('Gagal menghapus data $nama_undangan, terjadi kesalahan.');</script>";
        }
    } else {
        echo "<script>alert('Gagal menghapus, data tidak ditemukan.');</script>";
    }
    echo "<script>window.location = '../../../../index.php?page=listUndangan';</script>";
}
?>


