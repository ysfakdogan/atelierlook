<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

use App\Http\Controllers\StylingController;
use App\Http\Controllers\StylistController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\StylistController as AdminStylistController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Admin\LeadSearchController;

use App\Models\Click;
use App\Models\Stylist;
use App\Models\Look;
use App\Models\MailLog;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/


Route::get('/test', function () {
    return 'OK TEST';
});

Route::get('/mail/open/{id}', function ($id) {

    $log = MailLog::find($id);

    if ($log && !$log->is_read) {
        $log->update([
            'is_read' => true,
            'read_at' => now()
        ]);
    }

    return response('OK', 200);

})->withoutMiddleware([\App\Http\Middleware\TrackVisitor::class]);

Route::get('/tracking/{id}', function ($id) {

    $log = MailLog::where('tracking_id', $id)->first();

    if ($log && !$log->is_read) {
        $log->update([
            'is_read' => true,
            'read_at' => now()
        ]);
    }

    $pixel = base64_decode(
        'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR4nGNgYAAAAAMAASsJTYQAAAAASUVORK5CYII='
    );

    return response($pixel)->header('Content-Type', 'image/png');

})->withoutMiddleware([\App\Http\Middleware\TrackVisitor::class]);

Route::get('/', function () {

    $click = Click::first();

    if ($click) {
        $click->increment('count');
    }

    $stylists = Stylist::latest()->get();

    return view('welcome', compact('stylists'));

})->name('home');

Route::get('/get-the-look', function () {

    $looks = Look::latest()->get();

    return view('get-look', compact('looks'));

})->name('getlook');

Route::get('/stylist', [StylistController::class, 'index'])->name('stylist');
Route::get('/stilist', [StylistController::class, 'index']);
Route::get('/stilist/{id}', [StylistController::class, 'show'])->name('stylist.detail');

Route::get('/styling', [StylingController::class, 'index'])->name('styling');

Route::get('/admin', [AuthController::class,'loginForm'])->name('admin.login');
Route::post('/admin', [AuthController::class,'login'])->name('admin.login.post');

Route::post('/admin/upload', [UploadController::class, 'store'])->name('admin.upload');

Route::get('/image/{path}', function ($path) {

    $file = storage_path('app/public/' . $path);

    if (!file_exists($file)) {
        abort(404);
    }

    return response()->file($file);

})->where('path', '.*');


// =====================================================
// 🔥 ADMIN PANEL
// =====================================================
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/mail', function () {
        return view('admin.mail');
    })->name('mail');

    Route::post('/mail/send', [MailController::class, 'send'])->name('mail.send');


    // =========================
    // 🔥 LEAD AV SİSTEMİ
    // =========================
    Route::get('/lead-search', [LeadSearchController::class, 'index'])->name('lead.search');
    Route::post('/lead-search', [LeadSearchController::class, 'search'])->name('lead.search.run');
    Route::post('/lead-store', [LeadSearchController::class, 'store'])->name('lead.store');


    // =========================
    // 🔥 ARAMA SAYFASI
    // =========================
    Route::get('/leads', [LeadSearchController::class, 'index'])->name('lead.list');


    // =========================
    // 🔥 CRM PANEL
    // =========================
    Route::get('/leads-list', [LeadSearchController::class, 'list'])
        ->name('lead.list.page');

    // 🔥 YENİ: SİLME
    Route::delete('/lead-delete/{id}', [LeadSearchController::class, 'destroy'])
        ->name('lead.delete');


    // =========================
    // STYLISTS
    // =========================
    Route::get('/stylists', [AdminStylistController::class,'index'])->name('stylist.index');
    Route::get('/stylists/create', [AdminStylistController::class,'create'])->name('stylist.create');
    Route::post('/stylists', [AdminStylistController::class,'store'])->name('stylist.store');
    Route::delete('/stylists/{id}', [AdminStylistController::class,'destroy'])->name('stylist.destroy');


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

    Route::get('/settings', [SeoController::class, 'index'])->name('settings');
    Route::post('/settings', [SeoController::class, 'store'])->name('settings.store');

    Route::get('/seo-settings', [SeoController::class, 'index'])->name('seo');
    Route::post('/seo-settings', [SeoController::class, 'store'])->name('seo.store');

});

Route::get('/sitemap.xml', function () {

    $stylists = Stylist::all();

    return Response::view('sitemap', compact('stylists'))
        ->header('Content-Type', 'text/xml');

});
