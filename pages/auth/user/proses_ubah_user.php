<?php
include("../../conf/db_conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $ubah_password = isset($_POST['ubah_password']) && $_POST['ubah_password'] ? true : false;

    if ($ubah_password) {
        $password = $_POST['password'];
        $password = md5($password);
        $query = "UPDATE tb_user SET
                  username = '$username',
                  email = '$email',
                  no_hp = '$no_hp',
                  password = '$password' 
                  WHERE id='$id'";
    } else {
        $query = "UPDATE tb_user SET
                  username = '$username',
                  email = '$email',
                  no_hp = '$no_hp' 
                  WHERE id='$id'";
    }

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Berhasil mengubah data $username!');</script>";
        echo "<script>window.location = '../../index.php?page=data_user';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data $username, coba cek isian anda!');</script>";
        echo "<script>window.location = '../../index.php?page=ubah_user&id=$id';</script>";
    }
}
?>
