<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel</title>

@vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="flex bg-gray-100">

<!-- SIDEBAR -->
<aside class="w-64 bg-black text-white min-h-screen flex flex-col justify-between">

    <div>
        <div class="p-6 text-xl font-semibold border-b border-gray-800">
            ATELIER LOOK
        </div>

        <nav class="flex flex-col p-4 gap-2">

            <a href="{{ route('admin.dashboard') }}" class="hover:bg-gray-800 p-3 rounded">
                Dashboard
            </a>

            <a href="{{ route('admin.stylist.index') }}" class="hover:bg-gray-800 p-3 rounded">
                Stilist
            </a>

            <a href="{{ route('admin.styling') }}" class="hover:bg-gray-800 p-3 rounded">
                Styling
            </a>

            <a href="{{ route('admin.getthelook') }}" class="hover:bg-gray-800 p-3 rounded">
                GET THE LOOK
            </a>

            <a href="{{ route('admin.seo') }}" class="hover:bg-gray-800 p-3 rounded">
                Seo Ayarları
            </a>

            <!-- 🔥 MAIL PANEL -->
            <a href="{{ route('admin.mail') }}" class="hover:bg-gray-800 p-3 rounded">
                Mail Gönder
            </a>

            <!-- 🔍 MÜŞTERİ ARA -->
            <a href="/admin/leads" class="hover:bg-gray-800 p-3 rounded">
                Müşteri Ara
            </a>

            <!-- 📋 YENİ EKLENDİ -->
            <a href="/admin/leads-list" class="hover:bg-gray-800 p-3 rounded">
                Müşteri Listesi
            </a>

        </nav>
    </div>

    <div class="p-4 border-t border-gray-800">
        <a href="/logout" class="block text-center bg-red-600 py-2 rounded">
            Çıkış
        </a>
    </div>

</aside>

<!-- CONTENT -->
<div class="flex-1 flex flex-col min-h-screen">

    <!-- TOP BAR -->
    <div class="bg-white shadow px-6 py-4 flex justify-between items-center">
        <h1 class="text-lg font-semibold">Admin Panel</h1>

        <a href="{{ route('admin.stylist.create') }}" class="bg-black text-white px-4 py-2 rounded">
            + Ekle
        </a>
    </div>

    <!-- PAGE -->
    <div class="p-6 flex-1">
        @yield('content')
    </div>

</div>

</body>
</html>
