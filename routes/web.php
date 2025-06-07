<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

Route::get('/courses', function () {
    return Inertia::render('Courses');
})->name('formations');

Route::get('/blog', function () {
    return Inertia::render('Blog');
})->name('blog');

Route::get('/politicy-config', function () {
    return Inertia::render('PoliticyConfig');
})->name('politicy-config');

Route::get('/cgu', function () {
    return Inertia::render('CguConfig');
})->name('cgu');

Route::get('/support-config', function () {
    return Inertia::render('SupportConfig');
})->name('support-config');

// Ajout des nouvelles pages
Route::get('/faq-config', function () {
    return Inertia::render('FaqConfig');
})->name('faq-config');

Route::get('/concept-logo', function () {
    return Inertia::render('ConceptLogo');
})->name('concept-logo');



// Le middleware 'admin' vérifie que Auth::user()->usertype === env('ADMIN_USERTYPE')
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard-admin', function () {
        return Inertia::render('admin/DashboardAdmin');
    })->name('admin.dashboard-admin');
});


Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
