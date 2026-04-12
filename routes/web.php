<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InboxController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DemoRequestController;
use App\Http\Controllers\EventTrackingController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/locale/{locale}', [PageController::class, 'setLocale'])->name('locale.switch');
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/projects', [PageController::class, 'projects'])->name('projects.index');
Route::get('/projects/{slug}', [PageController::class, 'projectShow'])->name('projects.show');
Route::get('/demo-login', [PageController::class, 'demoLogin'])->name('demo-login');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
Route::post('/demo-requests', [DemoRequestController::class, 'store'])->name('demo-requests.store');
Route::post('/track/event', [EventTrackingController::class, 'store'])->name('track.event');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('projects', AdminProjectController::class)->except(['show']);
    Route::get('/settings', [SiteSettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SiteSettingController::class, 'update'])->name('settings.update');
    Route::resource('pages', AdminPageController::class)->except(['show']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::get('/themes', [ThemeController::class, 'edit'])->name('themes.edit');
    Route::put('/themes', [ThemeController::class, 'update'])->name('themes.update');
    Route::get('/inbox', [InboxController::class, 'index'])->name('inbox.index');
    Route::patch('/inbox/contact/{contact}', [InboxController::class, 'updateContact'])->name('inbox.contacts.update');
    Route::patch('/inbox/feedback/{feedback}', [InboxController::class, 'updateFeedback'])->name('inbox.feedback.update');
    Route::patch('/inbox/demo-request/{demoRequest}', [InboxController::class, 'updateDemo'])->name('inbox.demo.update');
});
