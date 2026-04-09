@extends('admin.layout')

@section('content')

<div class="p-6">

    <!-- 🔥 SUCCESS MESAJ -->
    @if(session('success'))
        <div class="bg-green-500 text-white p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-2xl font-bold mb-6">
        Müşteri Listesi
    </h1>

    @if($leads->count() > 0)

        <div class="grid gap-4">

            @foreach($leads as $lead)

                <div class="bg-white p-4 rounded-lg shadow">

                    <div class="font-semibold text-lg">
                        {{ $lead->brand_name }}
                    </div>

                    @if($lead->profile_url)
                        <div class="text-sm mt-1">
                            <a href="{{ $lead->profile_url }}" target="_blank" class="text-blue-500 underline">
                                {{ $lead->profile_url }}
                            </a>
                        </div>
                    @endif

                    <div class="text-xs text-gray-400 mt-1">
                        {{ strtoupper($lead->platform) }}
                    </div>

                    <div class="text-xs text-gray-500 mt-1">
                        {{ $lead->followers }} takipçi
                    </div>

                    <div class="mt-2 text-sm">

                        @if($lead->temperature === 'hot')
                            <span class="bg-red-500 text-white px-2 py-1 rounded">
                                Sıcak
                            </span>

                        @elseif($lead->temperature === 'medium')
                            <span class="bg-yellow-400 text-black px-2 py-1 rounded">
                                Orta
                            </span>

                        @else
                            <span class="bg-gray-300 text-black px-2 py-1 rounded">
                                Zayıf
                            </span>
                        @endif

                    </div>

                    <div class="mt-2 text-xs text-gray-500">
                        Durum: {{ $lead->status }}
                    </div>

                    <!-- 🔥 SİL BUTONU -->
                    <form action="{{ route('admin.lead.delete', $lead->id) }}" method="POST" class="mt-3">
                        @csrf
                        @method('DELETE')

                        <button class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700">
                            Sil
                        </button>
                    </form>

                </div>

            @endforeach

        </div>

    @else

        <div class="bg-white p-6 rounded shadow text-gray-500">
            Henüz kayıtlı müşteri yok.
        </div>

    @endif

</div>

@endsection
