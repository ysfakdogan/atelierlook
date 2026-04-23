<!DOCTYPE html>
<html lang="tr">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>GET THE LOOK</title>

@vite(['resources/css/app.css','resources/js/app.js'])

<style>
body{
    margin:0;
    background:black;
    font-family:sans-serif;
    color:white;
}

/* NAVBAR OVERRIDE (siyah tema) */
nav{
    background:black !important;
    color:white !important;
}

nav a{
    color:white !important;
}

/* HEADER */
.header{
    padding:120px 40px 40px;
}

.header h1{
    font-size:28px;
    letter-spacing:4px;
    font-weight:300;
}

.header p{
    font-size:12px;
    opacity:0.6;
    margin-top:8px;
}

/* 🔥 GRID (bozulmadı, sadece güçlendirildi) */
.grid{
    display:grid;
    grid-template-columns:repeat(3, minmax(0,1fr));
    gap:20px;
    padding:0 40px 40px;
    width:100%;
}

/* 🔥 CARD (yükseklik optimize edildi) */
.card{
    position:relative;
    height:70vh; /* 80vh → biraz küçülttük */
    overflow:hidden;
}

/* IMAGE */
.card img{
    width:100%;
    height:100%;
    object-fit:cover;
    object-position:center; /* 🔥 yeni: crop ortadan */
    transition:0.6s;
}

/* HOVER */
.card:hover img{
    transform:scale(1.05);
}

.card::after{
    content:"";
    position:absolute;
    inset:0;
    background:rgba(0,0,0,0.35);
    opacity:0;
    transition:0.4s;
}

.card:hover::after{
    opacity:1;
}

/* MOBILE */
@media(max-width:768px){
    .grid{
        grid-template-columns:1fr;
    }

    .card{
        height:50vh;
    }
}
</style>

</head>

<body>

{{-- ✅ NAVBAR --}}
@include('partials.navbar')

<!-- HEADER -->
<div class="header">
    <h1>GET THE LOOK</h1>
    <p>Explore curated styles and visual direction</p>
</div>

<!-- GRID -->
<div class="grid">

    @foreach($looks as $look)
        <div class="card">
            <img src="{{ asset('images/'.$look->image) }}">
        </div>
    @endforeach

</div>

</body>
</html>
