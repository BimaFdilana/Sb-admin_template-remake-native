<?php
include_once("../../../conf/db_conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $role = $_POST['role'];
    $password = isset($_POST['password']) && !empty($_POST['password']) ? md5($_POST['password']) : null;

    // Mulai query dasar
    $query = "UPDATE tb_user SET
              username = '$username',
              email = '$email',
              no_hp = '$no_hp',
              role = '$role'";

    // Jika password diisi, tambahkan ke query
    if ($password !== null) {
        $query .= ", password = '$password'";
    }

    // Tambahkan kondisi WHERE
    $query .= " WHERE id = '$id'";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Berhasil mengubah data $username!');</script>";
        echo "<script>window.location = '../../../index_admin.php?page=data_user';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data $username, coba cek isian anda!');</script>";
        echo "<script>window.location = '../../../index_admin.php?page=ubah_user&id=$id';</script>";
    }
}
?>