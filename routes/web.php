<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TickerController;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Echo365\EchoController;
use App\Http\Controllers\Admin\PostController;


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

// Author section
Route::get('admin/author', [AuthorController::class, 'index'])->name('admin.author.home');
Route::get('admin/author-create', [AuthorController::class, 'create'])->name('admin.author.create');
Route::any('admin/author-store', [AuthorController::class, 'store'])->name('admin.author.store');
Route::get('admin/author-show/{id}', [AuthorController::class, 'show'])->name('admin.author.show');
Route::any('admin/author-update/', [AuthorController::class, 'update'])->name('admin.author.update');
Route::get('admin/author-destroy/{id}', [AuthorController::class, 'destroy'])->name('admin.author.destroy');


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
Route::get('admin/sidebar-ad-delete/{id}', [AdController::class, 'sidebar_ad_delete'])->name('admin.ad.sidebar.delete');

// Category section
Route::get('admin/category', [CategoryController::class, 'index'])->name('admin.category.home');
Route::get('admin/category-create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::any('admin/category-store', [CategoryController::class, 'store'])->name('admin.category.store');
Route::get('admin/category-show/{id}', [CategoryController::class, 'show'])->name('admin.category.show');
Route::any('admin/category-update/', [CategoryController::class, 'update'])->name('admin.category.update');
Route::get('admin/category-destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

Route::get('admin/subcategory', [SubCategoryController::class, 'index'])->name('admin.subcategory.home');
Route::get('admin/subcategory-create', [SubCategoryController::class, 'create'])->name('admin.subcategory.create');
Route::any('admin/subcategory-store', [SubCategoryController::class, 'store'])->name('admin.subcategory.store');
Route::get('admin/subcategory-show/{id}', [SubCategoryController::class, 'show'])->name('admin.subcategory.show');
Route::any('admin/subcategory-update/', [SubCategoryController::class, 'update'])->name('admin.subcategory.update');
Route::get('admin/subcategory-destroy/{id}', [SubCategoryController::class, 'destroy'])->name('admin.subcategory.destroy');

// Posts section
Route::get('admin/post', [PostController::class, 'index'])->name('admin.post.home');
Route::get('admin/post-create', [PostController::class, 'create'])->name('admin.post.create');
Route::any('admin/post-store', [PostController::class, 'store'])->name('admin.post.store');
Route::get('admin/post-show/{id}', [PostController::class, 'show'])->name('admin.post.show');
Route::any('admin/post-update/', [PostController::class, 'update'])->name('admin.post.update');
Route::get('admin/post-destroy/{id}', [PostController::class, 'destroy'])->name('admin.post.destroy');
Route::get('admin/tag-destroy/{id}/{post_id}', [PostController::class, 'tag_destroy'])->name('admin.tag.destroy');

// Tiker section
Route::get('admin/ticker', [TickerController::class, 'index'])->name('admin.ticker.home');
Route::any('admin/ticker-update/', [TickerController::class, 'update'])->name('admin.ticker.update');
