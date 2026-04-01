<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\StylingController;
use App\Http\Controllers\StylistController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\StylistController as AdminStylistController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\SeoController;
use App\Models\Click;
use App\Models\Stylist;
use App\Models\Look;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

// 🌐 HOMEPAGE
Route::get('/', function () {

    $click = Click::first();

    if ($click) {
        $click->increment('count');
    }

    $stylists = Stylist::latest()->get();

    return view('welcome', compact('stylists'));

})->name('home');


// =====================================================
// 🔥 GET THE LOOK (FRONTEND) ✅ FINAL FIX
// =====================================================
Route::get('/get-the-look', function () {

    $looks = Look::latest()->get();

    return view('get-look', [
        'looks' => $looks
    ]);

})->name('getlook');


// =====================================================
// 🔥 STYLIST
// =====================================================
Route::get('/stylist', [StylistController::class, 'index'])->name('stylist');
Route::get('/stilist', [StylistController::class, 'index']);

Route::get('/stilist/{id}', [StylistController::class, 'show'])
    ->name('stylist.detail');


// =====================================================
// 🔥 STYLING
// =====================================================
Route::get('/styling', [StylingController::class, 'index'])
    ->name('styling');


// =====================================================
// 🔐 ADMIN LOGIN
// =====================================================
Route::get('/admin', [AuthController::class,'loginForm'])->name('admin.login');
Route::post('/admin', [AuthController::class,'login'])->name('admin.login.post');


// =====================================================
// 🔥 GLOBAL UPLOAD
// =====================================================
Route::post('/admin/upload', [UploadController::class, 'store'])
    ->name('admin.upload');


// =====================================================
// 🔥 IMAGE ROUTE
// =====================================================
Route::get('/image/{path}', function ($path) {
    return response()->file(storage_path('app/public/' . $path));
})->where('path', '.*');


// =====================================================
// 🔥 ADMIN PANEL
// =====================================================
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // =========================
    // STYLISTS
    // =========================
    Route::get('/stylists', [AdminStylistController::class,'index'])->name('stylist.index');
    Route::get('/stylists/create', [AdminStylistController::class,'create'])->name('stylist.create');
    Route::post('/stylists', [AdminStylistController::class,'store'])->name('stylist.store');
    Route::delete('/stylists/{id}', [AdminStylistController::class,'destroy'])->name('stylist.destroy');

    // =========================
    // STYLING
    // =========================
    Route::view('/styling', 'admin.styling')->name('styling');

    Route::get('/styling/create', function () {
        return view('admin.styling_create');
    })->name('styling.create');

    Route::post('/styling', function (\Illuminate\Http\Request $request) {

        $request->validate([
            'image' => 'required|image'
        ]);

        $path = $request->file('image')->store('stylings', 'public');

        \App\Models\Styling::create([
            'image' => $path
        ]);

        return redirect()->route('admin.styling');

    })->name('styling.store');

    // =========================
    // 🔥 GET THE LOOK (ADMIN)
    // =========================

    Route::get('/get-the-look', function () {

        $looks = Look::latest()->get();

        return view('admin.get-the-look.index', compact('looks'));

    })->name('getthelook');

    Route::post('/get-the-look', function (\Illuminate\Http\Request $request) {

        $request->validate([
            'image' => 'required|image'
        ]);

        $path = $request->file('image')->store('looks', 'public');

        Look::create([
            'image' => $path
        ]);

        return redirect()->route('admin.getthelook');

    })->name('getthelook.store');

    // =========================
    // SEO
    // =========================
    Route::get('/settings', [SeoController::class, 'index'])->name('settings');
    Route::post('/settings', [SeoController::class, 'store'])->name('settings.store');

    Route::get('/seo-settings', [SeoController::class, 'index'])->name('seo');
    Route::post('/seo-settings', [SeoController::class, 'store'])->name('seo.store');

});


// =====================================================
// 🔥 SITEMAP
// =====================================================
Route::get('/sitemap.xml', function () {

    $stylists = Stylist::all();

    return Response::view('sitemap', compact('stylists'))
        ->header('Content-Type', 'text/xml');

});
