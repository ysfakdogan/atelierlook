<?php

namespace App\Http\Controllers;

use App\Models\Stylist;

class StylingController extends Controller
{
    public function index()
    {
        $stylists = Stylist::all();

        return view('styling', compact('stylists'));
    }
}
