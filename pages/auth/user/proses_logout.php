<?php 
    session_start();
    if (isset($_SESSION['email'])) {
        session_destroy();
        header('location:../../pages/user/login.php');
    }
?>