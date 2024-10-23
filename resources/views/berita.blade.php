<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Food - Berita Kami</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background: url('bg-tentang2.png') no-repeat center;
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
            font-size: 1.2em;
            font-weight: bold;
        }

        .header-content {
            padding-top: 150px;
        }

        header h1 {
            font-size: 3em;
            margin: 0;
            text-transform: uppercase;
            font-weight: bold;
            margin-right: 70%;
        }

        main {
            padding: 50px;
            background-color: #f9f9f9;
        }

        .highlight-news {
            display: flex;
            justify-content: space-between;
            margin-bottom: 50px;
        }

        .highlight-news img {
            width: 50%;
            height: 450px;
            object-fit: cover;
            border-radius: 10px;
        }

        .highlight-news-content {
            width: 45%;
        }

        .highlight-news-content h2 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        .highlight-news-content p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .highlight-news-content a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .news-section {
            margin-top: 50px;
        }

        .news-section h2 {
            text-align: center;
            font-size: 2em;
            margin-bottom: 30px;
        }
        
        .news-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .news-card {
            width: calc(25% - 15px);
            background-color: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .news-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .news-card-content {
            padding: 15px;
        }

        .news-card-content h3 {
            margin: 0 0 10px 0;
            font-size: 1.2em;
        }

        .news-card-content p {
            margin: 0 0 10px 0;
            font-size: 0.9em;
            color: #666;
        }

        .news-card-content a {
            color: #000;
            text-decoration: none;
            font-weight: bold;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 40px 20px;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
        }

        .footer-about,
        .footer-links,
        .footer-privacy,
        .footer-contact {
            width: 23%;
        }

        .footer-links ul,
        .footer-privacy ul {
            list-style-type: none;
            padding: 0;
        }

        .footer-links ul li,
        .footer-privacy ul li {
            margin-bottom: 10px;
        }

        .footer-links ul li a,
        .footer-privacy ul li a {
            color: white;
            text-decoration: none;
        }

        .footer-links ul li a:hover,
        .footer-privacy ul li a:hover {
            text-decoration: underline;
        }

        .footer-social a img {
            width: 30px;
            margin-right: 10px;
        }

        .footer-bottom {
            background-color: #222;
            color: white;
            text-align: center;
            padding: 10px 0;
        }

        .footer-bottom p {
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">TASTY FOOD</div>
        <nav>
            <a href="/">HOME</a>
            <a href="tentang">TENTANG</a>
            <a href="/berita">BERITA</a>
            <a href="/user/gallery">GALERI</a>
            <a href="/kontak">KONTAK</a>
        </nav>
        <div class="header-content">
            <h1>BERITA KAMI</h1>
        </div>
    </header>

    <main>
        <section class="highlight-news">
            <img src="glry3.jpg" alt="Berita Utama">
            <div class="highlight-news-content">
                <h2>APA SAJA MAKANAN KHAS NUSANTARA?</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.</p>
                <a href="#">BACA SELENGKAPNYA</a>
            </div>
        </section>

        <section class="news-grid">
        <h2>Berita Lainnya</h2>
    <div class="news-grid">
    @foreach($news as $new)
    <div class="news-card">
        <img src="{{ asset('news-images/' . $new->image) }}" alt="{{ $new->title }}">
        <div class="news-card-content">
            <h3>{{ $new->title }}</h3>
            <p>{{ Str::limit($new->content, 100) }}</p>
            <a href="{{ route('berita.show', $new->id) }}" class="read-more">Baca Selengkapnya</a>
        </div>
    </div>
@endforeach
    </div>
</section>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-about">
                <h3>Tasty Food</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmad tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="footer-links">
                <h3>Usefull links</h3>
                <ul>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Hewan</a></li>
                    <li><a href="#">Galeri</a></li>
                    <li><a href="#">Testimonial</a></li>
                </ul>
            </div>
            <div class="footer-privacy">
                <h3>Privacy</h3>
                <ul>
                    <li><a href="#">Karir</a></li>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Kontak Kami</a></li>
                    <li><a href="#">Servis</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h3>Contact Info</h3>
                <p>Email: info@example.com</p>
                <p>Telepon: (123) 456-7890</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Tasty Food. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
