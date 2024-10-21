<?php
require("conf/db_conn.php");
$query = "SELECT * FROM tb_undangan";
$list_data_undangan = mysqli_query($conn, $query);
?> 
 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles.css" />
    <script src="https://unpkg.com/scrollreveal"></script>
    <title>Web Design Mastery | Raido.</title>
  </head>
  <body>
    <header id="home">
      <nav>
        <div class="nav__bar">
          <div class="nav__logo"><a href="#">Raido.</a></div>
          <ul class="nav__links">
            <li class="link"><a href="#home">Home</a></li>
            <li class="link"><a href="#about">About Us</a></li>
            <li class="link"><a href="#discover">Discover</a></li>
            <li class="link"><a href="#blog">Blog</a></li>
            <li class="link"><a href="#journals">Journals</a></li>
            <li class="link"><a href="#gallery">Gallery</a></li>
            <li class="link"><a href="#contact">Contact</a></li>
            <li class="link search">
              <span><i class="ri-search-line"></i></span>
            </li>
          </ul>
        </div>
      </nav>
      <div class="section__container header__container">
        <h1>The new way to plan your next adventure</h1>
        <h4>Explore the colourful world</h4>
        <button class="btn">
          Explore More <i class="ri-arrow-right-line"></i>
        </button>
      </div>
    </header>

    <section class="discover" id="discover">
      <div class="section__container discover__container">
        <h2 class="section__header">Discover the most engaging places</h2>
        <p class="section__subheader">
          Let's see the world with us with you and your family.
        </p>
        <div class="discover__grid">
          <?php foreach($list_data_undangan as $row) : ?>
          <div class="discover__card">
            <div class="discover__image">
              <img src="assets/discover-1.jpg" alt="discover" />
            </div>
            <div class="discover__card__content">
              <h4><?=$row['nama_undangan'];?></h4>
              <p>
                Discover the untamed beauty of Norway, a land where rugged
                mountains, and enchanting northern lights paint a surreal
                backdrop.
              </p>
              <button class="discover__btn">
                Discover More <i class="ri-arrow-right-line"></i>
              </button>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="contact" id="contact">
      <div class="section__container contact__container">
        <div class="contact__col">
          <h4>Contact a travel researcher</h4>
          <p>We always aim to reply within 24 hours.</p>
        </div>
        <div class="contact__col">
          <div class="contact__card">
            <span><i class="ri-phone-line"></i></span>
            <h4>Call us</h4>
            <h5>+91 9876543210</h5>
            <p>We are online now</p>
          </div>
        </div>
        <div class="contact__col">
          <div class="contact__card">
            <span><i class="ri-mail-line"></i></span>
            <h4>Send us an enquiry</h4>
          </div>
        </div>
      </div>
    </section>

    <section class="footer">
      <div class="section__container footer__container">
        <h4>Raido.</h4>
        <div class="footer__socials">
          <span>
            <a href="#"><i class="ri-facebook-fill"></i></a>
          </span>
          <span>
            <a href="#"><i class="ri-instagram-fill"></i></a>
          </span>
          <span>
            <a href="#"><i class="ri-twitter-fill"></i></a>
          </span>
          <span>
            <a href="#"><i class="ri-linkedin-fill"></i></a>
          </span>
        </div>
        <p>
          Cheap Romantic Vacations. Many people feel that there is a limited
          amount of abundance, wealth, or chance to succeed in life.
        </p>
        <ul class="footer__nav">
          <li class="footer__link"><a href="#home">Home</a></li>
          <li class="footer__link"><a href="#about">About</a></li>
          <li class="footer__link"><a href="#discover">Discover</a></li>
          <li class="footer__link"><a href="#blog">Blog</a></li>
          <li class="footer__link"><a href="#journals">Journals</a></li>
          <li class="footer__link"><a href="#gallery">Gallery</a></li>
          <li class="footer__link"><a href="#contact">Contact</a></li>
        </ul>
      </div>
      <div class="footer__bar">
        Copyright © 2023 Web Design Mastery. All rights reserved.
      </div>
    </section>

    <script src="main.js"></script>
  </body>
</html>
