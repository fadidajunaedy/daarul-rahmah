<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
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

Route::controller(ClientController::class)->group(function () {
    Route::get('/', 'index')->name('client');
    Route::get('/news', 'news')->name('client.news');
    Route::get('/news/{title}', 'newsDetail')->name('client.news.detail');
    Route::get('/about', 'about')->name('client.about');
    Route::get('/activity', 'activity')->name('client.activity');
    Route::get('/contact', 'contact')->name('client.contact');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/register', 'registerPage')->name('register')->middleware('isGuest');
    Route::get('/auth/login', 'loginPage')->name('login')->middleware('isGuest');
    Route::post('/auth/register', 'register')->name('register.user')->middleware('isGuest');
    Route::post('/auth/login', 'login')->name('login.user')->middleware('isGuest');
    Route::get('/auth/forgot-password', 'forgotPassword')->name('password.request')->middleware('isGuest');
    Route::post('/auth/forgot-password', 'requestResetPassword')->name('password.email')->middleware('isGuest');
    Route::get('auth/reset-password/{token}', function (Request $request, string $token) {
        $email = $request->query('email');
        return view('auth.reset-password', ['token' => $token, 'email' => $email]);
    })->name('password.reset')->middleware('isGuest');
    Route::post('/auth/reset-password', 'resetPassword')->name('password.update')->middleware('isGuest');
    Route::post('/logout', 'logout')->name('logout')->middleware('isLogin');

    Route::get('/auth/verify', 'show')->name('verification.notice')->middleware('auth');
    Route::get('/auth/verify/{id}/{hash}', 'verify')->name('verification.verify')->middleware(['auth','signed']);
    Route::get('/auth/verify/confirm', 'confirm')->name('verification.confirm')->middleware('auth');
    Route::get('/auth/verify/resend', 'resend')->name('verification.resend')->middleware(['auth','throttle']);
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'index')->name('admin.dashboard')->middleware('isLogin');

    Route::get('/admin/profile', 'editProfile')->name('admin.profile.edit')->middleware('isLogin');
    Route::patch('/admin/profile/update', 'updateProfile')->name('admin.profile.update')->middleware('isLogin');
    Route::post('/admin/profile/change-password', 'changePassword')->name('admin.profile.change-password')->middleware('isLogin');

    Route::get('/admin/home/edit', 'editHome')->name('admin.home.edit')->middleware(['isLogin', 'isAdmin']);
    Route::patch('/admin/home/update', 'updateHome')->name('admin.home.update')->middleware(['isLogin', 'isAdmin']);

    Route::get('/admin/about/edit', 'editAbout')->name('admin.about.edit')->middleware(['isLogin', 'isAdmin']);
    Route::patch('/admin/about/update', 'updateAbout')->name('admin.about.update')->middleware(['isLogin', 'isAdmin']);
    Route::get('/admin/about/mision/create', 'createAboutMision')->name('admin.about.mision.create')->middleware(['isLogin', 'isAdmin']);
    Route::post('/admin/about/mision/store', 'storeAboutMision')->name('admin.about.mision.store')->middleware(['isLogin', 'isAdmin']);
    Route::get('/admin/about/mision/{id}/edit', 'editAboutMision')->name('admin.about.mision.edit')->middleware(['isLogin', 'isAdmin']);
    Route::patch('/admin/about/mision/{id}/update', 'updateAboutMision')->name('admin.about.mision.update')->middleware(['isLogin', 'isAdmin']);
    Route::delete('/admin/about/mision/{id}', 'destroyAboutMision')->name('admin.about.mision.destroy')->middleware(['isLogin', 'isAdmin']);

    Route::get('/admin/contact/edit', 'editContact')->name('admin.contact.edit')->middleware(['isLogin', 'isAdmin']);
    Route::patch('/admin/contact/update', 'updateContact')->name('admin.contact.update')->middleware(['isLogin', 'isAdmin']);

    Route::get('/admin/activity', 'listActivity')->name('admin.activity')->middleware(['isLogin', 'isAdmin']);
    Route::get('/admin/activity/create', 'createActivity')->name('admin.activity.create')->middleware(['isLogin', 'isAdmin']);
    Route::post('/admin/activity/store', 'storeActivity')->name('admin.activity.store')->middleware(['isLogin', 'isAdmin']);
    Route::get('/admin/activity/{id}/edit', 'editActivity')->name('admin.activity.edit')->middleware(['isLogin', 'isAdmin']);
    Route::patch('/admin/activity/{id}/update', 'updateActivity')->name('admin.activity.update')->middleware(['isLogin', 'isAdmin']);
    Route::delete('/admin/activity/{id}', 'destroyActivity')->name('admin.activity.destroy')->middleware(['isLogin', 'isAdmin']);
    
    Route::get('/admin/anggota', 'listAnggota')->name('admin.anggota')->middleware(['isLogin', 'isAdmin']);
    Route::get('/admin/anggota/create', 'createAnggota')->name('admin.anggota.create')->middleware(['isLogin', 'isAdmin']);
    Route::post('/admin/anggota/store', 'storeAnggota')->name('admin.anggota.store')->middleware(['isLogin', 'isAdmin']);
    Route::get('/admin/anggota/{id}/edit', 'editAnggota')->name('admin.anggota.edit')->middleware(['isLogin', 'isAdmin']);
    Route::patch('/admin/anggota/{id}/update', 'updateAnggota')->name('admin.anggota.update')->middleware(['isLogin', 'isAdmin']);
    Route::delete('/admin/anggota/{id}', 'destroyAnggota')->name('admin.anggota.destroy')->middleware(['isLogin', 'isAdmin']);
    Route::get('/admin/anggota/export', 'exportAnggota')->name('admin.anggota.export')->middleware(['isLogin', 'isAdmin']);
    
    Route::get('/admin/list', 'listAdmin')->name('admin.list')->middleware(['isLogin', 'isSuperAdmin']);
    Route::get('/admin/create', 'createAdmin')->name('admin.create')->middleware(['isLogin', 'isSuperAdmin']);
    Route::post('/admin/store', 'storeAdmin')->name('admin.store')->middleware(['isLogin', 'isSuperAdmin']);
    Route::get('/admin/{id}/edit', 'editAdmin')->name('admin.edit')->middleware(['isLogin', 'isSuperAdmin']);
    Route::patch('/admin/{id}/update', 'updateAdmin')->name('admin.update')->middleware(['isLogin', 'isSuperAdmin']);
    Route::delete('/admin/{id}', 'destroyAdmin')->name('admin.destroy')->middleware(['isLogin', 'isSuperAdmin']);
    Route::get('/admin/export', 'exportAdmin')->name('admin.export')->middleware(['isLogin', 'isSuperAdmin']);
    
    Route::get('/admin/news', 'listNews')->name('admin.news')->middleware(['isLogin', 'isAdmin']);
    Route::get('/admin/news/create', 'createNews')->name('admin.news.create')->middleware(['isLogin', 'isAdmin']);
    Route::post('/admin/news/store', 'storeNews')->name('admin.news.store')->middleware(['isLogin', 'isAdmin']);
    Route::get('/admin/news/{id}/edit', 'editNews')->name('admin.news.edit')->middleware(['isLogin', 'isAdmin']);
    Route::patch('/admin/news/{id}/update', 'updateNews')->name('admin.news.update')->middleware(['isLogin', 'isAdmin']);
    Route::delete('/admin/news/{id}', 'destroyNews')->name('admin.news.destroy')->middleware(['isLogin', 'isAdmin']);
    Route::get('/admin/news/export', 'exportNews')->name('admin.news.export')->middleware('isLogin');
    
    Route::get('/admin/donate', 'listDonate')->name('admin.donate')->middleware('isLogin');
    Route::get('/admin/donate/create', 'createDonate')->name('admin.donate.create')->middleware(['isLogin', 'isAdmin']);
    Route::post('/admin/donate/store', 'storeDonate')->name('admin.donate.store')->middleware(['isLogin', 'isAdmin']);
    Route::get('/admin/donate/{id}/edit', 'editDonate')->name('admin.donate.edit')->middleware(['isLogin', 'isAdmin']);
    Route::patch('/admin/donate/{id}/update', 'updateDonate')->name('admin.donate.update')->middleware(['isLogin', 'isAdmin']);
    Route::delete('/admin/donate/{id}', 'destroyDonate')->name('admin.donate.destroy')->middleware(['isLogin', 'isAdmin']);
    Route::get('/admin/donate/export', 'exportDonate')->name('admin.donate.export')->middleware('isLogin');
    
    Route::get('/admin/cash', 'listCash')->name('admin.cash')->middleware('isLogin');
    Route::get('/admin/cash/create', 'createCash')->name('admin.cash.create')->middleware(['isLogin', 'isAdmin']);
    Route::post('/admin/cash/store', 'storeCash')->name('admin.cash.store')->middleware(['isLogin', 'isAdmin']);
    Route::get('/admin/cash/{id}/edit', 'editCash')->name('admin.cash.edit')->middleware(['isLogin', 'isAdmin']);
    Route::patch('/admin/cash/{id}/update', 'updateCash')->name('admin.cash.update')->middleware(['isLogin', 'isAdmin']);
    Route::delete('/admin/cash/{id}', 'destroyCash')->name('admin.cash.destroy')->middleware(['isLogin', 'isAdmin']);
    Route::get('/admin/cash/export', 'exportCash')->name('admin.cash.export')->middleware('isLogin');
});
