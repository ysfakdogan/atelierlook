<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CampaignMail;
use App\Models\Campaign;
use App\Models\MailLog; // ✅ EKLENDİ

class MailController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'email' => 'required|email'
        ]);

        // ✅ GÖRSEL KAYDET
        $path = $request->file('image')->store('campaigns', 'public');

        // ✅ CAMPAIGN KAYDET
        $campaign = Campaign::create([
            'title' => $request->title,
            'description' => $request->description ?? '',
            'image_path' => $path,
            'link' => $request->link ?? ''
        ]);

        // 🔥 MAIL LOG KAYDET (YENİ)
        $log = MailLog::create([
            'email' => $request->email,
            'subject' => $request->title,
        ]);

        // ✅ MAIL GÖNDER + LOG ID EKLE
        Mail::to($request->email)->send(
            new CampaignMail([
                'title' => $campaign->title,
                'description' => $campaign->description,
                'image' => $campaign->image_path,
                'link' => $campaign->link,
                'log_id' => $log->id // 🔥 KRİTİK
            ])
        );

        return back()->with('success', 'Kampanya gönderildi 🚀');
    }
}
