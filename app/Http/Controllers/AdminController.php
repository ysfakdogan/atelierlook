<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stylist;
use App\Models\Styling;
use App\Models\Visitor;
use App\Models\MailLog; // 🔥 EKLENDİ

class AdminController extends Controller
{
    public function dashboard()
    {
        // 🔥 ZİYARETÇİ İSTATİSTİKLERİ (AYNEN KALDI)
        $total = Visitor::count();
        $today = Visitor::whereDate('created_at', today())->count();
        $yesterday = Visitor::whereDate('created_at', today()->subDay())->count();

        // 🔥 MAIL İSTATİSTİKLERİ (YENİ)
        $mailLogs = MailLog::latest()->take(10)->get();

        $mailTotal = MailLog::count();
        $mailRead = MailLog::where('is_read', true)->count();
        $mailUnread = MailLog::where('is_read', false)->count();

        $openRate = $mailTotal > 0
            ? round(($mailRead / $mailTotal) * 100)
            : 0;

        return view('admin.dashboard', compact(
            'total',
            'today',
            'yesterday',
            'mailLogs',
            'mailTotal',
            'mailRead',
            'mailUnread',
            'openRate'
        ));
    }

    public function store(Request $request)
    {
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
        }

        if ($request->type === 'stylist') {
            Stylist::create([
                'image' => $imagePath
            ]);
        }

        if ($request->type === 'styling') {
            Styling::create([
                'image' => $imagePath
            ]);
        }

        return back();
    }
}
