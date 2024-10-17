<?php
if(isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        // Beranda
        case 'beranda':
            include 'pages/beranda.php';
            break;
        case 'tambahUndangan':
            include 'pages/products/undangan/pages/tambah_undangan.php';
            break;
        case 'listUndangan':
            include 'pages/products/undangan/pages/list_data_undangan.php';
            break;
        case 'listPesanan':
            include 'pages/products/undangan/pages/tambah_undangan.php';
            break;
        case 'whatsappNumber';
            include 'pages/products/undangan/pages/tambah_undangan.php';
            break;
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
