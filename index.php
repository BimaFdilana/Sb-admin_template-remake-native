<?php
session_start();
    $cart_item_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>BaleeKun-Digital</title>
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
                <li><a href="?page=cart"><i class="ri-history-fill" style="font-size: 30px;"></i></a></li>
                <li>
                    <a href="?page=cart" style="position: relative;">
                        <i class="ri-shopping-cart-fill" style="font-size: 30px;"></i>
                        <!-- Tampilkan badge jumlah item jika ada item di keranjang -->
                        <?php if ($cart_item_count > 0): ?>
                        <span class="badge bg-danger"
                            style="position: absolute; top: -5px; right: -10px; font-size: 12px; padding: 3px 7px;">
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
            $pagesRequireLogin = ['product', 'cart'];

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
                    case 'tutorial':
                        include 'pages_web/tutorial.php';
                        break;
                    case 'aboutus':
                        include 'pages_web/aboutus.php';
                        break;
                    case 'login':
                        include 'pages_web/login.php';
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
                    <div>VR</div>
                    <span>BaleeKun<br />Virtual Reality</span>
                </div>
                <p class="section__description">
                    Undangan ini bukan hanya tentang memberi tahu orang-orang mengenai acara Anda — ini adalah
                    tentang memberikan mereka pengalaman yang tak terlupakan, di mana mereka bisa merasa seolah-olah
                    sudah menjadi bagian dari acara Anda sejak hari pertama.
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
                    <li><a href="#">Online Shopping</a></li>
                    <li><a href="#">Special Offers</a></li>
                    <li><a href="#">Concierge Services</a></li>
                    <li><a href="#">Customer Support</a></li>
                </div>
            </div>
            <div class="footer__col">
                <h4>Contact Us</h4>
                <div class="footer__links">
                    <li>
                        <span><i class="ri-phone-fill"></i></span>
                        <div>
                            <h5>Phone Number</h5>
                            <p>+91 9876543210</p>
                        </div>
                    </li>
                    <li>
                        <span><i class="ri-record-mail-line"></i></span>
                        <div>
                            <h5>Email</h5>
                            <p>info@hotelmiranda.com</p>
                        </div>
                    </li>
                    <li>
                        <span><i class="ri-map-pin-2-fill"></i></span>
                        <div>
                            <h5>Location</h5>
                            <p>First St. NYC</p>
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