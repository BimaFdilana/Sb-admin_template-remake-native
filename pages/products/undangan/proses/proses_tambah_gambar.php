<?php
include "../../../../conf/db_conn.php";

const TARGET_DIR = "../../../../image/product_image/";
const ALLOWED_EXT = array('png', 'jpg', 'jpeg', 'gif');
const MAX_FILE_SIZE = 512000;

function checkImage($image) {
    $filename = $_FILES[$image]['name'];
    $size = $_FILES[$image]['size'];
    $tmp_file = $_FILES[$image]['tmp_name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $target_file = TARGET_DIR . basename($filename);

    // Check if there is a file uploaded
    if ($_FILES[$image]['error'] !== UPLOAD_ERR_OK) {
        return "Tidak ada file yang diupload atau terjadi kesalahan!";
    }

    // Check if it's an image file
    $image_info = getimagesize($tmp_file);
    if (!$image_info) {
        return "File yang diupload bukan gambar!";
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        return "File yang diupload sudah ada, silahkan ganti nama file!";
    }

    // Check file size
    if ($size > MAX_FILE_SIZE) {
        return "File yang diupload melebihi 512kb!";
    }

    // Check file extension
    if (!in_array($ext, ALLOWED_EXT)) {
        return "Ekstensi file yang diupload tidak diperbolehkan (hanya .png, .jpg, .jpeg, .gif)!";
    }

    // Move uploaded file to target directory
    if (move_uploaded_file($tmp_file, $target_file)) {
        return "OK";
    } else {
        return "Gagal mengupload file! Periksa kembali target file.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_image = $_POST['nama_image'];
    $filename = $_FILES['image']['name'];

    $result = checkImage('image');

    if ($result != "OK") {
        echo "<script>alert('$result');</script>";
        echo "<script>window.location = '../../../../index.php?page=tambahGambar';</script>";
    } else {
        $query = "INSERT INTO tb_image SET
                  nama_image = '$nama_image',
                  image = '$filename'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('Berhasil menambahkan data Ruangan!');</script>";
            echo "<script>window.location = '../../../../index.php?page=listGambar';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data Ruangan, coba cek isian anda!');</script>";
            echo "<script>window.location = '../../../../index.php?page=tambahGambar';</script>";
        }
    }
}
?>
