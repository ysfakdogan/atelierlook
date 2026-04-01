<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stylist;
use Illuminate\Support\Facades\Storage;

class StylistController extends Controller
{
    // 📋 LİSTE
    public function index()
    {
        $stylists = Stylist::latest()->get();

        return view('admin.stylists.index', compact('stylists'));
    }

    // ➕ CREATE
    public function create()
    {
        return view('admin.stylists.create');
    }

    // 💾 STORE (SADE - SADECE GÖRSEL / VİDEO)
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpg,jpeg,png,webp,mp4|max:20480'
        ]);

        // 🔥 DOSYAYI STORAGE'A KAYDET
        $path = $request->file('image')->store('stylists', 'public');

        // 🔥 SADECE IMAGE KAYDET
        Stylist::create([
            'image' => $path
        ]);

        return redirect()->route('admin.stylist.index')
            ->with('success', 'Yüklendi');
    }

    // ❌ SİL
    public function destroy($id)
    {
        $stylist = Stylist::findOrFail($id);

        // 🔥 DOSYAYI SİL
        if ($stylist->image && Storage::disk('public')->exists($stylist->image)) {
            Storage::disk('public')->delete($stylist->image);
        }

        $stylist->delete();

        return redirect()->route('admin.stylist.index')
            ->with('success', 'Silindi');
    }
}
