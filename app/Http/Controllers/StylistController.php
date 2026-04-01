<?php

namespace App\Http\Controllers;

use App\Models\Stylist;
use App\Models\SiteView;

class StylistController extends Controller
{
    // 📋 STYLIST LİSTE
    public function index()
    {
        $view = SiteView::first();

        if ($view) {
            $view->increment('views');
        }

        $stylists = Stylist::latest()->get();

        return view('stylist', compact('stylists'));
    }

    // 🔍 DETAY SAYFA
    public function show($id)
    {
        $stylist = Stylist::findOrFail($id);

        return view('stylist-detail', compact('stylist'));
    }
}
