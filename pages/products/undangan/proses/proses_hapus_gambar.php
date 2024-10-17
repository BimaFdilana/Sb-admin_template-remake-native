<?php
include("../../../../conf/db_conn.php");

const TARGET_DIR = "../../../../image/product_image/";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_image = $_GET['id_image'];
    $query = "SELECT * FROM tb_image WHERE id_image = '$id_image'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $nama_image = $row['nama_image'];
        $target_file = TARGET_DIR . $row['product_image'];

        if (file_exists($target_file)) {
            unlink($target_file);
        }

        $query = "DELETE FROM tb_image WHERE id_image = '$id_image'";
        $deleteResult = mysqli_query($conn, $query);
        if ($deleteResult) {
            echo "<script> alert('Berhasil menghapus data $nama_image.'); </script>";
        } else {
            echo "<script> alert('Gagal menghapus data $nama_image, terjadi kesalahan.'); </script>";
        }
    } else {
        echo "<script> alert('Gagal menghapus, data tidak ditemukan.'); </script>";
    }
    echo "<script> window.location = '../../../../index.php?page=listGambar'; </script>";
}
?>
