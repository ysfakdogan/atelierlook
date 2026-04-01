<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Stilist | Persona</title>

@vite(['resources/css/app.css','resources/js/app.js'])

<style>

body{
    margin:0;
    padding:0;
}

/* 🔥 SCROLL ZORLA */
.spacer{
    height:150vh;
}

/* 🔥 HOME PREVIEW */
#home-preview{
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:white;

transform:translateY(-100%);
transition:transform 0.25s linear;

z-index:999;
}

</style>

</head>

<body class="bg-black text-white font-sans">

@include('partials.navbar')

<!-- 🔥 SCROLL OLUŞTUR -->
<div class="spacer"></div>

<!-- STILIST CONTENT -->

<section class="text-center">
<h1 class="text-6xl">STYLISTS</h1>
<p class="mt-4">Premium Collection</p>
</section>

<div class="spacer"></div>

<!-- 🔥 HOME PREVIEW -->

<div id="home-preview">

<section
class="relative w-full min-h-screen flex items-center justify-center bg-center bg-no-repeat"
style="background-image:url('/images/arka1.png'); background-size:95vh;"
>

<div class="absolute left-6 md:left-12 top-1/3 max-w-md text-black">
<h2 class="font-semibold mb-4 uppercase tracking-wide">İŞLER</h2>
<p class="text-sm">PERSONA’da her sezon yeni bir hikaye anlatır.</p>
</div>

<div class="absolute right-6 md:right-12 top-1/3 text-black">
<h3 class="font-semibold uppercase tracking-wide">SONBAHAR / KIŞ 2026</h3>
</div>

</section>

</div>

<script>

let progress = 0;
const preview = document.getElementById("home-preview");

window.addEventListener("wheel",(e)=>{

// 🔥 YUKARI SCROLL
if(e.deltaY < 0){

progress += 0.15;
progress = Math.min(progress,1);

preview.style.transform = `translateY(${-100 + progress*100}%)`;

if(progress >= 1){
window.location.href = "/";
}

}

// aşağı scroll → geri kapat
if(e.deltaY > 0){

progress -= 0.15;
progress = Math.max(progress,0);

preview.style.transform = `translateY(${-100 + progress*100}%)`;

}

});

</script>

</body>
</html>
