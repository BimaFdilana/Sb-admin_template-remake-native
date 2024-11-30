<?php
// Mengimpor file konfigurasi koneksi ke database
include "../../../conf/db_conn.php";

// Mengambil data dari form login dan menghindari SQL injection dengan mysqli_real_escape_string
$email = mysqli_real_escape_string($conn, $_POST['email']); // Mengambil dan membersihkan input email
$password = mysqli_real_escape_string($conn, $_POST['password']); // Mengambil dan membersihkan input password

// Query SQL untuk memeriksa apakah email dan password cocok dengan data di database
$sql_query = "SELECT * FROM tb_user WHERE email='$email' AND password='" . md5($password) . "'";
// Menjalankan query ke database
$result = mysqli_query($conn, $sql_query);
// Mengambil hasil query sebagai array
$row = mysqli_fetch_array($result);

// Jika ada data pengguna yang cocok (email dan password benar)
if ($row) {
    // Jika session belum dimulai, mulai session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Menyimpan data pengguna ke dalam session
    $_SESSION['id'] = $row['id']; // Menyimpan id pengguna
    $_SESSION['email'] = $row['email']; // Menyimpan email pengguna
    $_SESSION['username'] = $row['username']; // Menyimpan nama pengguna
    $_SESSION['role'] = $row['role']; // Menyimpan peran pengguna (Admin, User, dll)
    $_SESSION['no_hp'] = $row['no_hp']; // Menyimpan nomor HP pengguna
    $_SESSION['logged_in'] = true; // Menandakan bahwa pengguna sudah login

    // Menampilkan alert untuk memberitahu pengguna berhasil login
    echo "<script>alert('Selamat datang, " . $row['username'] . ", kamu telah berhasil login!')</script>";

    // Mengecek peran pengguna dan mengarahkan ke halaman yang sesuai berdasarkan role
    if ($row['role'] == 'Admin') {
        // Jika pengguna adalah Admin, arahkan ke halaman admin
        echo "<script>window.location.href='../../../index_admin.php'</script>";
    } else {
        // Jika pengguna bukan Admin, arahkan ke halaman user biasa
        echo "<script>window.location.href='../../../index.php'</script>";
    }
} else {
    // Jika data login tidak ditemukan (email atau password salah), tampilkan alert
    echo "<script>alert('Masukkan data email dan password dengan benar!')</script>";
    
    // Mengambil halaman sebelumnya dari referer atau mengarahkan ke halaman login admin jika tidak ada
    $previous_page = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../../../index_admin.php';
    
    // Mengarahkan kembali ke halaman sebelumnya setelah alert
    echo "<script>window.location.href='$previous_page'</script>";
}
?>