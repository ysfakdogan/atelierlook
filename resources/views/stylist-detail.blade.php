<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $stylist->name }} | Persona</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>
        body {
            margin: 0;
            font-family: sans-serif;
            background: #000;
            color: #fff;
        }

        .hero {
            height: 100vh;
            background: url('{{ asset('storage/'.$stylist->image) }}') center/cover no-repeat;
            position: relative;
        }

        .overlay {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 60px 30px;
            background: linear-gradient(to top, rgba(0,0,0,0.85), transparent);
        }

        .name {
            font-size: 40px;
            font-weight: bold;
        }

        .bio {
            margin-top: 10px;
            font-size: 16px;
            max-width: 600px;
            opacity: 0.8;
        }

        .back {
            position: absolute;
            top: 20px;
            left: 20px;
            color: white;
            text-decoration: none;
            font-size: 14px;
            opacity: 0.7;
        }
    </style>
</head>
<body>

    <!-- GERİ -->
    <a href="/stilist" class="back">← Geri</a>

    <!-- HERO -->
    <div class="hero">
        <div class="overlay">
            <div class="name">{{ $stylist->name }}</div>
            <div class="bio">{{ $stylist->bio }}</div>
        </div>
    </div>

</body>
</html>
