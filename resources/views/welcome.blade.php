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
html, body {
    margin: 0;
    padding: 0;
    overflow: hidden;
    font-family: sans-serif;
}

/* 🔥 FULLPAGE SYSTEM GERİ GELDİ */
.section {
    position: fixed;
    width: 100%;
    height: 100vh;
    top: 0;
    left: 0;
    transition: transform 0.7s ease;
}

#home { transform: translateY(0%); }
#getlook { transform: translateY(100%); }
#video { transform: translateY(200%); }
#message { transform: translateY(300%); }
#services { transform: translateY(400%); }
#cta { transform: translateY(500%); }

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

/* DİĞER SECTIONLAR (boş ama sistem çalışır) */
#getlook { background:black; }
#video { background:white; }
#message { background:black; }
#services { background:white; }
#cta { background:black; }

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

        <a href="javascript:void(0)" onclick="goTo(1)" class="hero-btn">VIEW WORK</a>
    </div>
</section>

<section id="getlook" class="section"></section>
<section id="video" class="section"></section>
<section id="message" class="section"></section>
<section id="services" class="section"></section>
<section id="cta" class="section"></section>

<script>
let current = 0;
const sections = document.querySelectorAll(".section");

function goTo(index) {
    current = index;

    sections.forEach((sec, i) => {
        sec.style.transform = `translateY(${(i - current) * 100}%)`;
    });
}

window.addEventListener("wheel", (e) => {
    if (e.deltaY > 0 && current < sections.length - 1) {
        goTo(current + 1);
    } else if (e.deltaY < 0 && current > 0) {
        goTo(current - 1);
    }
});
</script>

</body>
</html>
