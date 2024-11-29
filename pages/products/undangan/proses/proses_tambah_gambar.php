<?php
include "../../../../conf/db_conn.php";

const TARGET_DIR = "../../../../image/product_image/";
const ALLOWED_EXT = array('png', 'jpg', 'jpeg', 'gif');
const MAX_FILE_SIZE = 2097152; // 2MB

function checkImages($image) {
    $uploaded_files = [];

    foreach ($_FILES[$image]['name'] as $key => $filename) {
        $size = $_FILES[$image]['size'][$key];
        $tmp_file = $_FILES[$image]['tmp_name'][$key];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $original_name = pathinfo($filename, PATHINFO_FILENAME);  // Get the original file name without extension
        $target_file = TARGET_DIR . basename($filename);

        // Check if there is a file uploaded
        if ($_FILES[$image]['error'][$key] !== UPLOAD_ERR_OK) {
            return "Tidak ada file yang diupload atau terjadi kesalahan!";
        }

        // Check if it's an image file
        $image_info = getimagesize($tmp_file);
        if (!$image_info) {
            return "File yang diupload bukan gambar!";
        }

        // Check if file already exists and create a unique name
        $counter = 1;
        while (file_exists($target_file)) {
            // Append a counter to the original file name
            $filename = $original_name . '-' . $counter . '.' . $ext;
            $target_file = TARGET_DIR . $filename;
            $counter++;
        }

        // Check file size
        if ($size > MAX_FILE_SIZE) {
            return "File yang diupload melebihi 2MB!";
        }

        // Check file extension
        if (!in_array($ext, ALLOWED_EXT)) {
            return "Ekstensi file yang diupload tidak diperbolehkan (hanya .png, .jpg, .jpeg, .gif)!";
        }

        // Move uploaded file to target directory
        if (move_uploaded_file($tmp_file, $target_file)) {
            $uploaded_files[] = $filename;  // Add successfully uploaded filename to array
        } else {
            return "Gagal mengupload file!";
        }
    }

    return $uploaded_files; // Return the array of uploaded filenames
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_image = $_POST['nama_image'];

    // Call checkImages function to handle multiple image uploads
    $uploaded_files = checkImages('image');
    
    if (is_array($uploaded_files)) {
        // Prepare filenames array to store in the database
        $image_files = implode(",", $uploaded_files);

        // Query to insert data into database
        $query = "INSERT INTO tb_image (nama_image, image) VALUES ('$nama_image', '$image_files')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('Berhasil menambahkan gambar!');</script>";
            echo "<script>window.location = '../../../../index_admin.php?page=listGambar';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan gambar, coba cek isian anda!');</script>";
            echo "<script>window.location = '../../../../index_admin.php?page=tambahGambar';</script>";
        }
    } else {
        // If there was an error in uploading, show the error message
        echo "<script>alert('$uploaded_files');</script>";
        echo "<script>window.location = '../../../../index_admin.php?page=tambahGambar';</script>";
    }
}
?>