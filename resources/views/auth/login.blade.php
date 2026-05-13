<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>AtelierLook</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f5f5f5] flex items-center justify-center min-h-screen relative">

    <div class="w-[900px] h-[520px] bg-white rounded-2xl shadow-xl flex overflow-hidden">

        <!-- SOL -->
        <div class="w-1/2 h-full relative">
            <img src="/images/login.jpg" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/10"></div>
        </div>

        <!-- SAĞ -->
        <div class="w-1/2 flex items-center justify-center px-12">

            <div class="w-full max-w-sm">

                <div class="text-center mb-8">
                    <h1 class="text-[22px] tracking-[0.25em] font-semibold">
                        ATELIERLOOK
                    </h1>
                    <p class="text-gray-400 text-sm mt-1">
                        Admin Panel
                    </p>
                </div>

                <!-- 🔥 HATA MESAJI -->
                @if ($errors->any())
                    <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="text-xs text-gray-500 tracking-wide">
                            KULLANICI ADI
                        </label>
                        <input type="text" name="username"
                            class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-black"
                            placeholder="kullanıcı adı">
                    </div>

                    <div>
                        <label class="text-xs text-gray-500 tracking-wide">
                            ŞİFRE
                        </label>
                        <input type="password" name="password"
                            class="w-full mt-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-black"
                            placeholder="şifre">
                    </div>

                    <div class="flex justify-between items-center text-sm text-gray-500">
                        <label class="flex items-center gap-2">
                            <input type="checkbox" name="remember">
                            Beni hatırla
                        </label>
                        <span class="cursor-pointer">Şifremi unuttum</span>
                    </div>

                    <button class="w-full bg-black text-white py-3 rounded-lg mt-4 hover:opacity-90 transition">
                        GİRİŞ YAP
                    </button>

                </form>

            </div>
        </div>

    </div>

    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 text-gray-400 text-sm tracking-widest">
        ATELIERLOOK 2026 Tüm hakları saklıdır.
    </div>

</body>
</html>
