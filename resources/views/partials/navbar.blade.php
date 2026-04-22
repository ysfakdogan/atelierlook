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
padding:20px 20px; /* ✅ DÜZELTİLDİ */
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
    color: {{ $isDark ? 'white' : 'black' }};
    margin-left:auto;
    position:relative;
    z-index:100000;
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
    z-index:9999;
    ">

        <a href="/about" style="color: {{ $isDark ? 'white' : 'black' }}; text-decoration:none;">Hakkında</a>
        <a href="/stilist" style="color: {{ $isDark ? 'white' : 'black' }}; text-decoration:none;">Stylist</a>

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

                <a href="#" style="display:block; padding:10px;">Yapay Zeka Fotoğrafları</a>
                <a href="#" style="display:block; padding:10px;">Stüdyo</a>
                <a href="#" style="display:block; padding:10px;">Web Shoot</a>
                <a href="#" style="display:block; padding:10px;">Editöryal</a>
                <a href="#" style="display:block; padding:10px;">Sosyal Medya</a>

            </div>

        </div>

        <a href="/contact" style="color: {{ $isDark ? 'white' : 'black' }}; text-decoration:none;">Contact</a>

    </div>

</nav>

<style>
#menu a{
    text-decoration:none !important;
}
#menu a:hover{
    opacity:0.6;
}

#hamburger{
    display:none;
}

/* MOBILE */
@media(max-width:768px){

    #hamburger{
        display:block;
    }

    #menu{
        position:fixed;
        top:0;
        left:-100%;
        width:100%;
        height:100vh;
        background: inherit;
        flex-direction:column;
        align-items:flex-start;
        padding:80px 20px 20px; /* ✅ DÜZELTİLDİ */
        transition:0.3s;
        display:flex;
    }

    #menu.active{
        left:0;
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

    hamburger.addEventListener('click', function () {
        menu.classList.toggle('active');

        // 🔥 body scroll kilitle
        document.body.style.overflow =
            menu.classList.contains('active') ? 'hidden' : 'auto';
    });

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

    dropdown.addEventListener('click', function () {
        if(window.innerWidth <= 768){
            submenu.style.display =
                submenu.style.display === 'block' ? 'none' : 'block';
        }
    });

});
</script>
