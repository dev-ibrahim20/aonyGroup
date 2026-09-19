<?php

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
