<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\UnitsController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('frontend.pages.home');
})->name('home');

// Language toggle route
Route::get('/lang/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'ar'])) {
        session()->put('locale', $lang);
        app()->setLocale($lang);
    }
    return redirect()->back();
})->name('lang.switch');

// Public export route
Route::get('/admin/leads/export', [App\Http\Controllers\Admin\LeadsController::class, 'export'])->name('admin.leads.export');

// Public routes for sitemap
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/units', [UnitsController::class, 'index'])->name('units.index');
Route::get('/units/{slug}', [UnitsController::class, 'show'])->name('units.show');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/contact', function () {
    return view('frontend.pages.contact');
})->name('contact');
Route::get('/about', function () {
    return view('frontend.pages.about');
})->name('about');
Route::get('/services', function () {
    return view('frontend.pages.services');
})->name('services');
Route::get('/portfolio', function () {
    return view('frontend.pages.portfolio');
})->name('portfolio');
Route::get('/careers', function () {
    return view('frontend.pages.careers');
})->name('careers');
Route::get('/faq', function () {
    return view('frontend.pages.faq');
})->name('faq');
Route::get('/testimonials', function () {
    return view('frontend.pages.testimonials');
})->name('testimonials');
Route::get('/privacy', function () {
    return view('frontend.pages.privacy');
})->name('privacy');
Route::get('/terms', function () {
    return view('frontend.pages.terms');
})->name('terms');

// API routes (outside auth middleware for JavaScript access)
Route::get('/api/projects/{project}/units', [App\Http\Controllers\Admin\UnitsController::class, 'getProjectUnits']);

// Test route for debugging
Route::get('/test-api/{id}', function ($id) {
    $project = \App\Models\Project::find($id);
    if (!$project) {
        return response()->json(['error' => 'Project not found'], 404);
    }
    
    $units = $project->units()->select('id', 'title_en', 'title_ar', 'price')->get();
    
    return response()->json([
        'success' => true,
        'project_id' => $project->id,
        'project_name' => $project->title_en,
        'units_count' => $units->count(),
        'units' => $units
    ]);
});

// Protected admin dashboard routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // Projects CRUD
    Route::get('/projects', [App\Http\Controllers\Admin\ProjectsController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [App\Http\Controllers\Admin\ProjectsController::class, 'create'])->name('projects.create');
    Route::post('/projects', [App\Http\Controllers\Admin\ProjectsController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}', [App\Http\Controllers\Admin\ProjectsController::class, 'show'])->name('projects.show');
    Route::get('/projects/{project}/edit', [App\Http\Controllers\Admin\ProjectsController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [App\Http\Controllers\Admin\ProjectsController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [App\Http\Controllers\Admin\ProjectsController::class, 'destroy'])->name('projects.destroy');
    Route::post('/projects/{project}/toggle-status', [App\Http\Controllers\Admin\ProjectsController::class, 'toggleStatus'])->name('projects.toggle-status');
    Route::post('/projects/{project}/toggle-featured', [App\Http\Controllers\Admin\ProjectsController::class, 'toggleFeatured'])->name('projects.toggle-featured');
    
    // Units CRUD
    Route::get('/units', [App\Http\Controllers\Admin\UnitsController::class, 'index'])->name('units.index');
    Route::get('/units/create', [App\Http\Controllers\Admin\UnitsController::class, 'create'])->name('units.create');
    Route::post('/units', [App\Http\Controllers\Admin\UnitsController::class, 'store'])->name('units.store');
    Route::get('/units/{unit}', [App\Http\Controllers\Admin\UnitsController::class, 'show'])->name('units.show');
    Route::get('/units/{unit}/edit', [App\Http\Controllers\Admin\UnitsController::class, 'edit'])->name('units.edit');
    Route::put('/units/{unit}', [App\Http\Controllers\Admin\UnitsController::class, 'update'])->name('units.update');
    Route::delete('/units/{unit}', [App\Http\Controllers\Admin\UnitsController::class, 'destroy'])->name('units.destroy');
    
    // Leads CRUD
    Route::get('/leads', [App\Http\Controllers\Admin\LeadsController::class, 'index'])->name('leads.index');
    Route::get('/leads/create', [App\Http\Controllers\Admin\LeadsController::class, 'create'])->name('leads.create');
    Route::post('/leads', [App\Http\Controllers\Admin\LeadsController::class, 'store'])->name('leads.store');
    Route::get('/leads/{lead}', [App\Http\Controllers\Admin\LeadsController::class, 'show'])->name('leads.show');
    Route::get('/leads/{lead}/edit', [App\Http\Controllers\Admin\LeadsController::class, 'edit'])->name('leads.edit');
    Route::put('/leads/{lead}', [App\Http\Controllers\Admin\LeadsController::class, 'update'])->name('leads.update');
    Route::delete('/leads/{lead}', [App\Http\Controllers\Admin\LeadsController::class, 'destroy'])->name('leads.destroy');
    Route::post('/leads/{lead}/update-status', [App\Http\Controllers\Admin\LeadsController::class, 'updateStatus'])->name('leads.update-status');
    
    // Blog CRUD
    Route::get('/blog', [App\Http\Controllers\Admin\BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/create', [App\Http\Controllers\Admin\BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog', [App\Http\Controllers\Admin\BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/{blog}', [App\Http\Controllers\Admin\BlogController::class, 'show'])->name('blog.show');
    Route::get('/blog/{blog}/edit', [App\Http\Controllers\Admin\BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{blog}', [App\Http\Controllers\Admin\BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{blog}', [App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('blog.destroy');
    Route::post('/blog/{blog}/toggle-status', [App\Http\Controllers\Admin\BlogController::class, 'toggleStatus'])->name('blog.toggle-status');
    Route::post('/blog/{blog}/toggle-featured', [App\Http\Controllers\Admin\BlogController::class, 'toggleFeatured'])->name('blog.toggle-featured');
    
    // Portfolio CRUD
    Route::get('/portfolio', [App\Http\Controllers\Admin\PortfolioController::class, 'index'])->name('portfolio.index');
    Route::get('/portfolio/create', [App\Http\Controllers\Admin\PortfolioController::class, 'create'])->name('portfolio.create');
    Route::post('/portfolio', [App\Http\Controllers\Admin\PortfolioController::class, 'store'])->name('portfolio.store');
    Route::get('/portfolio/{portfolio}', [App\Http\Controllers\Admin\PortfolioController::class, 'show'])->name('portfolio.show');
    Route::get('/portfolio/{portfolio}/edit', [App\Http\Controllers\Admin\PortfolioController::class, 'edit'])->name('portfolio.edit');
    Route::put('/portfolio/{portfolio}', [App\Http\Controllers\Admin\PortfolioController::class, 'update'])->name('portfolio.update');
    Route::delete('/portfolio/{portfolio}', [App\Http\Controllers\Admin\PortfolioController::class, 'destroy'])->name('portfolio.destroy');
    Route::post('/portfolio/{portfolio}/toggle-status', [App\Http\Controllers\Admin\PortfolioController::class, 'toggleStatus'])->name('portfolio.toggle-status');
    Route::post('/portfolio/{portfolio}/toggle-featured', [App\Http\Controllers\Admin\PortfolioController::class, 'toggleFeatured'])->name('portfolio.toggle-featured');
    Route::delete('/media/{media}/remove', [App\Http\Controllers\Admin\PortfolioController::class, 'removeGalleryImage'])->name('admin.media.remove');
    
    // Media Manager
    Route::get('/media', [App\Http\Controllers\Admin\MediaController::class, 'index'])->name('media.index');
    Route::post('/media/upload', [App\Http\Controllers\Admin\MediaController::class, 'upload'])->name('media.upload');
    Route::delete('/media/{media}', [App\Http\Controllers\Admin\MediaController::class, 'destroy'])->name('media.destroy');
    
    // Settings
    Route::get('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('settings');
    Route::post('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('settings.update');
});

// Search and Filtering Routes
Route::get('/search/projects', [App\Http\Controllers\SearchController::class, 'searchProjects'])->name('search.projects');
Route::get('/search/units', [App\Http\Controllers\SearchController::class, 'searchUnits'])->name('search.units');
Route::get('/search/global', [App\Http\Controllers\SearchController::class, 'globalSearch'])->name('search.global');
Route::get('/search/suggestions', [App\Http\Controllers\SearchController::class, 'getSearchSuggestions'])->name('search.suggestions');
Route::get('/search/filters', [App\Http\Controllers\SearchController::class, 'getFilterOptions'])->name('search.filters');

// SEO-friendly filter URLs
Route::get('/units/{filters?}', [App\Http\Controllers\SearchController::class, 'unitsByFilters'])->name('units.filtered');
Route::get('/projects/{filters?}', [App\Http\Controllers\SearchController::class, 'projectsByFilters'])->name('projects.filtered');

// SEO Routes
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');
Route::get('/sitemap', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap.xml');
Route::get('/robots.txt', [App\Http\Controllers\SitemapController::class, 'robots'])->name('robots.txt');

// Laravel Breeze authentication routes
require __DIR__.'/auth.php';
