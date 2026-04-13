<!DOCTYPE html>
<html lang="tr">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@php
    $seo = \App\Models\SeoSetting::first();
@endphp

<title>{{ $seo->title ?? 'ATELIERLOOK' }}</title>

<meta name="description" content="{{ $seo->description ?? '' }}">
<meta name="keywords" content="{{ $seo->keywords ?? '' }}">

<meta property="og:title" content="{{ $seo->og_title ?? '' }}">
<meta property="og:description" content="{{ $seo->og_description ?? '' }}">
<meta property="og:image" content="{{ $seo->og_image ?? '' }}">
<meta property="og:type" content="website">

@vite(['resources/css/app.css','resources/js/app.js'])

<style>
html {
    scroll-behavior: smooth;
}

html, body {
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    font-family: sans-serif;
}

/* ✅ FIXED SİSTEM KALDIRILDI */
.section {
    position: relative;
    width: 100%;
    min-height: 100vh;
}

/* HOME */
#home {
    background: url('/images/arka1.png') center center no-repeat;
    background-size: cover;
    position: relative;
    padding-top: 80px;
}

.hero-overlay {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 25%;
    background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
}

.hero-content {
    position: absolute;
    top: 55%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    text-align: center;
    width: 90%;
}

.hero-content h1 {
    font-size: clamp(28px, 8vw, 64px);
    letter-spacing: 8px;
    font-weight: 300;
    margin: 0;
}

.hero-content p {
    margin-top: 12px;
    font-size: clamp(12px, 3.5vw, 14px);
    letter-spacing: 2px;
    opacity: 0.75;
}

.hero-btn {
    display: inline-block;
    margin-top: 25px;
    padding: 12px 28px;
    border: 1px solid white;
    color: white;
    text-decoration: none;
    font-size: 12px;
    letter-spacing: 2px;
    transition: 0.3s;
}

.hero-btn:hover {
    background: white;
    color: black;
}

/* GET LOOK */
#getlook {
    background: black;
}

.look-section {
    width: 100%;
    min-height: 100vh;
    color: white;
    position: relative;
    padding-top: 100px;
}

.look-section h2 {
    position: absolute;
    top: 80px;
    left: 20px;
    font-size: 24px;
    letter-spacing: 3px;
}

.look-text {
    position: absolute;
    top: 120px;
    left: 20px;
    max-width: 300px;
    opacity: 0.6;
    line-height: 1.5;
    font-size: 12px;
}

.look-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    min-height: 100vh;
}

.look-card {
    position: relative;
    overflow: hidden;
    display: block;
}

.look-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.6s;
}

.look-card:hover img {
    transform: scale(1.08);
}

/* VIDEO */
#video {
    background: white;
    display: flex;
    flex-direction: column;
}

.video-wrap {
    position: relative;
    width: 100%;
    height: 40vh;
    overflow: hidden;
}

.video-wrap video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* MESSAGE */
#message {
    background:black;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    color:white;
    padding:60px 20px;
    min-height: 100vh;
}

/* SERVICES */
#services {
    background:white;
    color:black;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    padding:60px 20px;
    min-height: 100vh;
}

.services-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:30px;
    max-width:1000px;
    margin-top:40px;
}

/* CTA */
#cta {
    background:black;
    color:white;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
    min-height: 100vh;
}

/* MOBILE */
@media(max-width:768px){
    .look-grid { grid-template-columns:1fr; }
    .services-grid { grid-template-columns:1fr; }

    .hero-content {
        top: 50%;
    }
}
</style>

</head>

<body>

@include('partials.navbar')

<!-- HOME -->
<section id="home" class="section">
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <h1>ATELIERLOOK</h1>
        <p>Fashion Direction / Styling / Collection Development</p>

        <p style="margin-top:18px; opacity:0.6; max-width:500px; margin-left:auto; margin-right:auto; line-height:1.6;">
        Her look bir kombin değil, bir karakterdir.
        Biz sadece giydirmiyoruz — kimlik inşa ediyoruz.
        </p>

        <!-- ✅ FIX -->
        <a href="#getlook" class="hero-btn">VIEW WORK</a>
    </div>
</section>

<!-- BURADAN SONRA SENİN DİĞER SECTIONLARIN AYNI ŞEKİLDE DEVAM EDECEK -->

</body>
</html>
