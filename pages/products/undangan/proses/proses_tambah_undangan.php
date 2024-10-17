<?php
include_once('../../../../conf/db_conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_undangan = $_POST['nama_undangan'];
    $jumlah_undangan = $_POST['jumlah_undangan'];
    $harga_undangan = $_POST['harga_undangan'];
    $jenis_undangan = $_POST['jenis_undangan'];
    $deskripsi_undangan = $_POST['deskripsi_undangan'];
    $detail_undangan = $_POST['detail_undangan'];
    $id_image = $_POST['id_image'];

    $query = "INSERT INTO tb_undangan SET
        nama_undangan = '$nama_undangan',
        jumlah_undangan = '$jumlah_undangan',
        harga_undangan = '$harga_undangan',
        jenis_undangan = '$jenis_undangan',
        deskripsi_undangan = '$deskripsi_undangan',
        detail_undangan = '$detail_undangan',
        id_image = '$id_image'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Berhasil menambahkan data $nama_undangan!');</script>";
        echo "<script>window.location = '../../../../index.php?page=listUndangan';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan data $nama_undangan, coba cek isian anda!');</script>";
        echo "<script>window.location = '../../../../index.php?page=tambahUndangan';</script>";
    }
}
?>
