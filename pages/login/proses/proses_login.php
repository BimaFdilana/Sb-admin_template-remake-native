<?php
include "../../../conf/db_conn.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql_query = "SELECT * FROM tb_user WHERE email='$email' AND password='" . md5($password) . "'";
$result = mysqli_query($conn, $sql_query);
$row = mysqli_fetch_array($result);

if ($row) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['id'] = $row['id'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['logged_in'] = true;

    echo "<script>alert('Selamat datang, " . $row['username'] . ", kamu telah berhasil login!')</script>";

    // Cek role pengguna dan arahkan ke halaman yang sesuai
    if ($row['role'] == 'Admin') {
        echo "<script>window.location.href='../../../index_admin.php'</script>";
    } else {
        echo "<script>window.location.href='../../../index.php'</script>";
    }
} else {
    echo "<script>alert('Masukkan data email dan password dengan benar!')</script>";
   $previous_page = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '../../../index_admin.php';
    echo "<script>window.location.href='$previous_page'</script>";
}
?>