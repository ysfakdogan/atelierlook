<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stylist;
use App\Models\Styling;

class AdminController extends Controller
{
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
