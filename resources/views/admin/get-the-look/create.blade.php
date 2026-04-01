<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Get The Look Ekle</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body{
            margin:0;
            font-family:Arial, Helvetica, sans-serif;
            background:#f8f8f8;
        }

        .container{
            max-width:600px;
            margin:80px auto;
            background:white;
            padding:40px;
            border-radius:10px;
            box-shadow:0 10px 30px rgba(0,0,0,0.05);
        }

        h1{
            margin-bottom:30px;
            font-size:22px;
            letter-spacing:2px;
        }

        input[type="text"],
        input[type="file"]{
            width:100%;
            padding:12px;
            margin-bottom:20px;
            border:1px solid #ddd;
            border-radius:6px;
        }

        button{
            width:100%;
            padding:14px;
            background:black;
            color:white;
            border:none;
            border-radius:6px;
            cursor:pointer;
            letter-spacing:1px;
        }

        button:hover{
            opacity:0.9;
        }

        .preview{
            margin-top:20px;
            text-align:center;
        }

        .preview img{
            max-width:100%;
            border-radius:8px;
        }

        .back{
            display:inline-block;
            margin-bottom:20px;
            text-decoration:none;
            color:black;
            font-size:14px;
        }

    </style>
</head>
<body>

<div class="container">

    <a href="{{ route('admin.getthelook') }}" class="back">← Geri Dön</a>

    <h1>GET THE LOOK EKLE</h1>

    {{-- HATA MESAJLARI --}}
    @if ($errors->any())
        <div style="margin-bottom:20px;color:red;">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('admin.getthelook.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" name="title" placeholder="Başlık (opsiyonel)">

        <input type="file" name="image" id="imageInput" required>

        <button type="submit">KAYDET</button>
    </form>

    {{-- GÖRSEL PREVIEW --}}
    <div class="preview" id="preview"></div>

</div>

<script>
    const input = document.getElementById('imageInput');
    const preview = document.getElementById('preview');

    input.addEventListener('change', function(){
        const file = this.files[0];

        if(file){
            const reader = new FileReader();

            reader.onload = function(e){
                preview.innerHTML = `<img src="${e.target.result}" />`;
            }

            reader.readAsDataURL(file);
        }
    });
</script>

</body>
</html>
