@extends('admin.layout')

@section('content')

<h1 class="text-2xl font-semibold mb-8">
    Styling Ekle
</h1>

<form action="{{ route('admin.styling.store') }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-6">

    @csrf

    <!-- FOTOĞRAF -->
    <div>
        <label class="block mb-2 text-sm text-gray-600">
            Görsel Yükle
        </label>

        <input type="file" name="image" class="w-full border p-3 rounded-lg">
    </div>

    <!-- KAYDET -->
    <button class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800">
        Kaydet
    </button>

</form>

@endsection
