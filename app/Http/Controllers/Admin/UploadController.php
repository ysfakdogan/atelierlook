<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stylist;
use App\Models\Styling;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'image' => 'required|image|max:2048'
        ]);

        // 📁 klasör seçimi
        $folder = $request->type === 'stylist' ? 'stylists' : 'stylings';

        // 📤 upload
        $path = $request->file('image')->store($folder, 'public');

        // 💾 DB kayıt
        if ($request->type === 'stylist') {
            Stylist::create([
                'image' => $path
            ]);
        } else {
            Styling::create([
                'image' => $path
            ]);
        }

        return back()->with('success', 'Yüklendi');
    }
}
