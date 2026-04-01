<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Persona</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100 flex">

    <!-- 🔥 SIDEBAR -->
    <div class="w-64 h-screen bg-black text-white flex flex-col">

        <div class="p-6 text-center border-b border-gray-800">
            <a href="/admin/dashboard">
                <h1 class="text-xl tracking-[0.4em] font-light hover:opacity-80 cursor-pointer">
                    PERSONA
                </h1>
            </a>
        </div>

        <div class="flex-1 p-4 space-y-3">
            <a href="/admin/stylists" class="block hover:bg-gray-800 p-2 rounded">Stylist</a>
            <a href="/admin/styling" class="block hover:bg-gray-800 p-2 rounded">Styling</a>
            <a href="#" class="block hover:bg-gray-800 p-2 rounded">SEO Ayarları</a>
            <a href="#" class="block hover:bg-gray-800 p-2 rounded">Kullanıcı Ayarları</a>
        </div>

        <div class="p-4 border-t border-gray-800">
            <a href="/admin" class="block text-red-400 hover:text-red-600">Çıkış Yap</a>
        </div>
    </div>

    <!-- 🔥 CONTENT -->
    <div class="flex-1">

        <div class="bg-white p-4 shadow">
            <h2 class="text-xl font-semibold">Medya Ekle</h2>
        </div>

        <div class="p-6 flex justify-center items-center min-h-[80vh]">

            <div class="bg-white p-6 rounded shadow max-w-xl w-full">

                <!-- SUCCESS -->
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- ERROR -->
                @if($errors->any())
                    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                        {{ $errors->first() }}
                    </div>
                @endif

                <!-- 🔥 SADE FORM -->
                <form action="{{ route('admin.stylist.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-6">
                        <label class="block mb-2 font-medium">
                            Görsel / Video Seç
                        </label>

                        <input type="file" name="image" required
                               class="w-full border p-2 rounded">
                    </div>

                    <div class="text-center">
                        <button type="submit"
                                class="bg-black text-white px-6 py-2 rounded hover:opacity-80">
                            Yükle
                        </button>
                    </div>

                </form>

            </div>

        </div>

    </div>

</body>
</html>
