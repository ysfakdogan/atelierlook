@extends('admin.layout')

@section('content')

<h1 class="text-3xl font-bold mb-8">
    Atelier Look Dashboard
</h1>

<!-- 🔥 STATS CARDS -->
<div style="display:flex; gap:20px; flex-wrap:wrap;">

    <!-- TOPLAM -->
    <div style="flex:1; min-width:200px; background:#fff; padding:25px; border-radius:10px;">
        <div style="font-size:12px; color:#666; letter-spacing:1px;">
            TOPLAM ZİYARET
        </div>
        <div style="font-size:32px; margin-top:10px; color:#000;">
            {{ $total ?? 0 }}
        </div>
    </div>

    <!-- BUGÜN -->
    <div style="flex:1; min-width:200px; background:#fff; padding:25px; border-radius:10px;">
        <div style="font-size:12px; color:#666; letter-spacing:1px;">
            BUGÜN
        </div>
        <div style="font-size:32px; margin-top:10px; color:#000;">
            {{ $today ?? 0 }}
        </div>
    </div>

    <!-- DÜN -->
    <div style="flex:1; min-width:200px; background:#fff; padding:25px; border-radius:10px;">
        <div style="font-size:12px; color:#666; letter-spacing:1px;">
            DÜN
        </div>
        <div style="font-size:32px; margin-top:10px; color:#000;">
            {{ $yesterday ?? 0 }}
        </div>
    </div>

</div>

<!-- 🔥 MAIL STATS (YENİ EKLENDİ) -->
<div style="display:flex; gap:20px; flex-wrap:wrap; margin-top:30px;">

    <div style="flex:1; min-width:200px; background:#fff; padding:25px; border-radius:10px;">
        <div style="font-size:12px; color:#666;">TOPLAM MAİL</div>
        <div style="font-size:28px; margin-top:10px;">
            {{ $mailTotal ?? 0 }}
        </div>
    </div>

    <div style="flex:1; min-width:200px; background:#fff; padding:25px; border-radius:10px;">
        <div style="font-size:12px; color:#666;">OKUNAN</div>
        <div style="font-size:28px; margin-top:10px; color:green;">
            {{ $mailRead ?? 0 }}
        </div>
    </div>

    <div style="flex:1; min-width:200px; background:#fff; padding:25px; border-radius:10px;">
        <div style="font-size:12px; color:#666;">OKUNMAYAN</div>
        <div style="font-size:28px; margin-top:10px; color:red;">
            {{ $mailUnread ?? 0 }}
        </div>
    </div>

    <div style="flex:1; min-width:200px; background:#fff; padding:25px; border-radius:10px;">
        <div style="font-size:12px; color:#666;">AÇILMA ORANI</div>
        <div style="font-size:28px; margin-top:10px;">
            %{{ $openRate ?? 0 }}
        </div>
    </div>

</div>

<!-- 🔥 MAIL LOG TABLO (YENİ EKLENDİ) -->
<div style="margin-top:40px;">

    <div style="background:#fff; padding:25px; border-radius:10px;">

        <div style="font-size:14px; color:#666; margin-bottom:20px;">
            MAIL GÖNDERİMLERİ
        </div>

        <table style="width:100%; border-collapse:collapse;">

            <thead>
                <tr style="border-bottom:1px solid #eee;">
                    <th style="text-align:left; padding:10px;">Email</th>
                    <th style="text-align:left; padding:10px;">Tarih</th>
                    <th style="text-align:left; padding:10px;">Durum</th>
                </tr>
            </thead>

            <tbody>
                @foreach($mailLogs as $log)
                <tr style="border-bottom:1px solid #f2f2f2;">
                    <td style="padding:10px;">{{ $log->email }}</td>
                    <td style="padding:10px;">
                        {{ $log->created_at->format('d.m.Y H:i') }}
                    </td>
                    <td style="padding:10px;">
                        @if($log->is_read)
                            <span style="color:green;">👀 Okundu</span>
                        @else
                            <span style="color:#999;">📤 Gönderildi</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>

<!-- 🔥 ALT PANEL -->
<div style="margin-top:50px;">

    <div style="background:#fff; padding:25px; border-radius:10px;">
        <div style="font-size:14px; color:#666; margin-bottom:10px;">
            SİTE DURUMU
        </div>

        <div style="font-size:18px; color:#000;">
            Site aktif ve veri topluyor
        </div>
    </div>

</div>

<!-- 🔥 PERFORMANS PANELİ -->
<div style="margin-top:40px;">

    <div style="background:#fff; padding:25px; border-radius:10px;">

        <div style="font-size:14px; color:#666; margin-bottom:20px;">
            SİTE PERFORMANSI
        </div>

        <div style="display:flex; gap:20px; flex-wrap:wrap;">

            <div style="flex:1; min-width:150px;">
                <div style="font-size:12px; color:#999;">STYLIST</div>
                <div style="font-size:24px;">
                    {{ $stylistCount ?? 0 }}
                </div>
            </div>

            <div style="flex:1; min-width:150px;">
                <div style="font-size:12px; color:#999;">STYLING</div>
                <div style="font-size:24px;">
                    {{ $stylingCount ?? 0 }}
                </div>
            </div>

            <div style="flex:1; min-width:150px;">
                <div style="font-size:12px; color:#999;">LOOK</div>
                <div style="font-size:24px;">
                    {{ $lookCount ?? 0 }}
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
