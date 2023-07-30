<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('page.about');
Route::get('/services', [FrontendController::class, 'servies'])->name('page.services');
Route::get('/projects', [ProjectController::class, 'projects'])->name('page.projects');
Route::get('/projects/{projectRef}/show', [ProjectController::class, 'show'])->name('page.projects.show');
Route::get('/projects/category/{categoryref}', [ProjectController::class, 'categoryProject'])->name('page.projects.category');
Route::get('/partners', [FrontendController::class, 'partners'])->name('page.partners');
Route::get('/clients', [FrontendController::class, 'clients'])->name('page.clients');
Route::get('/contact', [FrontendController::class, 'contact'])->name('page.contact');
Route::post('/contact', [ContactController::class, 'store'])->name('page.contact.store');

require __DIR__ . '/admin.php';
