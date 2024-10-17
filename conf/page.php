<?php
if(isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        // Beranda
        case 'beranda':
            include 'pages/beranda.php';
            break;
            // Undangan Product
        case 'tambahUndangan':
            include 'pages/products/undangan/pages/tambah_undangan.php';
            break;
        case 'listUndangan':
            include 'pages/products/undangan/pages/list_data_undangan.php';
            break;
            // Pesanan
        case 'tambahPesanan':
            include 'pages/products/undangan/pages/tambah_pesanan.php';
            break;
        case 'listPesanan':
            include 'pages/products/undangan/pages/list_pesanan.php';
            break;
            // Gambar
        case 'tambahGambar';
            include 'pages/products/undangan/pages/tambah_gambar.php';
            break;
        case 'listGambar';
            include 'pages/products/undangan/pages/list_gambar.php';
            break;
            // User Admin
        case 'data_user':
            if($_SESSION['role'] == 'Admin') {
                include 'pages/admin/pages/data_users.php';
            } else {
                include 'pages/error/401.php';
            }
            break;
        case 'tambah_user':
            if($_SESSION['role'] == 'Admin') {
                include 'pages/admin/pages/tambah_user.php';
            } else {
                include 'pages/error/401.php';
            }
            break;
        case 'ubah_user':
            if($_SESSION['role'] == 'Admin') {
                include 'pages/admin/pages/ubah_user.php';
            } else {
                include 'pages/error/401.php';
            }
            break;
        default:
            include 'pages/error/404.php';
            break;
    }
} else {
    include "pages/beranda.php";
}
?>
