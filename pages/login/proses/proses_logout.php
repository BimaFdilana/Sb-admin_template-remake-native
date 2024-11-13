<?php 
    session_start();
    if (isset($_SESSION['email'])) {
        session_destroy();
        header('location:../pages/login.php');
    }
?>

<?php
session_start();

// Simpan role pengguna sebelum sesi dihancurkan
$role = $_SESSION['role'] ?? null; // Mengambil role, jika ada

// Hancurkan sesi
session_destroy();

// Arahkan pengguna berdasarkan role
if ($role === 'Admin') {
    header('location: ../pages/login.php');
} else {
    header('location: ../../../index.php?page=home');
}
exit();
?>