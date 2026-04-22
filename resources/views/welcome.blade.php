```html id="atelierlook_fullpage"
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>ATELIERLOOK</title>

<style>
:root{
--nav-h:80px;
}

*{
margin:0;
padding:0;
box-sizing:border-box;
}

html,body{
font-family:sans-serif;
background:#fff;
overflow-x:hidden;
}

/* SECTION */
.section{
width:100%;
}

/* HERO */
#home{
height:100vh;
padding-top:var(--nav-h);
background:url('/images/arka1.png') center/cover no-repeat;
position:relative;
overflow:hidden;
}

.hero-overlay{
position:absolute;
bottom:0;
width:100%;
height:30%;
background:linear-gradient(to top,rgba(0,0,0,.9),transparent);
}

.hero-content{
position:absolute;
top:50%;
left:50%;
transform:translate(-50%,-50%);
color:#fff;
text-align:center;
width:90%;
}

.hero-content h1{
font-size:clamp(48px,10vw,120px);
letter-spacing:12px;
font-weight:200;
}

.hero-content p{
margin-top:15px;
font-size:14px;
letter-spacing:3px;
opacity:.7;
}

.hero-btn{
display:inline-block;
margin-top:25px;
padding:12px 28px;
border:1px solid #fff;
color:#fff;
text-decoration:none;
font-size:12px;
letter-spacing:2px;
}

/* 🔥 INTRO */
.intro{
padding:120px 20px;
text-align:center;
font-size:20px;
max-width:800px;
margin:auto;
line-height:1.6;
}

/* 🔥 SERVICES */
.services{
padding:80px 20px;
text-align:center;
font-size:18px;
display:flex;
flex-direction:column;
gap:20px;
}

/* 🔥 TITLE */
.section-title{
font-size:28px;
padding:60px 20px 20px;
font-weight:600;
text-align:center;
}

/* GRID */
.look-grid{
display:grid;
grid-template-columns:repeat(4,1fr);
}

.look-grid img{
width:100%;
height:100%;
object-fit:cover;
display:block;
}

/* BAR */
.bar{
background:#000;
color:#fff;
padding:20px;
font-size:32px;
font-weight:700;
}

/* SLIDER */
.look-slider{
display:flex;
gap:10px;
overflow-x:auto;
padding:30px 20px;
cursor:grab;
user-select:none;
}

.look-slider.dragging{
cursor:grabbing;
}

.look-slider::-webkit-scrollbar{
display:none;
}

.product{
min-width:420px;
height:520px;
}

.product img{
width:100%;
height:100%;
object-fit:cover;
pointer-events:none;
}

/* 🎬 VIDEO */
.video-section{
width:100%;
height:70vh;
overflow:hidden;
background:#000;
position:relative;
display:flex;
align-items:flex-start;
}

.bg-video{
width:100%;
height:120%;
object-fit:cover;
transform:translateY(-10%);
}

/* VIDEO TEXT */
.video-overlay{
position:absolute;
top:50%;
left:50%;
transform:translate(-50%,-50%);
color:#fff;
font-size:40px;
letter-spacing:4px;
text-align:center;
}

/* 🔥 CTA */
.cta{
padding:120px 20px;
text-align:center;
}

.cta p{
font-size:22px;
margin-bottom:20px;
}

.cta a{
text-decoration:none;
border:1px solid #000;
padding:12px 30px;
font-size:14px;
}

/* MOBILE */
@media(max-width:768px){

:root{
--nav-h:70px;
}

.look-grid{
grid-template-columns:repeat(2,1fr);
}

.product{
min-width:260px;
height:340px;
}

.hero-content h1{
font-size:42px;
letter-spacing:6px;
}

.video-overlay{
font-size:24px;
}

}
</style>
</head>

<body>

@include('partials.navbar')

<!-- HERO -->
<section id="home" class="section">
<div class="hero-overlay"></div>

<div class="hero-content">
<h1>ATELIERLOOK</h1>
<p>Fashion Direction / Styling / Collection Development</p>
<a href="#" class="hero-btn">VIEW WORK</a>
</div>
</section>

<!-- INTRO -->
<section class="intro">
<p>
We shape visual identity through styling, casting and creative direction.<br>
Each project is built around narrative, silhouette and material.
</p>
</section>

<!-- SERVICES -->
<section class="services">
<p>Creative Direction</p>
<p>Styling</p>
<p>Lookbook Development</p>
<p>Campaign Production</p>
</section>

<!-- GET LOOK -->
<section id="getlook" class="section">

<h2 class="section-title">Selected Work</h2>

<div class="look-grid">
<a href="/get-the-look"><img src="/images/look1.jpg"></a>
<a href="/get-the-look"><img src="/images/look2.jpg"></a>
<a href="/get-the-look"><img src="/images/look3.jpg"></a>
<a href="/get-the-look"><img src="/images/look4.jpg"></a>
</div>

<div class="bar">GET THE LOOK</div>

<div class="look-slider" id="slider">
<div class="product"><img src="/images/p1.jpg"></div>
<div class="product"><img src="/images/p2.jpg"></div>
<div class="product"><img src="/images/p3.jpg"></div>
<div class="product"><img src="/images/p4.jpg"></div>
<div class="product"><img src="/images/p5.jpg"></div>
</div>

<!-- VIDEO -->
<section class="video-section">
  <video class="bg-video" autoplay muted loop playsinline>
    <source src="/videos/fashion.mp4" type="video/mp4">
  </video>

  <div class="video-overlay">
    <h2>New Visual Direction</h2>
  </div>
</section>

</section>

<!-- CTA -->
<section class="cta">
<p>Available for projects</p>
<a href="/contact">Contact</a>
</section>

<script>
const slider = document.getElementById('slider');

let isDown = false;
let startX;
let scrollLeft;
let velocity = 0;
let raf;

slider.addEventListener('mousedown', (e) => {
  isDown = true;
  slider.classList.add('dragging');
  startX = e.pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
  cancelAnimationFrame(raf);
});

slider.addEventListener('mouseleave', () => {
  isDown = false;
  slider.classList.remove('dragging');
});

slider.addEventListener('mouseup', () => {
  isDown = false;
  slider.classList.remove('dragging');
  inertia();
});

slider.addEventListener('mousemove', (e) => {
  if(!isDown) return;

  e.preventDefault();

  const x = e.pageX - slider.offsetLeft;
  const walk = x - startX;

  slider.scrollLeft = scrollLeft - walk;
  velocity = walk;
});

function inertia(){
  velocity *= 0.95;
  slider.scrollLeft -= velocity * 0.1;

  if(Math.abs(velocity) > 0.5){
    raf = requestAnimationFrame(inertia);
  }
}
</script>

</body>
</html>
```
