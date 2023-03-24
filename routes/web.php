<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\RegisteredUserController;
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

Route::get('/checkstatus', function () {
    return Inertia::render('Checkstatus');
})->name('checkstatus');

Route::post('request-app-status', [RegisteredUserController::class, 'checkRequestStatus'])->name('check_request_status');


Route::post('checkstatus', [RegisteredUserController::class, 'verificationChangeStatus'])->name('update');

require __DIR__.'/auth.php';
