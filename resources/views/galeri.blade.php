<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - Tasty-Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: white;
        }
        header {
            background-image: url('/glry-img/bg-gallery.png');
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
            top: 30px;
            left: 40px;
        }
        nav {
            position: absolute;
            top: 40px;
            right: 40px;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 14px;
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

        .image-container {
            position: relative;
            background-color: white;
            padding: 10px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 800px;
            height: 400px;
            margin: auto;
            margin-top: 150px;
        }
        .image-container img {
            width: 100%;
            height: 125%;
            border-radius: 10px;
            object-fit: cover;
        }
        .navigation {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }
        .nav-button {
            border: none;
            font-size: 1.5em;
            font-weight: bold;
            cursor: pointer;
            color: black;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .gallery-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 8px;
            padding: 20px;
            max-width: 1000px;
            margin: 200px auto 100px auto;
        }
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            height: 200px;
        }
        .gallery-item img {
            width: 98%;
            height: 98%;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        .gallery-item img:hover {
            transform: scale(1.05);
        }

        footer {
            background-color: black;
            color: #fff;
            padding: 40px 0;
        }
        footer .container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 0 20px;
        }
        footer .footer-section {
            flex: 1;
            margin: 20px;
            min-width: 200px;
        }
        footer h2 {
            font-size: 18px;
            margin-bottom: 20px;
        }
        footer p,
        footer a,
        footer ul,
        footer li {
            color: #fff;
            text-decoration: none;
        }
        footer ul {
            list-style: none;
            padding: 0;
        }
        footer li {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        footer .icon {
            margin-right: 10px;
            width: 20px;
            height: 20px;
        }
        footer .social-icons {
            margin-top: 20px;
        }
        footer .social-icons a {
            display: inline-block;
            margin-right: 10px;
        }
        footer .social-icons img {
            width: 32px;
            height: 32px;
        }
        footer .footer-bottom {
            text-align: center;
            padding: 20px 0;
            background-color: black;
        }
        footer .footer-bottom p {
            margin: 0;
        }

    </style>
</head>
</body>
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
        <h2>GALERI KAMI</h2>
    </div>
</header>
   

    <div class="container">
        <div class="image-container">
            <img id="slider-image" src={{asset("glry2.jpg")}} alt="Galeri 1">
            <div class="navigation">
                <button class="nav-button" onclick="prevImage()">&#60;</button>
                <button class="nav-button" onclick="nextImage()">&#62;</button>
            </div>
        </div>
    </div>
    <script>
        const images = ["glry2.jpg", "glry1.jpg", "glry3.jpg", "glry4.jpg", "glry5.jpg", "glry6.jpg", "bg-tentang2.png"];
        let currentIndex = 0;

        function showImage(index) {
            const imgElement = document.getElementById('slider-image');
            imgElement.src = images[index];
        }

        function prevImage() {
            currentIndex = (currentIndex === 0) ? images.length - 1 : currentIndex - 1;
            showImage(currentIndex);
        }

        function nextImage() {
            currentIndex = (currentIndex === images.length - 1) ? 0 : currentIndex + 1;
            showImage(currentIndex);
        }
    </script>

    <div class="gallery-container">
        @foreach ($galleries as $gallery)
        <div class="gallery-item">
            <img src="{{ asset("gallery-images/$gallery->image") }}" alt="Gallery Image">
        </div>
        @endforeach
    </div>



<footer>
    <div class="container">
        <div class="footer-section">
            <h2>TASTY FOOD</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <div class="social-icons">
                <a href="#"><img src="001-facebook.png" alt="Facebook"></a>
                <a href="#"><img src="002-twitter.png" alt="Twitter"></a>
            </div>
        </div>
        <div class="footer-section">
            <h2>Useful Links</h2>
            <ul>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Hewan</a></li>
                <li><a href="#">Galeri</a></li>
                <li><a href="#">Testimonial</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h2>Privacy</h2>
            <ul>
                <li><a href="#">Karir</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Kontak Kami</a></li>
                <li><a href="#">Servis</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h2>Contact Info</h2>
            <ul>
                <li><a href="mailto:tastyfood@gmail.com"><img src="pesan.png" alt="Email" class="icon">tastyfood@gmail.com</a></li>
                <li><a href="tel:+6281234567890"><img src="telp.png" alt="Phone" class="icon">+62 812 3456 7890</a></li>
                <li><a href="#"><img src="lokasi.png" alt="Location" class="icon">Kota Bandung, Jawa Barat</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>Copyright ©2023 All rights reserved</p>
    </div>
</footer>


    </body>
</html>
