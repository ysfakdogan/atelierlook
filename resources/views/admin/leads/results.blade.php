@extends('admin.layout')

@section('content')

<div class="p-6">

    <h1 class="text-2xl font-bold mb-6">
        Lead Sonuçları
    </h1>

    @if(isset($leads) && count($leads) > 0)

        <div class="grid gap-4">

            @foreach($leads as $lead)

                @php
                    $name = $lead['name'] ?? $lead['brand_name'] ?? $lead['title'] ?? 'İsim yok';
                    $website = $lead['website'] ?? $lead['url'] ?? $lead['link'] ?? null;
                    $platform = $lead['platform'] ?? 'web';
                    $username = $lead['username'] ?? null;

                    // 🔥 GÜÇLÜ SATIŞ MESAJI
                    $message = "Merhaba, markanızı inceledim gerçekten çok iyi 👍

Şu an bazı butiklere özel oversize t-shirt üretimi yapıyoruz.

Minimum adet düşük, fiyatlar piyasaya göre daha uygun.
İsterseniz size özel fiyat ve numune bilgisi paylaşabilirim 🙌";
                @endphp

                <div class="bg-white p-4 rounded-lg shadow">

                    <!-- İsim -->
                    <div class="font-semibold text-lg">
                        {{ $name }}
                    </div>

                    <!-- Website -->
                    @if(!empty($website))
                        <div class="text-sm mt-1">
                            <a href="{{ $website }}" target="_blank" class="text-blue-500 hover:text-blue-700 underline">
                                {{ $website }}
                            </a>
                        </div>
                    @endif

                    <!-- Platform -->
                    <div class="flex items-center gap-1 text-sm mt-1 text-gray-600">

                        @if($platform === 'instagram' || $platform === 'instagram_post')

                            <svg class="text-pink-600" xmlns="http://www.w3.org/2000/svg"
                                 width="16" height="16" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2">
                                <rect x="2" y="2" width="20" height="20" rx="5"/>
                                <path d="M16 11.37a4 4 0 1 1-4.37-4.37"/>
                            </svg>

                            <span>Instagram</span>

                        @else
                            <span>🌐</span>
                            <span>Web</span>
                        @endif

                    </div>

                    <!-- Followers -->
                    @if(!empty($lead['followers']))
                        <div class="text-xs text-gray-500 mt-1">
                            {{ $lead['followers'] }} takipçi
                        </div>
                    @endif

                    <!-- Temperature -->
                    <div class="text-sm mt-2">
                        @if(($lead['temperature'] ?? null) === 'hot')
                            <span class="bg-red-500 text-white px-2 py-1 rounded">🔥 Sıcak</span>
                        @elseif(($lead['temperature'] ?? null) === 'medium')
                            <span class="bg-yellow-400 text-black px-2 py-1 rounded">🟡 Orta</span>
                        @endif
                    </div>

                    <!-- 🔥 BUTONLAR -->
                    <div class="mt-3 flex gap-2 flex-wrap">

                        <!-- 🚀 TEK TUŞ DM -->
                        @if(!empty($website))
                            <button onclick="openDM('{{ $website }}', `{{ $message }}`)"
                                class="bg-purple-600 text-white px-3 py-1 rounded text-sm">
                                🚀 DM Gönder
                            </button>
                        @endif

                        <!-- Eski kopyala (yedek kalsın) -->
                        <button onclick="copyMessage(`{{ $message }}`)"
                            class="bg-blue-600 text-white px-3 py-1 rounded text-sm">
                            Mesaj Kopyala
                        </button>

                        <!-- Instagram Aç -->
                        @if($platform === 'instagram' || $platform === 'instagram_post')
                            <a href="{{ $website }}" target="_blank"
                               class="bg-pink-600 text-white px-3 py-1 rounded text-sm flex items-center gap-1">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     width="16" height="16" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2">
                                    <rect x="2" y="2" width="20" height="20" rx="5"/>
                                    <path d="M16 11.37a4 4 0 1 1-4.37-4.37"/>
                                </svg>

                                <span>Instagram Aç</span>
                            </a>
                        @endif

                    </div>

                    <!-- Kaydet -->
                    <form action="{{ route('admin.lead.store') }}" method="POST" class="mt-3">
                        @csrf

                        <input type="hidden" name="brand_name" value="{{ $name }}">
                        <input type="hidden" name="platform" value="{{ $platform }}">
                        <input type="hidden" name="url" value="{{ $website }}">
                        <input type="hidden" name="followers" value="{{ $lead['followers'] ?? 0 }}">
                        <input type="hidden" name="temperature" value="{{ $lead['temperature'] ?? 'cold' }}">

                        <button class="bg-black text-white px-3 py-1 rounded text-sm">
                            Kaydet
                        </button>
                    </form>

                </div>

            @endforeach

        </div>

    @else

        <div class="bg-white p-6 rounded shadow text-gray-500">
            Henüz lead bulunamadı.
        </div>

    @endif

</div>

<script>
function copyMessage(text) {
    navigator.clipboard.writeText(text);
    alert("Mesaj kopyalandı!");
}

function openDM(url, message) {
    navigator.clipboard.writeText(message);
    window.open(url, '_blank');
    alert("Mesaj kopyalandı, DM açıldı 🚀");
}
</script>

@endsection
