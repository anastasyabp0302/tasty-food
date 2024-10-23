<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Food</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .container {
            max-width: 1025px;
            margin-left: 25px;
            padding: 40px;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 40px 0;
            margin-left: 25px;
            margin-right: 550px;
        }
        .logo {
            font-weight: bold;
            font-size: 30px;
        }
        nav {
            display: flex;
            margin-left: 10px;
        }
        nav a {
            margin-right: 25px;
            text-decoration: none;
            color: black;
            font-size: 14px;
            text-transform: uppercase;
        

        }
        .content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px 0;
            position: relative;
        }
        .text-content {
            width: 50%;
        }
        .line {
            width: 10px;
            height: 2px;
            background-color: black;
            margin-bottom: 10px;
        }
        h1 {
            font-size: 48px;
            margin-left: 40px;
            line-height: 1.4;
        }
        p {
            margin: 40px 0;
        }
        .btn {
            display: inline-block;
            background-color: black;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            text-transform: uppercase;
        }
        .image-content {
            width: 60%;
            position: absolute;
            right: -450px;
            top: -290px;
        }
        .image-content img {
            width: 100%;
            border-radius: 50%;
        }
        .tentang-kami-content {
            text-align: center;
            padding: 50px;
            background-color: #fff;
        }

        .tentang-kami-content h2 {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .tentang-kami-content p {
            max-width: 800px;
            margin: 0 auto 40px;
            color: #555;
        }

        .bg-image-container {
            background-image: url('bg-tntang.png');
            background-size: cover;
            background-position: center;
            padding: 140px 0px;
            display: flex;
            justify-content: center;
            
            flex-direction: column;
        }

        .food-sections {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            gap: 10px;
            flex-wrap: wrap;
        }
        .food-item {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
            width: 250px;
            position: relative;
        }
        .food-item img {
            border-radius: 80%;
            width: 180px;
            height: 180px;
            object-fit: cover;
            position: absolute;
            top: -100px;
            left: 50%;
            transform: translateX(-50%);
        }
        .food-item h3 {
            margin-top: 80px;
            margin-bottom: 10px;
            font-size: 1.2em;
            font-weight: bold; 
        }
        .food-item p {
            font-size: 0.9em;
            color: #666;
        }
        
        button {
            padding: 10px 20px;
            background-color: black;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: grey;
        }
        .line {
          border-top: 3px solid #000;
          width: 150px;
          margin: 0 auto 20px;
        }

        #berita-kami {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        #berita-kami h2 {
            text-align: center;
            font-size: 2em;
            margin-bottom: 20px;
        }

        .berita-container {
            display: grid;
            grid-template-areas:
                "large large small1 small2"
                "large large small3 small4";
            grid-gap: 20px;
        }

        .berita-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .berita-card.large {
            grid-area: large;
        }

        .berita-card:nth-child(2) {
            grid-area: small1;
        }

        .berita-card:nth-child(3) {
            grid-area: small2;
        }

        .berita-card:nth-child(4) {
            grid-area: small3;
        }

        .berita-card:nth-child(5) {
            grid-area: small4;
        }

        .berita-card img {
            width: 100%;
            height: auto;
            max-height: 150px;
            object-fit: cover;
        }

        .berita-card.large img {
            max-height: 300px;
        }

        .berita-card-content {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .berita-card-content h3 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .berita-card-content p {
            color: #777;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .berita-card-content a {
            color: #ff6f61;
            text-decoration: none;
            font-weight: bold;
        }

        .berita-card-content a:hover {
            text-decoration: underline;
        }
        #gallery-kami {
            background-color: #ffffff; 
            padding: 20px; 
            margin: 20px 0; 
            border-radius: 8px; 
        }

        .gallery-container {
            width: 80%;
            max-width: 1200px;
            margin: 50px auto;
            text-align: center;
        }
        .gallery-container h2 {
            font-size: 2em;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 5px;
        }
        .gallery-item {
            position: relative;
            width: 100%;
            padding-bottom: 100%;
            border-radius: 10px;
            overflow: hidden;
        }
        .gallery-item img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .gallery-button {
            margin-top: 20px;
        }
        .gallery-button button {
            background-color: #000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }
        .gallery-button button:hover {
            background-color: #444;
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
  
<div class="container">
        <header>
            <div class="logo">TASTY FOOD</div>
            <nav>
                <a href="/">HOME</a>
                <a href="/tentang">TENTANG</a>
                <a href="/berita">BERITA</a>
                <a href="/gallery">GALERI</a>
                <a href="/kontak">KONTAK</a>
            </nav>
        </header>
        
        <div class="content">
            <div class="text-content">
                <div class="line"></div>
                <h1>HEALTHY<br><strong>TASTY FOOD</strong></h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.</p>
                <a href="#" class="btn">Tentang Kami</a>
            </div>
            <div class="image-content">
                <img src="img-4.png" alt="Tasty Food">
            </div>
        </div>
    </div>
    <div id="tentang-kami" class="tentang-kami-content">
        <h2>TENTANG KAMI</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.</p>
<div class="line"></div>
    </div>
    <div class="bg-image-container">
        <div class="food-sections">
            <div class="food-item">
                <img src="img-1.png" alt="Food 1">
                <h3>LOREM IPSUM</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo,</p>
            </div>
            <div class="food-item">
                <img src="img-2.png" alt="Food 2">
                <h3>LOREM IPSUM</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo,</p>
            </div>
            <div class="food-item">
                <img src="img-3.png" alt="Food 3">
                <h3>LOREM IPSUM</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo,</p>
            </div>
            <div class="food-item">
                <img src="img-4.png" alt="Food 4">
                <h3>LOREM IPSUM</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo,</p>
            </div>
        </div>
    </div>
<div id="berita-kami" class="berita-kami">
        <h2>BERITA KAMI</h2>
        <div class="background"></div>
        <div class="berita-container">
            <div class="berita-card large">
                <img src="brt-1.jpg" alt="Berita Image 1">
                <div class="berita-card-content">
                    <h3>LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit. Curabitur facilisis lectus vitae eros malesuada eleifend. Mauris eget tellus odio. Phasellus vestibulum turpis ac sem commodo, at posuere eros consequat.</p>
                    <a href="#">Baca selengkapnya</a>
                </div>
            </div>
            <div class="berita-card">
                <img src="brt-2.jpg" alt="Berita Image 2">
                <div class="berita-card-content">
                    <h3>LOREM IPSUM</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo,</p>
                    <a href="#">Baca selengkapnya</a>
                </div>
            </div>
            <div class="berita-card">
                <img src="brt-3.jpg" alt="Berita Image 3">
                <div class="berita-card-content">
                    <h3>LOREM IPSUM</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo,</p>
                    <a href="#">Baca selengkapnya</a>
                </div>
            </div>
            <div class="berita-card">
                <img src="brt-4.jpg" alt="Berita Image 4">
                <div class="berita-card-content">
                    <h3>LOREM IPSUM</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo,</p>
                    <a href="#">Baca selengkapnya</a>
                </div>
            </div>
            <div class="berita-card">
                <img src="brt-5.jpg" alt="Berita Image 5">
                <div class="berita-card-content">
                    <h3>LOREM IPSUM</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo,</p>
                    <a href="#">Baca selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
    <div id="gallery-kami">
    <div class="gallery-container">
        <h2>GALERI KAMI</h2>
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="glry1.jpg" alt="Food 1">
            </div>
            <div class="gallery-item">
                <img src="glry2.jpg" alt="Food 2">
            </div>
            <div class="gallery-item">
                <img src="glry3.jpg" alt="Food 3">
            </div>
            <div class="gallery-item">
                <img src="glry4.jpg" alt="Food 4">
            </div>
            <div class="gallery-item">
                <img src="glry5.jpg" alt="Food 5">
            </div>
            <div class="gallery-item">
                <img src="glry6.jpg" alt="Food 6">
            </div>
        </div>
        <div class="gallery-button">
            <button>LIHAT LEBIH BANYAK</button>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-column">
                <h3>Tasty Food</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <div class="footer-social">
                    <a href="#"><img src="001-facebook.png" alt="Facebook"></a>
                    <a href="#"><img src="002-twitter.png" alt="Twitter"></a>
                </div>
            </div>
            <div class="footer-column">
                <h3>Useful Links</h3>
                <a href="#">Blog</a>
                <a href="#">Hewan</a>
                <a href="#">Galeri</a>
                <a href="#">Testimonial</a>
            </div>
            <div class="footer-column">
                <h3>Privacy</h3>
                <a href="#">Karir</a>
                <a href="#">Tentang Kami</a>
                <a href="#">Kontak Kami</a>
                <a href="#">Servis</a>
            </div>
            <div class="footer-column">
                <h3>Contact Info</h3>
                <p><a href="mailto:tastyfood@gmail.com">tastyfood@gmail.com</a></p>
                <p><a href="tel:+6281234567890">+62 812 3456 7890</a></p>
                <p>Kota Bandung, Jawa Barat</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyright ©2023 All rights reserved</p>
        </div>
    </footer>
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>