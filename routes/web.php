<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('home', [FrontendController::class, 'index'])->name('home');
Route::get('portfolio_details', [FrontendController::class, 'portfolioDetails'])->name('portfolio_details');
Route::get('dashboard', [BackendController::class, 'index'])->name('dashboard');
Route::get('login', [BackendController::class, 'loginPage'])->name('login');
Route::post('login', [BackendController::class, 'login'])->name('login');
Route::get('signup', [BackendController::class, 'signupPage'])->name('signup');
Route::post('signup', [BackendController::class, 'signup'])->name('signup');

