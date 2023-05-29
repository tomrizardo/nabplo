<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Home\DashboardController;
use App\Http\Controllers\Staff\StaffDashboard;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
}) ->name('guest_home');

Route::get('/SuccessPage', function () {
    return Inertia::render('SucessPage', [
        'canRegister' => Route::has('register'),
   
    ]);
}) ->name('SuccessPage');

Route::get('/Aboutus', function () {
    return Inertia::render('AboutUs', [
        'canRegister' => Route::has('register'),
   
    ]);
}) ->name('aboutus');

Route::get('/Resources', function () {
    return Inertia::render('Faq', [
        'canRegister' => Route::has('register'),
   
    ]);
}) ->name('faq');
Route::get('/President', function () {
    return Inertia::render('President', [
        'canRegister' => Route::has('register'),
   
    ]);
}) ->name('president');

// Route::get('/Executive', function () {
//     return Inertia::render('Executive', [
//         'canRegister' => Route::has('register'),
   
//     ]);
// }) ->name('exec');

Route::get('/Pdf', function () {
    return Inertia::render('5th/Pdf', [
        
   
    ]);
}) ->name('pdf');
Route::get('/Videos', function () {
    return Inertia::render('5th/Videos', [
        
   
    ]);
}) ->name('videos');
Route::get('/First', function () {
    return Inertia::render('5th/First', [
        
   
    ]);
}) ->name('first');

Route::get('/Second', function () {
    return Inertia::render('5th/Second', [
        
   
    ]);
}) ->name('second');

Route::get('/Third', function () {
    return Inertia::render('5th/Third', [
        
   
    ]);
}) ->name('third');
Route::get('/staff', function () {
    return Inertia::render('Admin/AdminLogin');
})->name('staff');
Route::get('/checkstatus', function () {
    return Inertia::render('Checkstatus');
})->name('checkstatus');
Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');
Route::get('/article', function () {
    return Inertia::render('Articles');
})->name('article');




Route::post('request-app-status', [RegisteredUserController::class, 'checkRequestStatus'])->name('check_request_status');
Route::post('settings', [DashboardController::class, 'RoleChange'])->name('rolechange');
Route::post('search', [DashboardController::class, 'getRecords'])->name('search');
Route::get('advisorys', [DashboardController::class, 'advisorys'])->name('advisory');
Route::get('articless', [DashboardController::class, 'articless'])->name('articless');

Route::get('article', [DashboardController::class, 'articles'])->name('article');
Route::get('executive', [DashboardController::class, 'exec'])->name('exec');
Route::post('provinces', [DashboardController::class, 'provinces'])->name('province');
Route::post('checkstatus', [RegisteredUserController::class, 'verificationChangeStatus'])->name('update');


require __DIR__.'/auth.php';
require __DIR__.'/staff.php';