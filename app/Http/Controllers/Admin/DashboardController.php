<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MailLog;

class DashboardController extends Controller
{
    public function index()
    {
        $mailLogs = MailLog::latest()->take(10)->get();

        return view('admin.dashboard', compact('mailLogs'));
    }
}
