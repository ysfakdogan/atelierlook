@extends('admin.layout')

@section('content')

<div class="w-full">

    <h1 class="text-2xl font-semibold mb-6">Stilistler</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">

        @foreach($stylists as $stylist)
            <div class="bg-white rounded shadow overflow-hidden">

                <img src="/image/{{ $stylist->image }}" class="w-full h-64 object-cover">

                <div class="p-4 flex justify-between items-center">
                    <span>{{ $stylist->name }}</span>

                    <form action="{{ route('admin.stylist.destroy', $stylist->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">Sil</button>
                    </form>
                </div>

            </div>
        @endforeach

    </div>

</div>

@endsection
