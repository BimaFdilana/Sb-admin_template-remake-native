<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/styles.css" />
  <title>BaleeKun-Digital</title>
</head>
<body>
  <nav>
    <div class="nav__bar">
      <div class="nav__header">
        <div class="logo nav__logo">
          <img src="image/avatar/logo_dark.png" alt="Balee-kun Digital" class="logo-image" />
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <i class="ri-menu-line"></i>
        </div>
      </div>
        <ul class="nav__links" id="nav-links">
          <li><a href="?page=home">Home</a></li>
          <li><a href="?page=galeri">Galeri</a></li>
          <li><a href="?page=product">Product</a></li>
          <li><a href="?page=tutorial">Tutorial</a></li>
          <li><a href="?page=aboutus">AboutUs</a></li>
          
          <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
              <li><a href="?page=pesanan"><button class="btn">Pesanan</button></a></li>
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
      $pagesRequireLogin = ['galeri', 'product', 'tutorial', 'pesanan'];

      // Cek jika halaman yang diminta membutuhkan login dan pengguna belum login
      if (in_array($page, $pagesRequireLogin) && !$loggedIn) {
          include 'pages_web/login.php';
      } else {
          // Load halaman sesuai link yang diklik
          switch ($page) {
              case 'galeri':
                  include 'pages_web/galeri.php';
                  break;
              case 'product':
                  include 'pages_web/product.php';
                  break;
              case 'tutorial':
                  include 'pages_web/tutorial.php';
                  break;
              case 'aboutus':
                  include 'pages_web/aboutus.php';
                  break;
              case 'pesanan':
                  include 'pages_web/pesanan.php';
                  break;
              case 'login':
                  include 'pages_web/login.php'; // Tambahkan ini
                  break;
              default:
                  include 'pages_web/home.php';
          }
      }
    ?>
  </div>

  <footer class="footer">
  <footer class="footer">
      <div class="section__container footer__container">
        <div class="footer__col">
          <div class="logo footer__logo">
            <div>H</div>
            <span>HOTEL<br />MIRANDA</span>
          </div>
          <p class="section__description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil,
            laudantium unde. Doloremque eaque debitis laborum labore voluptates
            iste molestiae consectetur.
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
            <li><a href="#">Online Booking</a></li>
            <li><a href="#">Room Customization</a></li>
            <li><a href="#">Virtual Tours</a></li>
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
        Copyright © 2023 Web Design Mastery. All rights reserved.
      </div>
    </footer>
  </footer>

  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
