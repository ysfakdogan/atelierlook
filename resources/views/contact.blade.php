<!DOCTYPE html>
<html lang="tr">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Contact - ATELIERLOOK</title>

<style>
body{
    margin:0;
    font-family:Arial, sans-serif;
    background:black;
    color:white;
}

/* NAV */
.navbar{
    position:fixed;
    top:0;
    width:100%;
    padding:20px 40px;
    display:flex;
    justify-content:space-between;
    z-index:999;
}

.logo{
    letter-spacing:6px;
    font-weight:300;
    color:white;
    text-decoration:none;
}

/* HERO */
.contact{
    height:100vh;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    text-align:center;
}

.contact h1{
    font-size:42px;
    letter-spacing:6px;
    font-weight:300;
}

.contact p{
    margin-top:10px;
    opacity:0.7;
}

/* FORM */
.form{
    margin-top:40px;
    width:300px;
}

.form input,
.form textarea{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    background:transparent;
    border:1px solid white;
    color:white;
}

.form button{
    width:100%;
    padding:12px;
    background:white;
    color:black;
    border:none;
    cursor:pointer;
}

/* MOBILE */
@media(max-width:768px){
    .contact h1{
        font-size:28px;
    }
}
</style>

</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <a href="/" class="logo">ATELIERLOOK</a>
</div>

<!-- CONTACT -->
<div class="contact">

    <h1>CONTACT</h1>
    <p>Let’s work together</p>

    <form class="form">
        <input type="text" placeholder="Name">
        <input type="email" placeholder="Email">
        <textarea rows="4" placeholder="Message"></textarea>
        <button type="submit">SEND</button>
    </form>

</div>

</body>
</html>
