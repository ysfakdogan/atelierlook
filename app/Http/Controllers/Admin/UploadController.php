<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stylist;
use App\Models\Styling;
use App\Models\Look;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        // 🔥 NET DEBUG (her şeyi gör)
        // dump($request->all(), $request->files->all());

        $request->validate([
            'image' => 'nullable|file',
            'video' => 'nullable|file'
        ]);

        // TYPE default
        $type = $request->input('type', 'look');

        // klasör seçimi
        if ($type === 'stylist') {
            $folder = 'stylists';
        } elseif ($type === 'styling') {
            $folder = 'stylings';
        } else {
            $folder = 'looks';
        }

        // IMAGE
        $imagePath = null;
        if ($request->file('image')) {
            $imagePath = $request->file('image')->store($folder, 'public');
        }

        // 🔥 VIDEO (EN KRİTİK FIX)
        $videoPath = null;
        if ($request->file('video')) {
            $videoPath = $request->file('video')->store('videos', 'public');
        }

        // DB kayıt
        if ($type === 'stylist') {

            Stylist::create([
                'image' => $imagePath
            ]);

        } elseif ($type === 'styling') {

            Styling::create([
                'image' => $imagePath
            ]);

        } else {

            Look::create([
                'image' => $imagePath,
                'video' => $videoPath
            ]);
        }

        return back()->with('success', 'Yüklendi');
    }
}
