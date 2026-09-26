<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// الصفحة الرئيسية - شاشة اختيار الأقسام
Route::get('/', function () {
    return view('landing');
})->name('landing');

// أقسام العوني العقارية
Route::get('/real-estate-investment', function () {
    return view('sections.real-estate-investment');
})->name('real-estate-investment');

Route::get('/real-estate-development', function () {
    return view('sections.real-estate-development');
})->name('real-estate-development');

Route::get('/construction', function () {
    return view('sections.construction');
})->name('construction');

Route::get('/real-estate-marketing', function () {
    return view('sections.real-estate-marketing');
})->name('real-estate-marketing');

Route::get('/engineering-consultancy', function () {
    return view('sections.engineering-consultancy');
})->name('engineering-consultancy');

// الأخبار والمقالات المنشورة
Route::get('/blog', function () {
    $posts = \App\Models\Blog::published()
        ->with('featuredImage')
        ->orderByDesc('published_at')
        ->paginate(9);

    return view('blog.index', compact('posts'));
})->name('blog.index');

Route::get('/blog/{slug}', function (string $slug) {
    $post = \App\Models\Blog::published()
        ->with('featuredImage')
        ->where('slug', $slug)
        ->firstOrFail();

    return view('blog.show', compact('post'));
})->name('blog.show');

require __DIR__ . '/auth.php';

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
