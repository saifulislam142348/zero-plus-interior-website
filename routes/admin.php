<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LeaderController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SiteSettingsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('login', function (){
   return redirect(route('login'));
});

Route::get('register', function (){
   return redirect(route('login'));
});

Route::middleware('guest')->prefix('admin')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/create', [CategoryController::class, 'store']);
        Route::get('/{category_id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/{category_id}/edit', [CategoryController::class, 'update']);
        Route::delete('/{categoryId}', [CategoryController::class, 'destroy'])->name('category.delete');
    });

    Route::prefix('partners')->group(function () {
        Route::get('/', [PartnerController::class, 'index'])->name('partner.index');
        Route::get('/create', [PartnerController::class, 'create'])->name('partner.create');
        Route::post('/create', [PartnerController::class, 'store']);
        Route::get('/{partner_id}/edit', [PartnerController::class, 'edit'])->name('partner.edit');
        Route::put('/{partner_id}/edit', [PartnerController::class, 'update']);
        Route::delete('/{partnerId}', [PartnerController::class, 'destroy'])->name('partner.delete');
    });

    Route::prefix('clients')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('client.index');
        Route::get('/create', [CustomerController::class, 'create'])->name('client.create');
        Route::post('/create', [CustomerController::class, 'store']);
        Route::get('/{client_id}/edit', [CustomerController::class, 'edit'])->name('client.edit');
        Route::put('/{client_id}/edit', [CustomerController::class, 'update']);
        Route::delete('/{clientId}', [CustomerController::class, 'destroy'])->name('client.delete');
    });

    Route::prefix('leaders')->group(function () {
        Route::get('/', [LeaderController::class, 'index'])->name('leader.index');
        Route::get('/create', [LeaderController::class, 'create'])->name('leader.create');
        Route::post('/create', [LeaderController::class, 'store']);
        Route::get('/{leader_id}/edit', [LeaderController::class, 'edit'])->name('leader.edit');
        Route::put('/{leader_id}/edit', [LeaderController::class, 'update']);
        Route::delete('/{leaderId}', [LeaderController::class, 'destroy'])->name('partner.delete');

    });

    Route::prefix('projects')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('project.index');
        Route::get('/create', [ProjectController::class, 'create'])->name('project.create');
        Route::post('/create', [ProjectController::class, 'store']);
        Route::get('/{project_id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
        Route::put('/{project_id}/edit', [ProjectController::class, 'update']);
        Route::delete('/{projectId}', [ProjectController::class, 'destroy'])->name('project.delete');

    });

    Route::prefix('services')->group(function () {
        Route::get('/', [ServiceController::class, 'index'])->name('service.index');
        Route::get('/create', [ServiceController::class, 'create'])->name('service.create');
        Route::post('/create', [ServiceController::class, 'store']);
        Route::get('/{service_id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
        Route::put('/{service_id}/edit', [ServiceController::class, 'update']);
        Route::delete('/{serviceId}', [ServiceController::class, 'destroy'])->name('service.delete');
    });

    Route::prefix('contacts')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('contact.index');
        Route::get('/create', [ContactController::class, 'create'])->name('contact.create');
        Route::post('/create', [ContactController::class, 'store']);
        Route::get('/{contact_id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
        Route::put('/{contact_id}/edit', [ContactController::class, 'update']);
        Route::delete('/{contactId}', [ContactController::class, 'destroy'])->name('contact.delete');
    });

    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
