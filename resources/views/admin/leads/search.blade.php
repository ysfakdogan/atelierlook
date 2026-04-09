@extends('admin.layout')

@section('content')

<div class="p-6">

    <h1 class="text-2xl font-bold mb-6">
        🔍 Marka Avı (Instagram + Web)
    </h1>

    <div class="bg-white p-6 rounded-xl shadow">

        <form method="POST" action="{{ route('admin.lead.search.run') }}">
            @csrf

            <div class="flex gap-3">

                <input
                    type="text"
                    name="keyword"
                    placeholder="butik, streetwear, kadın giyim..."
                    class="w-full border p-3 rounded-lg"
                    required
                >

                <button class="bg-black text-white px-6 rounded-lg">
                    ARA
                </button>

            </div>

        </form>

        <p class="text-gray-500 mt-4 text-sm">
            Instagram ve web sitelerinde marka araması yapar
        </p>

    </div>

</div>

@endsection
