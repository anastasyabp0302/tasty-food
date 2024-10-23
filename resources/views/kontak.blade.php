<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - Tasty Food</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        header {
            background-image: url('bg-tentang2.png');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 150px 0;
            position: relative;
        }
        .logo {
            font-weight: bold;
            font-size: 30px;
            position: absolute;
            top: 60px;
            left: 80px;
        }
        nav {
            position: absolute;
            top: 65px;
            right: 100px;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 14px;
            font-size: 16px;
        }

        .header-content {
            text-align: left;
            margin-left: 0;
            position: relative;
            left: 40px;
        }
        .header-content h2 {
            font-size: 60px;
            margin-left: 35px;
        }
        .contact-form {
            padding: 50px 15px;
            background-color: white;
            max-width: 800px;
            margin: 30px auto;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .contact-form h2 {
            margin-bottom: 40px;
            font-size: 24px;
            font-weight: bold;
        }
        .contact-form form {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .contact-form input, .contact-form textarea {
            width: calc(50% - 10px);
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        .contact-form input[type="text"],
        .contact-form input[type="email"] {
            flex: 1 1 48%;
        }
        .contact-form textarea {
            flex: 1 1 100%;
            height: 150px;
        }
        .contact-form button {
            width: 100%;
            padding: 15px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
        .contact-info {
            padding: 50px 15px;
            text-align: center;
        }
        .contact-info .info-item {
            display: inline-block;
            margin: 0 30px;
            text-align: center;
        }
        .contact-info .info-item img {
            width: 50px;
            margin-bottom: 10px;
        }
        .contact-info .info-item p {
            font-size: 18px;
            color: #333;
            margin: 0;
        }
        .map-section {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px 0;
        }
        .map-container {
            width: 80%;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        .map-container iframe {
            width: 100%;
            height: 500px;
            border: 0;
            border-radius: inherit;
        }

        .footer {
            background-color: black;
            color: #fff;
            padding: 40px 20px;
        }
        .footer-container {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            flex-wrap: wrap;
        }
        .footer-column {
            flex: 1;
            margin: 10px 20px;
            min-width: 200px;
        }
        .footer-column h3 {
            margin-bottom: 20px;
            font-size: 1.3em;
        }
        .footer-column p {
            margin-bottom: 20px;
        }
        .footer-column a {
            display: block;
            color: #fff;
            text-decoration: none;
            margin-bottom: 10px;
        }
        .footer-column a:hover {
            text-decoration: underline;
        }
        .footer-social {
            display: flex;
            gap: 10px;
        }
        .footer-social a img {
            width: 20px; 
            height: 20px; 
        }
        .footer-social a {
            width: 30px;
            height: 30px;
            background-color: #333;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #fff;
            margin-right: 30px;
        }
        .footer-social a:hover {
            background-color: #555;
        }
        .footer-bottom {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
        }
    </style>
</head>
<body>

<header>
    <div class="logo">TASTY FOOD</div>
    <nav>
        <a href="/">BERANDA</a>
        <a href="/tentang">TENTANG</a>
        <a href="/berita">BERITA</a>
        <a href="/gallery">GALERI</a>
        <a href="/kontak">KONTAK</a>
    </nav>
    <div class="header-content">
        <h2>KONTAK KAMI</h2>
    </div>
</header>

<div class="contact-form">
    <h2>KONTAK KAMI</h2>
    <form action="{{ route('kontak.store') }}" method="POST">
        @csrf
        <input type="text" name="subject" placeholder="Subjek">
        <input type="text" name="name" placeholder="Nama">
        <input type="email" name="email" placeholder="Email">
        <textarea name="pesan" placeholder="Pesan"></textarea>
        <button type="submit">KIRIM</button>
    </form>
    
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
</div>

<div class="contact-info">
    <div class="info-item">
        <img src="pesan.png" alt="Email">
        <p>tastyfood@gmail.com</p>
    </div>
    <div class="info-item">
        <img src="telp.png" alt="Telepon">
        <p>+62 812 3456 7890</p>
    </div>
    <div class="info-item">
        <img src="lokasi.png" alt="Lokasi">
        <p>Kota Bandung, Jawa Barat</p>
    </div>
</div>

<section class="map-section">
    <div class="map-container">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.5588068405023!2d107.66141237399778!3d-6.943211393056867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7c381e3c323%3A0x5f5160f6c9796e4b!2sCYBERLABS%20-%20Jasa%20Digital%20Marketing%20%7C%20Jasa%20Pembuatan%20Website%20%7C%20Jasa%20Pembuatan%20Aplikasi!5e0!3m2!1sid!2sid!4v1727152998472!5m2!1sid!2sid" 
            allowfullscreen=""
            loading="lazy"></iframe>
    </div>
</section>

<footer class="footer">
    <div class="footer-section">
    <div class="footer-column">
            <h3>Tasty Food</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <div class="footer-social">
                <a href="#"><img src="001-facebook.png" alt="Facebook"></a>
                <a href="#"><img src="002-twitter.png" alt="Twitter"></a>
            </div>
        </div>
        <div class="footer-column">
            <h3>Link Berguna</h3>
            <a href="#">Blog</a>
            <a href="#">Hewan</a>
            <a href="#">Galeri</a>
            <a href="#">Testimonial</a>
        </div>
        <div class="footer-column">
            <h3>Privasi</h3>
            <a href="#">Karir</a>
            <a href="#">Tentang Kami</a>
            <a href="#">Kontak Kami</a>
            <a href="#">Servis</a>
        </div>
        <div class="footer-column">
            <h3>Info Kontak</h3>
            <p><a href="mailto:tastyfood@gmail.com">tastyfood@gmail.com</a></p>
            <p><a href="tel:+6281234567890">+62 812 3456 7890</a></p>
            <p>Kota Bandung, Jawa Barat</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>Hak Cipta ©2023 Semua hak dilindungi undang-undang</p>
    </div>
</footer>

</body>
</html>

