@php
    $isDark = request()->is('stilist') || request()->is('stylist') || request()->is('getlook');
@endphp

<nav style="
position:fixed;
top:0;
left:0;
width:100%;
z-index:99999;
background: {{ $isDark ? 'black' : 'white' }};
display:flex;
justify-content:space-between;
align-items:center;
padding:20px 20px;
box-shadow:0 2px 10px rgba(0,0,0,0.05);
">

    <!-- LOGO -->
    <a href="/" style="
    font-size:20px;
    letter-spacing:5px;
    text-decoration:none;
    color: {{ $isDark ? 'white' : 'black' }};
    font-weight:300;
    ">
        ATELIERLOOK
    </a>

    <!-- HAMBURGER -->
    <div id="hamburger" style="
    font-size:22px;
    cursor:pointer;
    display:none;
    color: {{ $isDark ? 'white' : 'black' }};
    ">
        ☰
    </div>

    <!-- MENU -->
    <div id="menu" style="
    display:flex;
    align-items:center;
    gap:30px;
    font-size:12px;
    letter-spacing:2px;
    text-transform:uppercase;
    ">

        <a href="/about" style="color: {{ $isDark ? 'white' : 'black' }}; text-decoration:none;">Hakkında</a>
        <a href="/stilist" style="color: {{ $isDark ? 'white' : 'black' }}; text-decoration:none;">Stylist</a>

        <!-- DROPDOWN -->
        <div id="dropdown" style="position:relative;">

            <span style="cursor:pointer; color: {{ $isDark ? 'white' : 'black' }};">
                Creative Director
            </span>

            <div id="submenu" style="
                display:none;
                position:absolute;
                top:100%;
                left:0;
                background: {{ $isDark ? 'black' : 'white' }};
                box-shadow:0 10px 30px rgba(0,0,0,0.2);
                border-radius:6px;
                min-width:200px;
            ">

                <a href="#" style="display:block; padding:10px; color: {{ $isDark ? 'white' : 'black' }}; text-decoration:none;">Yapay Zeka Fotoğrafları</a>
                <a href="#" style="display:block; padding:10px; color: {{ $isDark ? 'white' : 'black' }}; text-decoration:none;">Stüdyo</a>
                <a href="#" style="display:block; padding:10px; color: {{ $isDark ? 'white' : 'black' }}; text-decoration:none;">Web Shoot</a>
                <a href="#" style="display:block; padding:10px; color: {{ $isDark ? 'white' : 'black' }}; text-decoration:none;">Editöryal</a>
                <a href="#" style="display:block; padding:10px; color: {{ $isDark ? 'white' : 'black' }}; text-decoration:none;">Sosyal Medya</a>

            </div>

        </div>

        <a href="/contact" style="color: {{ $isDark ? 'white' : 'black' }}; text-decoration:none;">Contact</a>

    </div>

</nav>

<style>
/* ALT ÇİZGİYİ TAMAMEN KALDIR */
#menu a,
#menu a:visited,
#menu a:hover {
    text-decoration: none !important;
}

/* HOVER */
#menu a:hover {
    opacity: 0.6;
}

/* MOBILE */
@media(max-width:768px){

    #hamburger{
        display:block;
    }

    #menu{
        position:absolute;
        top:70px;
        left:0;
        width:100%;
        background: inherit;
        flex-direction:column;
        align-items:flex-start;
        padding:20px;
        display:none;
    }

    #menu a{
        padding:10px 0;
        width:100%;
    }

    #submenu{
        position:static !important;
        box-shadow:none !important;
    }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const hamburger = document.getElementById('hamburger');
    const menu = document.getElementById('menu');
    const dropdown = document.getElementById('dropdown');
    const submenu = document.getElementById('submenu');

    // MOBILE MENU
    hamburger.addEventListener('click', function () {
        menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
    });

    // DESKTOP HOVER
    dropdown.addEventListener('mouseenter', () => {
        if(window.innerWidth > 768){
            submenu.style.display = 'block';
        }
    });

    dropdown.addEventListener('mouseleave', () => {
        if(window.innerWidth > 768){
            submenu.style.display = 'none';
        }
    });

    // MOBILE CLICK
    dropdown.addEventListener('click', function () {
        if(window.innerWidth <= 768){
            submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
        }
    });

});
</script>
