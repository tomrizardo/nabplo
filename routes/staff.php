<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\Staffs\StaffLogin;
use App\Http\Controllers\Staffs\StaffDashboard;
use App\Http\Controllers\Staff\VerificationController;
use App\Http\Controllers\Staff\DeliveriesController;


Route::get('/staff', function () {
    return Inertia::render('Admin/AdminLogin');
})->middleware('guest:staff')->name('staff.login');
  

Route::get('/staffregister', function () {
    return Inertia::render('Admin/AdminRegister');
})->middleware('guest:staff')->name('staff.register');
Route::group(['prefix' => 'staff' ], function() {
    Route::post('login', [StaffLogin::class, 'store'])->name('staff.logins');
    Route::post('logout', [StaffLogin::class, 'destroy'])->name('staff.auth_logout');
    
    Route::post('article', [StaffDashboard::class, 'saveArticles'])->middleware('auth:staff')->name('saveArticless');
    Route::get('dashboard', [StaffDashboard::class, 'Home'])->name('staff.dashboard');
    Route::get('advisory', [StaffDashboard::class, 'advisory'])->name('staff.advisory');
    Route::get('article',  [StaffDashboard::class, 'articles'])->name('staff.article');
    Route::get('executive',  [StaffDashboard::class, 'executive'])->name('staff.executive');
    Route::delete('article/{article}', [StaffDashboard::class, 'deleteArticles'])->middleware('auth:staff')->name('deleteArticle');
    Route::delete('executive/{executive}', [StaffDashboard::class, 'deleteExecutive'])->middleware('auth:staff')->name('deleteExec');
    Route::delete('advisory/{advisory}', [StaffDashboard::class, 'deleteAdv'])->middleware('auth:staff')->name('deleteAdv');
    Route::get('/profile', [Beneficiaries::class, 'profileVue'])->name('profile');
    Route::post('/registration', [Staff::class, 'register'])->name('staff.registers');
    Route::post('updateUser', [StaffDashboard::class, 'RoleChange'])->name('staff.update');
    Route::post('updateExec', [StaffDashboard::class, 'saveExec'])->name('saveExec');
    Route::post('updateAdv', [StaffDashboard::class, 'saveAdv'])->name('saveAdv');
    Route::get('settings', [StaffDashboard::class, 'settings'])->name('staff.settings');

});
