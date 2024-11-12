<?php
require("conf/db_conn.php");
$query = "SELECT * FROM tb_undangan";
$list_data_undangan = mysqli_query($conn, $query);
?> 
 


<header class="header" id="home">
      <div class="section__container header__container">
        <p class="section__subheader"> -BaleekunDigital- </p>
        <h1>Undangan Digital<br/>Dengan Teknologi VR</h1>
        <button class="btn">Order Now</button>
      </div>
    </header>

    <section class="about" id="about">
      <div class="section__container about__container">
        <div class="about__grid">
          <div class="about__image">
            <img src="image/assets/about-1.jpg" alt="about" />
          </div>
          <div class="about__card">
            <span><i class="ri-user-line"></i></span>
            <h4>Virtual Reality</h4>
            <p>
              Sambut Momen Spesialmu dengan Undangan Digital.
            </p>
          </div>
          <div class="about__image">
            <img src="image/assets/about-2.jpg" alt="about" />
          </div>
          <div class="about__card">
            <span><i class="ri-calendar-check-line"></i></span>
            <h4>Undangan Digital</h4>
            <p>Ciptakan Momen Berkesan dengan Undangan Digital.</p>
          </div>
        </div>
        <div class="about__content">
          <p class="section__subheader">ABOUT US</p>
          <h2 class="section__header">Baleekun Digital</h2>
          <p class="section__description">
          Undangan Digital VR adalah cara inovatif untuk mengirimkan undangan menggunakan teknologi Virtual Reality. Dengan hanya menggunakan Smartphone, tamu dapat merasakan pengalaman undangan yang interaktif, memungkinkan mereka untuk menjelajahi tema acara secara virtual dan mendapatkan informasi secara lebih menarik dan imersif.
          </p>
          <button class="btn">See More</button>
        </div>
      </div>
    </section>

    <section class="room__container" id="room">
      <p class="section__subheader">Product</p>
      <h2 class="section__header">Undagan Digital</h2>
      <div class="room__grid">
        <div class="room__card">
          <img src="image/assets/room-1.jpg" alt="room" />
          <div class="room__card__details">
            <div>
              <h4>Deluxe Suite</h4>
            </div>
            <h3>$399<span>/night</span></h3>
          </div>
        </div>
        <div class="room__card">
          <img src="image/assets/room-2.jpg" alt="room" />
          <div class="room__card__details">
            <div>
              <h4>Family Suite</h4>
            </div>
            <h3>$599<span>/night</span></h3>
          </div>
        </div>
        <div class="room__card">
          <img src="image/assets/room-3.jpg" alt="room" />
          <div class="room__card__details">
            <div>
              <h4>Luxury Penthouse</h4>
            </div>
            <h3>$799<span>/night</span></h3>
          </div>
        </div>
      </div>
    </section>

    <section class="intro">
      <div class="section__container intro__container">
        <div class="intro__cotent">
          <p class="section__subheader">INTRO VIDEO</p>
          <h2 class="section__header">Meet With Our Luxury Place</h2>
          <p class="section__description">
            Whether you're seeking a cozy and exclusive hideaway or an immersive
            journey beneath the surface, Hotel Miranda promises to be an
            unforgettable stay, where the depths of comfort and excitement await
            your arrival.
          </p>
          <button class="btn">Book Now</button>
        </div>
        <div class="intro__video">
          <video src="image/assets/luxury.mp4" autoplay muted loop></video>
        </div>
      </div>
    </section>

    <section class="section__container feature__container" id="feature">
      <p class="section__subheader">FACILITIES</p>
      <h2 class="section__header">Core Features</h2>
      <div class="feature__grid">
        <div class="feature__card">
          <span><i class="ri-thumb-up-line"></i></span>
          <h4>Have High Rating</h4>
          <p>
            We take pride in curating a selection of hotels that consistently
            receive high ratings and positive reviews.
          </p>
        </div>
        <div class="feature__card">
          <span><i class="ri-time-line"></i></span>
          <h4>Quite Hours</h4>
          <p>
            We understand that peace and uninterrupted rest are essential for a
            rejuvenating experience.
          </p>
        </div>
        <div class="feature__card">
          <span><i class="ri-map-pin-line"></i></span>
          <h4>Best Location</h4>
          <p>
            At our hotel booking website, we take pride in offering
            accommodations in the most prime and sought-after locations.
          </p>
        </div>
        <div class="feature__card">
          <span><i class="ri-close-circle-line"></i></span>
          <h4>Free Cancellation</h4>
          <p>
            We understand that travel plans can change unexpectedly, which is
            why we offer the flexibility of free cancellation.
          </p>
        </div>
        <div class="feature__card">
          <span><i class="ri-wallet-line"></i></span>
          <h4>Payment Options</h4>
          <p>
            Our hotel booking website offers a range of convenient payment
            options to suit your preferences.
          </p>
        </div>
        <div class="feature__card">
          <span><i class="ri-coupon-line"></i></span>
          <h4>Special Offers</h4>
          <p>
            Whether you're planning a romantic getaway, or a business trip, our
            carefully curated special offers cater to all your needs.
          </p>
        </div>
      </div>
    </section>

    <section class="menu" id="menu">
      <div class="section__container menu__container">
        <div class="menu__header">
          <div>
            <p class="section__subheader">MENU</p>
            <h2 class="section__header">Our Food Menu</h2>
          </div>
          <div class="section__nav">
            <span><i class="ri-arrow-left-line"></i></span>
            <span><i class="ri-arrow-right-line"></i></span>
          </div>
        </div>
        <ul class="menu__items">
          <li>
            <img src="image/assets/menu-1.jpg" alt="menu" />
            <div class="menu__details">
              <h4>Fggs & Bacon</h4>
              <p>
                It is a culinary innovation that puts a unique spin on the
                beloved breakfast combination.
              </p>
            </div>
          </li>
          <li>
            <img src="image/assets/menu-2.jpg" alt="menu" />
            <div class="menu__details">
              <h4>Tea or Coffee</h4>
              <p>
                A classic choice for your daily dose of comfort and calmness.
              </p>
            </div>
          </li>
          <li>
            <img src="image/assets/menu-3.jpg" alt="menu" />
            <div class="menu__details">
              <h4>Chia Oatmeal</h4>
              <p>
                Our Chia Oatmeal is a wholesome nutrient-packed breakfast
                delight.
              </p>
            </div>
          </li>
          <li>
            <img src="image/assets/menu-4.jpg" alt="menu" />
            <div class="menu__details">
              <h4>Fruit Parfait</h4>
              <p>
                Our Fruit Parfait is a delightful culinary masterpiece of
                freshness and flavor.
              </p>
            </div>
          </li>
          <li>
            <img src="image/assets/menu-5.jpg" alt="menu" />
            <div class="menu__details">
              <h4>Marmalade Selection</h4>
              <p>
                Our Marmalade Selection is a delectable medley of vibrant,
                handcrafted citrus preserves.
              </p>
            </div>
          </li>
          <li>
            <img src="image/assets/menu-6.jpg" alt="menu" />
            <div class="menu__details">
              <h4>Cheese Plate</h4>
              <p>
                Our cheese plate is a masterpiece that celebrates rich and
                diverse world of cheeses.
              </p>
            </div>
          </li>
        </ul>
        <div class="menu__images">
          <img src="image/assets/menu-7.jpg" alt="menu" />
          <img src="image/assets/menu-8.jpg" alt="menu" />
          <img src="image/assets/menu-9.jpg" alt="menu" />
        </div>
        <ul class="menu__banner">
          <li>
            <span><i class="ri-file-text-line"></i></span>
            <h4>84k</h4>
            <p>Projects are Completed</p>
          </li>
          <li>
            <span><i class="ri-user-line"></i></span>
            <h4>10M</h4>
            <p>Active Around World</p>
          </li>
          <li>
            <span><i class="ri-function-line"></i></span>
            <h4>02k</h4>
            <p>Categories Served</p>
          </li>
          <li>
            <span><i class="ri-lightbulb-flash-line"></i></span>
            <h4>100M</h4>
            <p>Ideas Raised Funds</p>
          </li>
        </ul>
      </div>
    </section>

    <section class="section__container news__container" id="news">
      <div class="news__header">
        <div>
          <p class="section__subheader">BLOG</p>
          <h2 class="section__header">News Feeds</h2>
        </div>
        <div class="section__nav">
          <span><i class="ri-arrow-left-line"></i></span>
          <span><i class="ri-arrow-right-line"></i></span>
        </div>
      </div>
      <div class="news__grid">
        <div class="news__card">
          <img src="image/assets/news-1.jpg" alt="news" />
          <div class="news__card__title">
            <p>25th March 2022</p>
            <p>By Emily</p>
          </div>
          <h4>Exploring Local Culinary Gems: A Foodie's Guide.</h4>
          <p>
            Join Emily as she takes you on a gastronomic adventure through the
            neighborhood surrounding our hotel.
          </p>
        </div>
        <div class="news__card">
          <img src="image/assets/news-2.jpg" alt="news" />
          <div class="news__card__title">
            <p>15th June 2022</p>
            <p>By David</p>
          </div>
          <h4>Balancing Mind, Body, and Soul at Our Hotel.</h4>
          <p>
            Discover holistic spa treatments, fitness facilities, and
            mindfulness practices that will leave you feeling refreshed.
          </p>
        </div>
        <div class="news__card">
          <img src="image/assets/news-3.jpg" alt="news" />
          <div class="news__card__title">
            <p>08th August 2022</p>
            <p>By Sarah</p>
          </div>
          <h4>Exploring Outdoor Activities Near Our Hotel.</h4>
          <p>
            From hiking and biking trails to water sports and wildlife
            encounters, she highlights ways to experience nature's wonders.
          </p>
        </div>
      </div>
    