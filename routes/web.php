<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Advertisement\AdController;
use App\Http\Controllers\Echo365\EchoController;
use Faker\Guesser\Name;

// echo365 - front end section
Route::get('/', [EchoController::class, 'index'])->name('echo365.home');
Route::get('/about', [EchoController::class, 'about'])->name('echo365.about');
Route::get('/contact', [EchoController::class, 'contact'])->name('echo365.contact');


// Admin section
Route::get('admin', [AdminController::class, 'index'])->name('admin.home')->middleware('admin:admin');
Route::get('admin/about', [AdminController::class, 'about'])->name('admin.about')->middleware('admin:admin');

// Admin Authentication section
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::any('admin/login/submit', [AdminController::class, 'login_submit'])->name('admin.login.submit');

Route::get('admin/forgot-password', [AdminController::class , 'forgot'])->name('admin.forgot.password');
Route::any('admin/forgot-password-submit', [AdminController::class , 'forgot_submit'])->name('admin.forgot.submit');

Route::get('admin/reset-password/{token}/{email}', [AdminController::class , 'reset'])->name('admin.reset.password');
Route::any('admin/reset-password-submit', [AdminController::class , 'reset_submit'])->name('admin.reset.submit');

Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
Route::any('admin/profile-submit', [AdminController::class, 'profile_submit'])->name('admin.profile.submit');

Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Advertisement section
Route::get('admin/home-ad', [AdController::class, 'home_ad'])->name('admin.ad.home');
Route::any('admin/home-ad-update', [AdController::class, 'home_ad_update'])->name('admin.ad.home.update');

Route::get('admin/top-ad', [AdController::class, 'top_ad'])->name('admin.ad.top');
Route::any('admin/top-ad-update', [AdController::class, 'top_ad_update'])->name('admin.ad.top.update');

Route::get('admin/sidebar-ad', [AdController::class, 'sidebar_ad'])->name('admin.ad.sidebar');
Route::get('admin/sidebar-ad-create', [AdController::class, 'sidebar_ad_create'])->name('admin.ad.sidebar.create');
Route::any('admin/sidebar-ad-store', [AdController::class, 'sidebar_ad_store'])->name('admin.ad.sidebar.store');
Route::get('admin/sidebar-ad/{id}', [AdController::class, 'sidebar_ad_show'])->name('admin.ad.sidebar.show');
Route::any('admin/sidebar-ad-update', [AdController::class, 'sidebar_ad_update'])->name('admin.ad.sidebar.update');
Route::any('admin/sidebar-ad-delete/{id}', [AdController::class, 'sidebar_ad_delete'])->name('admin.ad.sidebar.delete');