<?php

use App\Http\Controllers\editor\AuthController;
use App\Http\Controllers\editor\BlogController;
use App\Http\Controllers\editor\ContactController;
use App\Http\Controllers\editor\HomeController;
use App\Http\Controllers\editor\MasterHeadController;
use App\Http\Controllers\editor\PortofolioController;
use App\Http\Controllers\editor\ServiceController;
use App\Http\Controllers\editor\UserController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::controller(PublicController::class)->group(function () {
    Route::get('/', 'index')->name('public');
    Route::get('/blog', 'blog')->name('public.blog');
    Route::get('/contact', 'contact')->name('public.contact');
    Route::get('/portofolio', 'portofolio')->name('public.portofolio');
    Route::get('data', 'getData')->name('public.data');
});

Route::controller(AuthController::class)->middleware('guest')->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login/auth', 'authenticate')->name('login.auth');
});

Route::prefix('editor')->middleware('auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('logout', 'logout')->name('logout');
    });
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('editor.home');
    });
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('editor.users');
        Route::get('/users/data', 'getData')->name('editor.users.data');
        Route::post('/users/store', 'storeData')->name('editor.users.store');
        Route::get('/users/detail', 'detail')->name('editor.users.detail');
        Route::post('/users/update', 'updateData')->name('editor.users.update');
        Route::delete('/users/delete', 'deleteData')->name('editor.users.delete');
    });
    Route::controller(MasterHeadController::class)->group(function () {
        Route::get('/master-head', 'index')->name('editor.master-head');
        Route::get('/master-head/data', 'getData')->name('editor.master-head.data');
        Route::post('/master-head/store', 'storeData')->name('editor.master-head.store');
        Route::get('/master-head/detail', 'detail')->name('editor.master-head.detail');
        Route::post('/master-head/update', 'updateData')->name('editor.master-head.update');
        Route::delete('/master-head/delete', 'deleteData')->name('editor.master-head.delete');
    });
    Route::controller(ServiceController::class)->group(function () {
        Route::get('/service', 'index')->name('editor.service');
        Route::get('/service/data', 'getData')->name('editor.service.data');
        Route::post('/service/store', 'storeData')->name('editor.service.store');
        Route::get('/service/detail', 'detail')->name('editor.service.detail');
        Route::post('/service/update', 'updateData')->name('editor.service.update');
        Route::delete('/service/delete', 'deleteData')->name('editor.service.delete');
    });
    Route::controller(PortofolioController::class)->group(function () {
        Route::get('/portofolio', 'index')->name('editor.portofolio');
        Route::get('/portofolio/data', 'getData')->name('editor.portofolio.data');
        Route::post('/portofolio/store', 'storeData')->name('editor.portofolio.store');
        Route::get('/portofolio/detail', 'detail')->name('editor.portofolio.detail');
        Route::post('/portofolio/update', 'updateData')->name('editor.portofolio.update');
        Route::delete('/portofolio/delete', 'deleteData')->name('editor.portofolio.delete');
    });
    Route::controller(BlogController::class)->group(function () {
        Route::get('/blog', 'index')->name('editor.blog');
        Route::get('/blog/data', 'getData')->name('editor.blog.data');
        Route::post('/blog/store', 'storeData')->name('editor.blog.store');
        Route::get('/blog/detail', 'detail')->name('editor.blog.detail');
        Route::post('/blog/update', 'updateData')->name('editor.blog.update');
        Route::delete('/blog/delete', 'deleteData')->name('editor.blog.delete');
    });
    Route::controller(ContactController::class)->group(function () {
        Route::get('/contact', 'index')->name('editor.contact');
        Route::get('/contactdata', 'getData')->name('editor.contact.data');
        Route::delete('/contact/delete', 'deleteData')->name('editor.contact.delete');
    });
});
