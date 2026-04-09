@extends('admin.layout')

@section('content')

<div class="p-10 w-full">

    <h1 class="text-2xl font-bold mb-8">
        Kampanya Mail Gönder
    </h1>

    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-3xl">

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 mb-6 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.mail.send') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- BAŞLIK -->
            <div>
                <label class="block mb-2 font-medium">Başlık</label>
                <input type="text" name="title" required class="w-full border p-3 rounded">
            </div>

            <!-- AÇIKLAMA -->
            <div>
                <label class="block mb-2 font-medium">Açıklama</label>
                <textarea name="description" class="w-full border p-3 rounded"></textarea>
            </div>

            <!-- GÖRSEL -->
            <div>
                <label class="block mb-2 font-medium">Banner Görsel</label>
                <input type="file" name="image" required class="w-full">
            </div>

            <!-- LİNK -->
            <div>
                <label class="block mb-2 font-medium">Buton Linki</label>
                <input type="text" name="link" class="w-full border p-3 rounded">
            </div>

            <!-- EMAIL -->
            <div>
                <label class="block mb-2 font-medium">Gönderilecek Email</label>
                <input type="email" name="email" required class="w-full border p-3 rounded">
            </div>

            <!-- BUTON -->
            <button class="bg-black text-white px-6 py-3 rounded">
                Kampanya Gönder
            </button>

        </form>

    </div>

</div>

@endsection
