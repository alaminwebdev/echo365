<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Echo365\EchoController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TickerController;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PhotoController;


// echo365 - front end section
Route::controller(EchoController::class)->group(function () {
    Route::get('/', 'index')->name('echo365.home');
    Route::get('/about', 'about')->name('echo365.about');
    Route::get('post/{id}', 'post')->name('echo365.post');
    Route::get('/category/{name}/{id}', 'postBySubCategory')->name('echo365.subcategory');
    Route::get('/photos', 'photos')->name('echo365.photos');
    Route::get('contact', 'contact')->name('echo365.contact');
    Route::post('contact', 'contact_store')->name('contact.store');
});


// Admin Authentication section
Route::group(['prefix' => 'admin', 'controller' => AdminController::class], function () {
    Route::get('login', 'login')->name('admin.login');
    Route::any('login/submit', 'login_submit')->name('admin.login.submit');

    Route::get('forgot-password', 'forgot')->name('admin.forgot.password');
    Route::any('forgot-password-submit', 'forgot_submit')->name('admin.forgot.submit');

    Route::get('reset-password/{token}/{email}', 'reset')->name('admin.reset.password');
    Route::any('reset-password-submit', 'reset_submit')->name('admin.reset.submit');
});




Route::group(['prefix' => 'admin', 'middleware' => 'admin:admin'], function () {

    // Admin section
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    Route::get('about', [AdminController::class, 'about'])->name('admin.about');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::any('profile-submit', [AdminController::class, 'profile_submit'])->name('admin.profile.submit');
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Author section
    Route::get('author', [AuthorController::class, 'index'])->name('admin.author.home');
    Route::get('author/create', [AuthorController::class, 'create'])->name('admin.author.create');
    Route::any('author/store', [AuthorController::class, 'store'])->name('admin.author.store');
    Route::get('author/show/{id}', [AuthorController::class, 'show'])->name('admin.author.show');
    Route::any('author/update/', [AuthorController::class, 'update'])->name('admin.author.update');
    Route::get('author/destroy/{id}', [AuthorController::class, 'destroy'])->name('admin.author.destroy');


    // Advertisement section
    Route::get('home-ad', [AdController::class, 'home_ad'])->name('admin.ad.home');
    Route::any('home-ad-update', [AdController::class, 'home_ad_update'])->name('admin.ad.home.update');

    Route::get('top-ad', [AdController::class, 'top_ad'])->name('admin.ad.top');
    Route::any('top-ad-update', [AdController::class, 'top_ad_update'])->name('admin.ad.top.update');

    Route::get('sidebar-ad', [AdController::class, 'sidebar_ad'])->name('admin.ad.sidebar');
    Route::get('sidebar-ad-create', [AdController::class, 'sidebar_ad_create'])->name('admin.ad.sidebar.create');
    Route::any('sidebar-ad-store', [AdController::class, 'sidebar_ad_store'])->name('admin.ad.sidebar.store');
    Route::get('sidebar-ad/{id}', [AdController::class, 'sidebar_ad_show'])->name('admin.ad.sidebar.show');
    Route::any('sidebar-ad-update', [AdController::class, 'sidebar_ad_update'])->name('admin.ad.sidebar.update');
    Route::get('sidebar-ad-delete/{id}', [AdController::class, 'sidebar_ad_delete'])->name('admin.ad.sidebar.delete');

    // Category section
    Route::get('category', [CategoryController::class, 'index'])->name('admin.category.home');
    Route::get('category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::any('category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('category/show/{id}', [CategoryController::class, 'show'])->name('admin.category.show');
    Route::any('category/update/', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    Route::get('subcategory', [SubCategoryController::class, 'index'])->name('admin.subcategory.home');
    Route::get('subcategory/create', [SubCategoryController::class, 'create'])->name('admin.subcategory.create');
    Route::any('subcategory/store', [SubCategoryController::class, 'store'])->name('admin.subcategory.store');
    Route::get('subcategory/show/{id}', [SubCategoryController::class, 'show'])->name('admin.subcategory.show');
    Route::any('subcategory/update/', [SubCategoryController::class, 'update'])->name('admin.subcategory.update');
    Route::get('subcategory/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('admin.subcategory.destroy');

    // Posts section
    Route::get('post', [PostController::class, 'index'])->name('admin.post.home');
    Route::get('post/create', [PostController::class, 'create'])->name('admin.post.create');
    Route::post('post', [PostController::class, 'store'])->name('admin.post.store');
    Route::get('post/{id}', [PostController::class, 'show'])->name('admin.post.show');
    Route::post('post/update', [PostController::class, 'update'])->name('admin.post.update');
    Route::get('post/destroy/{id}', [PostController::class, 'destroy'])->name('admin.post.destroy');
    Route::get('tag-destroy/{id}/{post_id}', [PostController::class, 'tag_destroy'])->name('admin.tag.destroy');


    // Tiker section
    Route::get('ticker', [TickerController::class, 'index'])->name('ticker.index');
    Route::any('ticker/update', [TickerController::class, 'update'])->name('ticker.update');

    // Photo section
    Route::get('photo', [PhotoController::class, 'index'])->name('photo.index');
    Route::get('photo/create', [PhotoController::class, 'create'])->name('photo.create');
    Route::post('photo', [PhotoController::class, 'store'])->name('photo.store');
    Route::get('photo/{id}', [PhotoController::class, 'show'])->name('photo.show');
    Route::post('photo/update', [PhotoController::class, 'update'])->name('photo.update');
    Route::get('photo/destroy/{id}', [PhotoController::class, 'destroy'])->name('photo.destroy');
});
