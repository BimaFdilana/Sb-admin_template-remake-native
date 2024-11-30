<?php
// Menyertakan file koneksi database yang diperlukan untuk query ke database.
include_once('../../../conf/db_conn.php');

// Mengecek apakah metode request yang digunakan adalah 'POST', yang mengindikasikan form telah disubmit.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form input untuk digunakan dalam query SQL.
    $username = $_POST['username'];   // Mengambil nama pengguna dari input form
    $email = $_POST['email'];         // Mengambil alamat email dari input form
    $no_hp = $_POST['no_hp'];         // Mengambil nomor handphone dari input form
    $password = $_POST['password'];   // Mengambil kata sandi dari input form
    $role = 'User';                   // Menetapkan role sebagai 'User' secara default

    // Mengenkripsi kata sandi dengan menggunakan md5 (perhatikan bahwa md5 tidak direkomendasikan untuk password karena keamanannya yang lemah).
    $password = md5($password);

    // Membuat query SQL untuk menyimpan data pengguna baru ke dalam tabel 'tb_user'.
    $query = "INSERT INTO tb_user SET
        username = '$username',
        email = '$email',
        no_hp = '$no_hp',
        password = '$password',
        role = '$role'";

    // Menjalankan query untuk menambahkan data ke database.
    $result = mysqli_query($conn, $query);

    // Mengecek apakah query berhasil dijalankan.
    if ($result) {
        // Jika berhasil, menampilkan pesan konfirmasi bahwa data telah berhasil ditambahkan.
        echo "<script>alert('Berhasil menambahkan data $username!')</script>";
        
        // Mengarahkan kembali ke halaman sebelumnya (menggunakan HTTP_REFERER) atau ke halaman default jika tidak ada referer.
        $previous_page = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../../../index_admin.php';
        echo "<script>window.location.href='$previous_page'</script>";
    } else {
        // Jika gagal, menampilkan pesan kesalahan dan memberikan petunjuk untuk memeriksa isian data.
        echo "<script>alert('Gagal menambahkan data $username, coba cek isian anda!');</script>";
        
        // Mengarahkan kembali ke halaman sebelumnya (menggunakan HTTP_REFERER) atau ke halaman default jika tidak ada referer.
        $previous_page = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../../../index_admin.php';
        echo "<script>window.location.href='$previous_page'</script>";
    }
}
?>