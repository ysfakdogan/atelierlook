@extends('layout')

@section('content')

<!-- HERO -->
<section class="py-20 text-center">
    <h1 class="text-3xl md:text-5xl font-light tracking-[6px]">
        STYLISTS
    </h1>
</section>

<!-- GRID -->
<section class="px-6 md:px-16 pb-20">

    @if($stylists->isEmpty())
        <div class="text-center text-gray-400 py-32">
            Henüz stilist eklenmemiş.
        </div>
    @else

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @foreach($stylists as $item)

                <div class="group overflow-hidden">

                    <!-- IMAGE -->
                    <img src="{{ asset('storage/' . $item->image) }}"
                         class="w-full h-[300px] object-cover transition duration-500 group-hover:scale-110">

                </div>

            @endforeach

        </div>

    @endif

</section>

@endsection
