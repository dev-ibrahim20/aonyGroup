<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomepageSettingsController;
use App\Http\Controllers\Admin\InvestmentPageController;
use App\Http\Controllers\Admin\ServicePageController;
use App\Http\Controllers\Admin\SocialLinksController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\UnitsController;
use App\Http\Controllers\Admin\LeadsController;
use App\Http\Controllers\ProjectController;
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

// Projects pages
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

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
    
    // Projects routes
    Route::prefix('projects')->name('projects.')->group(function () {
        Route::get('/', [ProjectsController::class, 'index'])->name('index');
        Route::get('/create', [ProjectsController::class, 'create'])->name('create');
        Route::post('/', [ProjectsController::class, 'store'])->name('store');
        Route::get('/{project}', [ProjectsController::class, 'show'])->name('show');
        Route::get('/{project}/edit', [ProjectsController::class, 'edit'])->name('edit');
        Route::put('/{project}', [ProjectsController::class, 'update'])->name('update');
        Route::delete('/{project}', [ProjectsController::class, 'destroy'])->name('destroy');
    });
    
    // Units routes
    Route::prefix('units')->name('units.')->group(function () {
        Route::get('/', [UnitsController::class, 'index'])->name('index');
        Route::get('/create', [UnitsController::class, 'create'])->name('create');
        Route::post('/', [UnitsController::class, 'store'])->name('store');
        Route::get('/{unit}', [UnitsController::class, 'show'])->name('show');
        Route::get('/{unit}/edit', [UnitsController::class, 'edit'])->name('edit');
        Route::put('/{unit}', [UnitsController::class, 'update'])->name('update');
        Route::delete('/{unit}', [UnitsController::class, 'destroy'])->name('destroy');
    });
    
    // Leads routes
    Route::prefix('leads')->name('leads.')->group(function () {
        Route::get('/', [LeadsController::class, 'index'])->name('index');
        Route::post('/', [LeadsController::class, 'store'])->name('store');
        Route::get('/{lead}', [LeadsController::class, 'show'])->name('show');
        Route::put('/{lead}', [LeadsController::class, 'update'])->name('update');
        Route::delete('/{lead}', [LeadsController::class, 'destroy'])->name('destroy');
    });
});
