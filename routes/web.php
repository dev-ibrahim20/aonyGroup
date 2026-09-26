<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomepageSettingsController;
use App\Http\Controllers\Admin\InvestmentPageController;
use App\Http\Controllers\Admin\ServicePageController;
use App\Http\Controllers\Admin\SocialLinksController;
use App\Models\SiteSetting;
use App\Models\InvestmentPageSetting;
use App\Models\ServicePageSetting;

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
    return view('landing', ['homepage' => SiteSetting::homepage()]);
})->name('landing');

// أقسام العوني العقارية
Route::get('/real-estate-investment', function () {
    return view('sections.real-estate-investment', [
        'investment' => InvestmentPageSetting::currentContent(),
    ]);
})->name('real-estate-investment');

Route::get('/real-estate-development', function () {
    return view('sections.managed-page', ['section' => 'real-estate-development', 'content' => ServicePageSetting::content('real-estate-development')]);
})->name('real-estate-development');

Route::get('/construction', function () {
    return view('sections.managed-page', ['section' => 'construction', 'content' => ServicePageSetting::content('construction')]);
})->name('construction');

Route::get('/real-estate-marketing', function () {
    return view('sections.managed-page', ['section' => 'real-estate-marketing', 'content' => ServicePageSetting::content('real-estate-marketing')]);
})->name('real-estate-marketing');

Route::get('/engineering-consultancy', function () {
    return view('sections.managed-page', ['section' => 'engineering-consultancy', 'content' => ServicePageSetting::content('engineering-consultancy')]);
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
    Route::get('/homepage', [HomepageSettingsController::class, 'edit'])->name('homepage.edit');
    Route::put('/homepage', [HomepageSettingsController::class, 'update'])->name('homepage.update');
    Route::get('/investment', [InvestmentPageController::class, 'edit'])->name('investment.edit');
    Route::put('/investment', [InvestmentPageController::class, 'update'])->name('investment.update');
    Route::get('/sections/{section}', [ServicePageController::class, 'edit'])->name('service-pages.edit');
    Route::put('/sections/{section}', [ServicePageController::class, 'update'])->name('service-pages.update');
    Route::get('/social-links', [SocialLinksController::class, 'edit'])->name('social-links.edit');
    Route::put('/social-links', [SocialLinksController::class, 'update'])->name('social-links.update');
});
