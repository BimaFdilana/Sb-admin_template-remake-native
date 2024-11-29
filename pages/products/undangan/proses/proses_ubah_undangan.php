<?php
require('../../../../conf/db_conn.php');  // Pastikan koneksi database sudah benar

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id_undangan = $_POST['id_undangan'];  // ID undangan yang ingin diubah
    $nama_undangan = $_POST['nama_undangan'];
    $jumlah_undangan = $_POST['jumlah_undangan'];
    $harga_undangan = $_POST['harga_undangan'];
    $jenis_undangan = $_POST['jenis_undangan'];
    $deskripsi_undangan = $_POST['deskripsi_undangan'];
    $detail_undangan = $_POST['detail_undangan'];
    $id_image = $_POST['id_image'];  // ID image untuk undangan, bisa kosong jika tidak ada perubahan

    // Query untuk memperbarui data undangan
    $query = "UPDATE tb_undangan SET
              nama_undangan = '$nama_undangan',
              jumlah_undangan = '$jumlah_undangan',
              harga_undangan = '$harga_undangan',
              jenis_undangan = '$jenis_undangan',
              deskripsi_undangan = '$deskripsi_undangan',
              detail_undangan = '$detail_undangan',
              id_image = '$id_image'
              WHERE id_undangan = '$id_undangan'";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Berhasil mengubah data undangan!');</script>";
        echo "<script>window.location = '../../../../index_admin.php?page=data_undangan';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data undangan, coba cek isian anda!');</script>";
        echo "<script>window.location = '../../../../index_admin.php?page=ubah_undangan&id_undangan=$id_undangan';</script>";
    }
}
?>