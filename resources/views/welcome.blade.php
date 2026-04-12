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
    overflow-x: hidden;
    font-family: sans-serif;
}

.section {
    position: fixed;
    width: 100%;
    height: 100vh;
    height: 100dvh;
    top: 0;
    left: 0;
    transition: transform 0.7s ease;
}

/* HOME */
#home {
    transform: translateY(0%);
    background: url('/images/arka1.png') center center no-repeat;
    background-size: cover;
    position: relative;
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
    bottom: 80px;
    left: 50%;
    transform: translateX(-50%);
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
    transform: translateY(100%);
    background: black;
}

.look-section {
    width: 100%;
    height: 100%;
    color: white;
    position: relative;
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
    height: 100%;
}

.look-card {
    position: relative;
    overflow: hidden;
    display: block;
    height: 100%;
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
    transform: translateY(200%);
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
    transform: translateY(300%);
    background:black;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    color:white;
    padding:20px;
}

/* SERVICES */
#services {
    transform: translateY(400%);
    background:white;
    color:black;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    padding:60px 20px;
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
    transform: translateY(500%);
    background:black;
    color:white;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
}

/* MOBILE */
@media(max-width:768px){
    .look-grid { grid-template-columns:1fr; }
    .services-grid { grid-template-columns:1fr; }
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

        <a href="javascript:void(0)" class="hero-btn" onclick="goTo(1)">VIEW WORK</a>
    </div>
</section>

<!-- GET LOOK -->
<section id="getlook" class="section">
<div class="look-section">
<h2>GET THE LOOK</h2>

<p class="look-text">
Seçtiğin her look, profesyonel stilistler tarafından hazırlanır.
Hazır kombin değil — direkt uygulanabilir stil.
</p>

<div class="look-grid">
<a href="{{ route('getlook') }}" class="look-card"><img src="/images/look1.jpg"></a>
<a href="{{ route('getlook') }}" class="look-card"><img src="/images/look2.jpg"></a>
<a href="{{ route('getlook') }}" class="look-card"><img src="/images/look3.jpg"></a>
<a href="{{ route('getlook') }}" class="look-card"><img src="/images/look4.jpg"></a>
</div>
</div>
</section>

<!-- VIDEO -->
<section id="video" class="section">
<div class="video-wrap">
<video autoplay muted loop playsinline>
<source src="{{ asset('videos/fashion.mp4') }}">
</video>
</div>
</section>

<!-- MESSAGE -->
<section id="message" class="section">
<div>
<h2>BİR LOOK SATIN ALMAZSIN<br>BİR DURUŞ SATIN ALIRSIN</h2>
<p style="max-width:600px; margin:20px auto; opacity:0.7;">
Her stil, bir duruşu ve karakteri yansıtır.
</p>
</div>
</section>

<!-- SERVICES -->
<section id="services" class="section">
<h2>HİZMETLER</h2>
<div class="services-grid">
<div><h3>KİŞİSEL STYLING</h3></div>
<div><h3>EDİTORYAL STYLING</h3></div>
<div><h3>KREATİF DİREKSİYON</h3></div>
<div><h3>DANIŞMANLIK</h3></div>
</div>
</section>

<!-- CTA -->
<section id="cta" class="section">
<h2>STİLİNİ YENİDEN YAZ</h2>
<a href="/contact" style="margin-top:30px;padding:14px 30px;border:1px solid white;color:white;text-decoration:none;">
İLETİŞİME GEÇ
</a>
</section>

<script>
let current = 0;
const sections = document.querySelectorAll(".section");
let isScrolling = false;

function goTo(i){
    if(isScrolling) return;
    isScrolling = true;
    current = i;
    sections.forEach((s, index)=>{
        s.style.transform = `translateY(${(index - i) * 100}%)`;
    });
    setTimeout(()=> isScrolling = false, 800);
}

window.addEventListener("wheel", e => {
    if(isScrolling) return;
    if(e.deltaY > 0){
        if(current < 5) goTo(current + 1);
    } else {
        if(current > 0) goTo(current - 1);
    }
}, { passive:true });

let startY = 0;

window.addEventListener("touchstart", e => {
    startY = e.touches[0].clientY;
});

window.addEventListener("touchend", e => {
    let endY = e.changedTouches[0].clientY;
    if(startY - endY > 50 && current < 5) current++;
    else if(endY - startY > 50 && current > 0) current--;
    goTo(current);
});
</script>

</body>
</html>
