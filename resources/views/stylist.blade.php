<!DOCTYPE html>
<html lang="tr">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>STYLIST</title>

<style>
* {
    box-sizing: border-box;
}

body {
    margin:0;
    font-family: Arial, sans-serif;
    background:black;
    color:white;
}

/* 🔥 SADECE NAVBAR SİYAH (KESİN ÇÖZÜM) */
.navbar,
.navbar * {
    background: black !important;
}

/* NAVBAR (partials ile uyumlu) */
.navbar {
    position: fixed;
    top:0;
    left:0;
    width:100%;
    padding:20px 30px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    z-index:9999;
}

.logo {
    color:white;
    text-decoration:none;
    letter-spacing:4px;
    font-size:14px;
}

.nav-links {
    display:flex;
    gap:30px;
}

.nav-links a {
    color:white;
    text-decoration:none;
    font-size:11px;
    letter-spacing:2px;
}

.nav-links a:visited {
    color:white;
}

/* CONTENT */
.container {
    padding-top:110px;
    padding-left:30px;
    padding-right:30px;
}

/* GRID */
.grid {
    display:grid;
    grid-template-columns:repeat(3, 1fr);
    gap:25px;
}

/* CARD */
.card {
    position:relative;
    width:100%;
    aspect-ratio: 3 / 4;
    overflow:hidden;
    cursor:pointer;
}

/* MEDIA */
.card img,
.card video {
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
}

/* ❌ HOVER BÜYÜME KALDIRILDI */
.card:hover img,
.card:hover video {
    transform:none;
}

/* ❌ VIEW TAMAMEN KALDIRILDI */
.card::after {
    content:"";
    display:none;
}

/* MOBILE */
@media(max-width:900px){
    .grid{
        grid-template-columns:repeat(2,1fr);
    }
}

@media(max-width:500px){
    .grid{
        grid-template-columns:1fr;
    }

    .container {
        padding-left:15px;
        padding-right:15px;
    }
}
</style>

</head>

<body>

@include('partials.navbar')

<div class="container">

    <div class="grid">

        @foreach($stylists as $stylist)

            @php
                $file = $stylist->image;
                $url = asset('storage/'.$file);
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            @endphp

            <div class="card">

                @if(in_array($ext, ['mp4','webm']))
                    <video autoplay muted loop playsinline>
                        <source src="{{ $url }}" type="video/{{ $ext }}">
                    </video>
                @else
                    <img src="{{ $url }}" alt="">
                @endif

            </div>

        @endforeach

    </div>

</div>

</body>
</html>
