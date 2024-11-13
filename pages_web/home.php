<?php
require("conf/db_conn.php");

// Query untuk mengambil data undangan, menambahkan LIMIT 3 untuk hanya mengambil 3 data
$query = "SELECT u.id_undangan, u.nama_undangan, u.jumlah_undangan, u.harga_undangan, u.jenis_undangan, u.deskripsi_undangan, u.detail_undangan, i.image
          FROM tb_undangan u
          LEFT JOIN tb_image i ON u.id_image = i.id_image
          LIMIT 6";  // Hanya mengambil 3 data
$list_data_undangan = mysqli_query($conn, $query);
?>

<header class="header" id="home">
    <div class="section__container header__container">
        <p class="section__subheader"> -BaleekunDigital- </p>
        <h1>Undangan Digital<br />Dengan Teknologi VR</h1>
        <a href="?page=product"> <button class="btn">Order Now</button></a>

    </div>
</header>
<section class="menu" id="menu">
    <div class="section__container menu__container">
        <ul class="menu__banner">
            <li>
                <span><i class="ri-file-text-line"></i></span>
                <h4>84k</h4>
                <p>Digital Invitations Sent</p>
            </li>
            <li>
                <span><i class="ri-user-line"></i></span>
                <h4>10M</h4>
                <p>Invitations Viewed Worldwide</p>
            </li>
            <li>
                <span><i class="ri-function-line"></i></span>
                <h4>200+</h4>
                <p>Event Types Supported</p>
            </li>
            <li>
                <span><i class="ri-lightbulb-flash-line"></i></span>
                <h4>1M+</h4>
                <p>Happy Couples & Guests</p>
            </li>
        </ul>
        <div class="menu__header">
            <div>
                <h2 class="section__header"></h2>
            </div>
            <div class="section__nav">
                <span><i class="ri-arrow-left-line"></i></span>
                <span><i class="ri-arrow-right-line"></i></span>
            </div>
        </div>
        <div class="menu__images">
            <img src="image/assets/gambar1.jpg" alt="menu" />
            <img src="image/assets/gambar2.jpg" alt="menu" />
            <img src="image/assets/gambar4.jpg" alt="menu" />
        </div>

    </div>
</section>

<section class="about" id="about">
    <div class="section__container about__container">
        <div class="about__grid">
            <div class="about__image">
                <img src="image/assets/gambar1.jpg" alt="about" />
            </div>
            <div class="about__card">
                <span><i class="ri-user-line"></i></span>
                <h4>Virtual Reality</h4>
                <p>Sambut Momen Spesialmu dengan Undangan Digital.</p>
            </div>
            <div class="about__image">
                <img src="image/assets/gambar2.jpg" alt="about" />
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
                Undangan Digital VR adalah cara inovatif untuk mengirimkan undangan menggunakan teknologi Virtual
                Reality. Dengan hanya menggunakan Smartphone, tamu dapat merasakan pengalaman undangan yang interaktif,
                memungkinkan mereka untuk menjelajahi tema acara secara virtual dan mendapatkan informasi secara lebih
                menarik dan imersif.
            </p>
            <a href="index.php?page=aboutus"><button class="btn">See More</button></a>
        </div>
    </div>
</section>

<section class="room__container" id="room">
    <p class="section__subheader">PRODUCT</p>
    <h2 class="section__header">Undangan Digital</h2>
    <div class="room__grid">
        <?php 
        while ($row = mysqli_fetch_assoc($list_data_undangan)) {
            $gambar = $row["image"];
            $id_undangan = $row["id_undangan"];
        ?>
        <a href="index.php?page=product" class="room__card">
            <div class="room__card__image">
                <?php
                // Menampilkan gambar produk
                if ($gambar == null) {
                    echo "<img src='image/avatar/default-150x150.png'/>";
                } else {
                    echo "<img src='image/product_image/$gambar' />";
                }
                ?>
            </div>
            <div class="room__card__details">
                <h4><?php echo htmlspecialchars($row['nama_undangan']); ?></h4>
                <h3><?php echo htmlspecialchars($row['harga_undangan']); ?></h3>
            </div>
        </a>
        <?php } ?>
    </div>
</section>


<section class="intro">
    <div class="section__container intro__container">
        <div class="intro__cotent">
            <p class="section__subheader">INTRO VIDEO</p>
            <h2 class="section__header">Virtual Reality Demo</h2>
            <p class="section__description">
                Undangan ini bukan hanya tentang memberi tahu orang-orang mengenai acara Anda — ini adalah tentang
                memberikan mereka pengalaman yang tak terlupakan, di mana mereka bisa merasa seolah-olah sudah menjadi
                bagian dari acara Anda sejak hari pertama.
            </p>
        </div>
        <div class="intro__video">
            <video src="image/assets/luxury.mp4" autoplay muted loop></video>
        </div>
    </div>
</section>

<section class="section__container feature__container" id="feature">
    <p class="section__subheader">TUTORIAL</p>
    <h2 class="section__header">Cara Pemesanan</h2>
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