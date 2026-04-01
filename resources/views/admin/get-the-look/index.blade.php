@extends('admin.layout')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold">Get The Look</h2>

    <button onclick="openModal()" class="bg-black text-white px-4 py-2 rounded hover:opacity-90">
        + Yeni Look
    </button>
</div>

<!-- TABLE -->
<div class="bg-white shadow rounded p-6">

    <table class="w-full text-left">
        <thead>
            <tr class="border-b text-sm text-gray-600">
                <th class="py-2">ID</th>
                <th class="py-2">Görsel</th>
                <th class="py-2">İşlem</th>
            </tr>
        </thead>

        <tbody>

            @forelse($looks as $look)
                <tr class="border-b hover:bg-gray-50 transition">

                    <td class="py-3 text-sm">{{ $look->id }}</td>

                    <td class="py-3">
                        <img src="{{ asset('storage/'.$look->image) }}"
                             class="w-16 h-16 object-cover rounded">
                    </td>

                    <td class="py-3 text-sm">
                        <form action="#" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="text-red-500 hover:underline">
                                Sil
                            </button>
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="3" class="py-6 text-center text-gray-500">
                        Henüz look eklenmedi.
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>

</div>

<!-- 🔥 MODAL -->
<div id="modal" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">

    <div class="bg-white p-6 rounded-xl w-full max-w-md relative shadow-lg">

        <button onclick="closeModal()"
                class="absolute top-3 right-3 text-gray-500 text-lg">
            ✕
        </button>

        <h3 class="text-lg font-semibold mb-4">Yeni Look Ekle</h3>

        <form action="{{ route('admin.getthelook.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- SADECE GÖRSEL -->
            <input type="file"
                   name="image"
                   required
                   class="w-full border p-2 mb-4 rounded">

            <button type="submit"
                    class="w-full bg-black text-white py-2 rounded hover:opacity-90">
                Kaydet
            </button>
        </form>

    </div>

</div>

<!-- JS -->
<script>
function openModal(){
    const modal = document.getElementById('modal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeModal(){
    const modal = document.getElementById('modal');
    modal.classList.remove('flex');
    modal.classList.add('hidden');
}

document.getElementById('modal').addEventListener('click', function(e){
    if(e.target === this){
        closeModal();
    }
});
</script>

@endsection
