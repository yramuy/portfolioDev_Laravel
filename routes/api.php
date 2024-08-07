<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\SideNavController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('profileData', [ApiController::class, 'ProfileData'])->name('profileData');
Route::post('login', [ApiController::class, 'login'])->name('login');
Route::post('menus', [ApiController::class, 'menuData'])->name('menus');
Route::get('screens', [ApiController::class, 'screenData'])->name('screens');
Route::post('create-update-screen', [ApiController::class, 'createUpdateScreen'])->name('create-update-screen');
Route::get('screens/{id}/edit', [ApiController::class, 'edit'])->name('screens.edit');
Route::delete('screens/{id}', [ApiController::class, 'destroy'])->name('screens.destroy');
