<?php
// Menampilkan error jika ada
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Menghubungkan ke database
include_once '../../../../conf/db_conn.php'; // Pastikan file ini berisi koneksi database yang benar

// Mengecek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $id_undangan = $_POST['id_undangan'];
    $nama_undangan = $_POST['nama_undangan'];
    $jumlah_undangan = $_POST['jumlah_undangan'];
    $harga_undangan = $_POST['harga_undangan'];
    $jenis_undangan = $_POST['jenis_undangan'];
    $deskripsi_undangan = $_POST['deskripsi_undangan'];
    $detail_undangan = $_POST['detail_undangan'];
    $id_image = $_POST['id_image'];

    // Jika id_image berisi "null", set nilai $id_image ke NULL
    $id_image = ($id_image === "null" || $id_image === "") ? null : $id_image;

    // Query untuk mengupdate data
    $query = "UPDATE tb_undangan 
              SET nama_undangan = ?, jumlah_undangan = ?, harga_undangan = ?, 
                  jenis_undangan = ?, deskripsi_undangan = ?, detail_undangan = ?, id_image = ? 
              WHERE id_undangan = ?";

    // Menggunakan prepared statement untuk mencegah SQL Injection
    $stmt = $conn->prepare($query);

    // Jika id_image adalah NULL, gunakan tipe data integer dalam bind_param
    if (is_null($id_image)) {
        $stmt->bind_param(
            'sidssssi',
            $nama_undangan,
            $jumlah_undangan,
            $harga_undangan,
            $jenis_undangan,
            $deskripsi_undangan,
            $detail_undangan,
            $id_image, // NULL akan diterjemahkan otomatis
            $id_undangan
        );
    } else {
        $stmt->bind_param(
            'sidssssi',
            $nama_undangan,
            $jumlah_undangan,
            $harga_undangan,
            $jenis_undangan,
            $deskripsi_undangan,
            $detail_undangan,
            $id_image,
            $id_undangan
        );
    }

    // Eksekusi query
    if ($stmt->execute()) {
        echo "<script>alert('Berhasil Memperbaruhi Data Undangan!');</script>";
        echo "<script>window.location = '../../../../index_admin.php?page=listUndangan';</script>"; // Ganti dengan halaman yang diinginkan
        exit;
    } else {
        echo "Gagal memperbarui data: " . $stmt->error;
    }

    // Menutup statement
    $stmt->close();
}

// Menutup koneksi
$conn->close();
?>