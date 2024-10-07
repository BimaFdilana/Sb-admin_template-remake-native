<?php
include("../../conf/db_conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    $query = "SELECT * FROM tb_user WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $username = $row['username'];

        $query = "DELETE FROM tb_user WHERE id='$id'";
        $deleteResult = mysqli_query($conn, $query);

        if ($deleteResult) {
            echo "<script>alert('Berhasil menghapus data $username.');</script>";
        } else {
            echo "<script>alert('Gagal menghapus data $username, terjadi kesalahan.');</script>";
        }
    } else {
        echo "<script>alert('Gagal menghapus, data tidak ditemukan.');</script>";
    }
    echo "<script>window.location = '../../index.php?page=data_user';</script>";
}
?>


