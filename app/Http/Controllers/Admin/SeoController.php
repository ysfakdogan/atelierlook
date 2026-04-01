<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeoSetting;

class SeoController extends Controller
{
    // SAYFA
    public function index()
    {
        $seo = SeoSetting::first();

        return view('admin.seo', compact('seo'));
    }

    // KAYDET
    public function store(Request $request)
    {
        $seo = SeoSetting::first();

        if (!$seo) {
            SeoSetting::create($request->all());
        } else {
            $seo->update($request->all());
        }

        return back()->with('success', 'Kaydedildi');
    }
}
