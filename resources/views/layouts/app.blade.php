<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Persona</title>

<style>
body {
    margin:0;
    font-family: Arial, sans-serif;
}

/* NAVBAR */
.navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 40px;
    background: rgba(255,255,255,0.9);
    backdrop-filter: blur(10px);
}

/* MENU */
.menu {
    display: flex;
    gap: 30px;
    align-items: center;
    font-size: 12px;
    letter-spacing: 2px;
    text-transform: uppercase;
}

/* DROPDOWN */
.dropdown {
    position: relative;
    cursor: pointer;
}

.dropdown-menu {
    display: none;
    position: absolute;
    top: 30px;
    left: 0;
    background: white;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border-radius: 6px;
    min-width: 200px;
}

/* ITEMS */
.dropdown-menu a {
    display: block;
    padding: 10px 15px;
    color: black;
    text-decoration: none;
}

.dropdown-menu a:hover {
    background: #f5f5f5;
}

/* HOVER AÇILMA */
.dropdown:hover .dropdown-menu {
    display: block;
}
</style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">

    <div>PERSONA</div>

    <div class="menu">

        <a href="/about">About</a>
        <a href="/stilist">Stilist</a>

        <!-- DROPDOWN -->
        <div class="dropdown">
            <span>Creative Director</span>

            <div class="dropdown-menu">
                <a href="#">Yapay Zeka Fotoğraflar</a>
                <a href="#">Stüdyo</a>
                <a href="#">Web Shoot</a>
                <a href="#">Editöryal</a>
                <a href="#">Sosyal Medya</a>
                <a href="#">Creative</a>
            </div>
        </div>

        <a href="/contact">Contact</a>

    </div>

</nav>

<!-- CONTENT -->
<div style="margin-top:100px; padding:40px;">
    @yield('content')
</div>

</body>
</html>
