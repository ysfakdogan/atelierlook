@extends('admin.layout')

@section('content')

<div class="p-6 max-w-2xl">

    <h1 class="text-2xl font-semibold mb-6">
        SEO Ayarları
    </h1>

    {{-- SUCCESS MESAJI --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.seo.store') }}">
        @csrf

        <div class="bg-white p-6 rounded shadow">

            <!-- TITLE -->
            <div class="mb-4">
                <label class="block mb-1">Site Başlığı</label>
                <input
                    type="text"
                    name="title"
                    value="{{ $seo->title ?? '' }}"
                    class="w-full border p-2 rounded"
                >
            </div>

            <!-- DESCRIPTION -->
            <div class="mb-4">
                <label class="block mb-1">Açıklama</label>
                <textarea
                    name="description"
                    class="w-full border p-2 rounded"
                >{{ $seo->description ?? '' }}</textarea>
            </div>

            <!-- KEYWORDS -->
            <div class="mb-4">
                <label class="block mb-1">Keywords</label>
                <input
                    type="text"
                    name="keywords"
                    value="{{ $seo->keywords ?? '' }}"
                    class="w-full border p-2 rounded"
                >
            </div>

            <!-- OG TITLE -->
            <div class="mb-4">
                <label class="block mb-1">OG Title</label>
                <input
                    type="text"
                    name="og_title"
                    value="{{ $seo->og_title ?? '' }}"
                    class="w-full border p-2 rounded"
                >
            </div>

            <!-- OG DESCRIPTION -->
            <div class="mb-4">
                <label class="block mb-1">OG Description</label>
                <textarea
                    name="og_description"
                    class="w-full border p-2 rounded"
                >{{ $seo->og_description ?? '' }}</textarea>
            </div>

            <!-- OG IMAGE -->
            <div class="mb-4">
                <label class="block mb-1">OG Image URL</label>
                <input
                    type="text"
                    name="og_image"
                    value="{{ $seo->og_image ?? '' }}"
                    class="w-full border p-2 rounded"
                >
            </div>

            <button class="bg-black text-white px-4 py-2 rounded">
                Kaydet
            </button>

        </div>

    </form>

</div>

@endsection
