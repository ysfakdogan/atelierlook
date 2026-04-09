<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="margin:0; font-family:Arial, sans-serif; background:#f5f5f5;">

<div style="max-width:600px; margin:auto; background:#ffffff;">

    <!-- LOGO / HEADER -->
    <div style="padding:20px; text-align:center; border-bottom:1px solid #eee;">
        <h2 style="margin:0; letter-spacing:2px;">ATELIER LOOK</h2>
    </div>

    <!-- GÖRSEL -->
    <img src="cid:banner" style="width:100%; display:block;">

    <!-- CONTENT -->
    <div style="padding:40px 30px; text-align:center;">

        <h1 style="font-size:26px; margin-bottom:15px;">
            {{ $data['title'] }}
        </h1>

        <p style="color:#666; font-size:15px; line-height:1.6;">
            {{ $data['description'] }}
        </p>

        @if($data['link'])
            <div style="margin-top:25px;">
                <a href="{{ $data['link'] }}"
                   style="background:#000; color:#fff; padding:14px 30px; text-decoration:none; font-size:14px; letter-spacing:1px;">
                    KEŞFET
                </a>
            </div>
        @endif

    </div>

    <!-- FOOTER -->
    <div style="padding:20px; text-align:center; font-size:12px; color:#999; border-top:1px solid #eee;">
        © {{ date('Y') }} Atelier Look — Tüm hakları saklıdır
    </div>

</div>

<!-- 🔥 TRACKING PIXEL -->
<img src="{{ $trackingUrl }}"
     width="1"
     height="1"
     style="display:none;">

</body>
</html>
