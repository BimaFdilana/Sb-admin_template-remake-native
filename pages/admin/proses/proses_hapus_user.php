<?php
// Menyertakan file koneksi database yang diperlukan untuk query ke database.
include("../../../conf/db_conn.php");

// Mengecek apakah metode request yang digunakan adalah 'GET'.
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Mengambil parameter 'id' dari URL untuk menentukan pengguna yang akan dihapus.
    $id = $_GET['id'];

    // Membuat query untuk mengambil data pengguna berdasarkan 'id'.
    $query = "SELECT * FROM tb_user WHERE id = '$id'";

    // Menjalankan query untuk mengambil data dari database.
    $result = mysqli_query($conn, $query);

    // Mengecek apakah query berhasil dijalankan.
    if ($result) {
        // Mengambil hasil query dalam bentuk array.
        $row = mysqli_fetch_array($result);

        // Menyimpan nama pengguna yang akan dihapus dalam variabel $username.
        $username = $row['username'];

        // Membuat query untuk menghapus data pengguna berdasarkan 'id'.
        $query = "DELETE FROM tb_user WHERE id='$id'";

        // Menjalankan query untuk menghapus data pengguna.
        $deleteResult = mysqli_query($conn, $query);

        // Mengecek apakah query penghapusan berhasil dijalankan.
        if ($deleteResult) {
            // Jika berhasil, menampilkan alert bahwa data pengguna telah dihapus.
            echo "<script>alert('Berhasil menghapus data $username.');</script>";
        } else {
            // Jika gagal, menampilkan alert bahwa terjadi kesalahan saat menghapus data.
            echo "<script>alert('Gagal menghapus data $username, terjadi kesalahan.');</script>";
        }
    } else {
        // Jika tidak ada data yang ditemukan untuk 'id' tersebut, menampilkan alert gagal.
        echo "<script>alert('Gagal menghapus, data tidak ditemukan.');</script>";
    }

    // Mengarahkan pengguna kembali ke halaman 'data_user' setelah proses penghapusan selesai.
    echo "<script>window.location = '../../../index_admin.php?page=data_user';</script>";
}
?>