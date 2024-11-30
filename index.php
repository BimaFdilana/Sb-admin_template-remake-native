<?php

    session_start();

    if (isset($_GET['clear_session']) && $_GET['clear_session'] == 'true') {
    unset($_SESSION['order_status']); // Hapus session order_status
    header("Location: ?page=history"); // Redirect ke halaman history setelah menghapus session
    exit;
}
    $order_status = isset($_SESSION['order_status']) ? $_SESSION['order_status'] : null;
    $cart_item_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <title>BaleeKun-Digital</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
    <nav>
        <div class="nav__bar">
            <div class="nav__header">
                <div class="logo nav__logo">
                    <img src="image/avatar/logo.png" alt="Balee-kun Digital" class="logo-image" />
                </div>
                <div class="nav__menu__btn" id="menu-btn">
                    <i class="ri-menu-line"></i>
                </div>
            </div>
            <ul class="nav__links" id="nav-links">
                <li><a href="?page=home">Home</a></li>
                <li><a href="?page=product">Product</a></li>
                <li><a href="?page=tutorial">Tutorial</a></li>
                <li><a href="?page=aboutus">AboutUs</a></li>

                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                <li style="position: relative;">
                    <a href="?page=history&clear_session=true">
                        <i class="ri-notification-3-fill" style="font-size: 30px;">
                            <?php if ($order_status === 'pending'): ?>
                            <!-- Menambahkan badge dengan posisi absolute di atas ikon -->
                            <span class="badge bg-danger"
                                style="position: absolute; top: -5px; right: -10px; font-size: 12px; padding: 3px 7px;">1</span>
                            <?php endif; ?>
                        </i>
                    </a>
                </li>
                <li>
                    <a href="?page=cart" style="position: relative;">
                        <i class="ri-shopping-cart-fill" style="font-size: 30px;"></i>
                        <!-- Tampilkan badge jumlah item jika ada item di keranjang -->
                        <?php if ($cart_item_count > 0): ?>
                        <span class="badge bg-danger"
                            style="position: absolute; top: -20px; right: -10px; font-size: 12px; padding: 3px 7px;">
                            <?= $cart_item_count; ?>
                        </span>
                        <?php endif; ?>
                    </a>
                </li>
                <li><a href="pages/login/proses/proses_logout.php" title="Logout">
                        <i class="ri-logout-circle-r-line" style="font-size: 30px;"></i>
                    </a></li>
                <?php else: ?>
                <li><a href="?page=login"><button class="btn">Login</button></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>


    <div class="content">
        <?php
            // Logic untuk memuat halaman sesuai dengan link yang diklik
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';

            // Cek apakah pengguna sudah login
            $loggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

            // Daftar halaman yang memerlukan login
            $pagesRequireLogin = ['product', 'cart', 'history'];

            // Cek jika halaman yang diminta membutuhkan login dan pengguna belum login
            if (in_array($page, $pagesRequireLogin) && !$loggedIn) {
                include 'pages_web/login.php';
            } else {
                // Load halaman sesuai link yang diklik
                switch ($page) {
                    case 'product':
                        include 'pages_web/product.php';
                        break;
                    case 'cart':
                        include 'pages_web/cart.php';
                        break;
                    case 'history':
                        include 'pages_web/history.php';
                        break;
                    case 'tutorial':
                        include 'pages_web/tutorial.php';
                        break;
                    case 'aboutus':
                        include 'pages_web/aboutus.php';
                        break;
                    case 'login':
                        include 'pages_web/login.php';
                        break;
                    case 'register':
                        include 'pages_web/register.php';
                        break;
                    default:
                        include 'pages_web/home.php';
                }
            }
        ?>
    </div>

    <?php if ($page !== 'cart'): ?>
    <!-- Footer akan ditampilkan jika halaman bukan pesanan -->
    <footer class="footer">
        <div class="section__container footer__container">
            <div class="footer__col">
                <div class="logo footer__logo">
                    <div>AR</div>
                    <span>BaleeKun<br />Augmented Reality</span>
                </div>
                <p class="section__description">
                    Dengan Undangan Digital AR, setiap acara menjadi lebih berkesan, modern, dan praktis. Berikan
                    pengalaman luar biasa bagi tamu Anda, hanya dengan satu produk revolusioner.

                    Pesan Sekarang dan jadikan momen spesial Anda lebih berharga!
                </p>
                <ul class="footer__socials">
                    <li>
                        <a href="#"><i class="ri-youtube-fill"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="ri-instagram-line"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="ri-facebook-fill"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="ri-linkedin-fill"></i></a>
                    </li>
                </ul>
            </div>
            <div class="footer__col">
                <h4>Services</h4>
                <div class="footer__links">
                    <li><a href="#">Order Now</a></li>
                </div>
            </div>
            <div class="footer__col">
                <h4>Contact Us</h4>
                <div class="footer__links">
                    <li>
                        <span><i class="ri-phone-fill"></i></span>
                        <div>
                            <h5>Phone Number</h5>
                            <p>+62 851-7524-4552</p>
                        </div>
                    </li>
                    <li>
                        <span><i class="ri-record-mail-line"></i></span>
                        <div>
                            <h5>Email</h5>
                            <p>instinctsz19@gmail.com</p>
                        </div>
                    </li>
                    <li>
                        <span><i class="ri-map-pin-2-fill"></i></span>
                        <div>
                            <h5>Location</h5>
                            <p>Bengkalis, Jln Pramuka</p>
                        </div>
                    </li>
                </div>
            </div>
        </div>
        <div class="footer__bar">
            Copyright © 2024 BaleekunDigital.
        </div>
    </footer>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>