<?php
require("conf/db_conn.php");

// Fungsi untuk memformat harga menjadi format Rupiah
function format_currency($amount) {
    return "Rp " . number_format($amount, 0, ',', '.');
}

// Query untuk mengambil data undangan
$query = "SELECT u.id_undangan, u.nama_undangan, u.jumlah_undangan, u.harga_undangan, u.jenis_undangan, u.deskripsi_undangan, u.detail_undangan, i.image
          FROM tb_undangan u
          LEFT JOIN tb_image i ON u.id_image = i.id_image
          LIMIT 6";  
$list_data_undangan = mysqli_query($conn, $query);
?>


<header class="header" id="home">
    <div class="section__container header__container">
        <p class="section__subheader"> -Undangan Digital Berteknologi AR- </p>
        <h1>Inovasi Modern <br />untuk Momen Istimewa</h1>
        <a href="?page=product"> <button class="btn">Order Now</button></a>

    </div>
</header>

<section class="intro">
    <div class="section__container intro__container">
        <div class="intro__cotent">
            <p class="section__subheader">INTRO</p>
            <h2 class="section__header">Apa Itu Undangan Digital Berteknologi AR?</h2>
            <p class="section__description">
                Undangan digital AR adalah solusi inovatif yang menggabungkan desain undangan digital dengan fitur
                interaktif berbasis teknologi AR. Saat tamu Anda memindai undangan menggunakan perangkat mereka, mereka
                akan disuguhkan elemen-elemen visual yang hidup,
            </p>
        </div>
        <div class="intro__video">
            <video src="image/assets/luxury.mp4" autoplay muted loop></video>
        </div>
    </div>
</section>

<section class="room__container" id="room">
    <p class="section__subheader">PRODUCT</p>
    <h2 class="section__header">Product Inovatif untuk Acara Anda</h2>
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
                <h3><?php echo format_currency($row['harga_undangan']); ?></h3>
            </div>
        </a>
        <?php } ?>
    </div>
</section>

<section class="section__container feature__container" id="feature">
    <p class="section__subheader">REASON</p>
    <h2 class="section__header">Mengapa Memilih Undangan Digital AR?</h2>
    <div class="feature__grid">
        <div class="feature__card">
            <span><i class="ri-thumb-up-line"></i></span>
            <h4>Kesan Eksklusif & Modern</h4>
            <p>
                Undangan AR meninggalkan kesan mendalam dan berbeda dari undangan konvensional, membuat momen Anda
                lebih.
                berkesan.
            </p>
        </div>
        <div class="feature__card">
            <span><i class="ri-time-line"></i></span>
            <h4>Ramah Lingkungan</h4>
            <p>
                Tidak ada lagi kertas terbuang! Undangan digital membantu Anda berkontribusi pada pelestarian
                lingkungan.
            </p>
        </div>
        <div class="feature__card">
            <span><i class="ri-map-pin-line"></i></span>
            <h4>Kemudahan Akses</h4>
            <p>
                Tamu dapat langsung mengakses detail acara kapan saja, di mana saja, hanya dengan ponsel.
            </p>
        </div>
        <div class="feature__card">
            <span><i class="ri-close-circle-line"></i></span>
            <h4>Personalisasi Tanpa Batas</h4>
            <p>
                Tambahkan elemen kreatif yang mencerminkan tema acara Anda, mulai dari musik latar hingga visualisasi
                3D.
            </p>
        </div>
        <div class="feature__card">
            <span><i class="ri-wallet-line"></i></span>
            <h4>Desain Interaktif & Animasi 3D</h4>
            <p>
                Undangan ini dilengkapi dengan elemen visual seperti animasi 3D, video, dan gambar interaktif yang
                tampil saat tamu memindai undangan menggunakan smartphone.
            </p>
        </div>
        <div class="feature__card">
            <span><i class="ri-coupon-line"></i></span>
            <h4> Kode QR Praktis</h4>
            <p>
                Setiap undangan dilengkapi dengan kode QR unik yang bisa dibagikan melalui media sosial, email, atau
                aplikasi pesan.
            </p>
        </div>
    </div>
</section>


<section class="about" id="about">
    <div class="section__container about__container">
        <div class="about__grid">
            <div class="about__image">
                <img src="image/assets/assets10.jpg" alt="about" />
            </div>
            <div class="about__card">
                <span><i class="ri-user-line"></i></span>
                <h4>Augmented Reality</h4>
                <p>Sambut Momen Spesialmu dengan Undangan Digital.</p>
            </div>
            <div class="about__image">
                <img src="image/assets/assets11.jpg" alt="about" />
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
                Dengan teknologi AR, kami membantu Anda menciptakan undangan yang bukan hanya pemberitahuan, tetapi juga
                kenangan. Buat setiap momen istimewa Anda terasa lebih hidup dan bermakna.
                <br>
                📩 Segera hubungi kami dan mulailah perjalanan Anda menuju undangan yang tak terlupakan!
            </p>
            <a href="index.php?page=aboutus"><button class="btn">See More</button></a>
        </div>
    </div>
</section>

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
            <img src="image/assets/assets23.jpg" alt="menu" />
            <img src="image/assets/assets24.jpg" alt="menu" />
            <img src="image/assets/assets25.jpg" alt="menu" />
        </div>

    </div>
</section>