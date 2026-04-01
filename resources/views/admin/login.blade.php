<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin</title>

@vite(['resources/css/app.css'])

</head>

<body class="bg-white text-black min-h-screen flex">

<!-- 🔥 SOL -->
<div class="w-1/2 flex items-center justify-center">

    <h1 class="text-[22px] tracking-[0.6em] font-light">
        PERSONA
    </h1>

</div>


<!-- 🔥 SAĞ -->
<div class="w-1/2 flex items-center justify-center">

    <form method="POST" action="/admin" class="w-full max-w-md">
        @csrf

        <div class="mb-6">
            <input
                name="username"
                placeholder="USERNAME"
                class="w-full border-b border-gray-400 py-3 outline-none text-lg tracking-[0.3em]"
            >
        </div>

        <div class="mb-6">
            <input
                type="password"
                name="password"
                placeholder="PASSWORD"
                class="w-full border-b border-gray-400 py-3 outline-none text-lg tracking-[0.3em]"
            >
        </div>

        <button class="w-full border border-black py-3 tracking-[0.3em] text-sm hover:bg-black hover:text-white transition">
            LOGIN
        </button>

        @if(session('error'))
        <p class="text-red-500 text-sm mt-4">
            {{ session('error') }}
        </p>
        @endif

    </form>

</div>

</body>
</html>
