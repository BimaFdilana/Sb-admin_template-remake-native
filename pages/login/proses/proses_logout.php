<?php
// Memulai session untuk mengakses data session
session_start();

// Menyimpan role pengguna sebelum session dihancurkan
$role = $_SESSION['role'] ?? null; // Mengambil nilai 'role' dari session jika ada, jika tidak akan bernilai null

// Menghancurkan session
session_destroy();

// Mengarahkan pengguna ke halaman login atau halaman utama berdasarkan role pengguna
if ($role === 'Admin') {
    // Jika pengguna memiliki role 'Admin', arahkan ke halaman login
    header('location: ../pages/login.php');
} else {
    // Jika pengguna bukan admin, arahkan ke halaman utama user
    header('location: ../../../index.php?page=home');
}
// Menghentikan eksekusi lebih lanjut
exit();
?>