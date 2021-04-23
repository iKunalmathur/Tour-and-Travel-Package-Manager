<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
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

// root
Route::get('/', function () {
    return redirect()->route("login");
});


// Required Auth
Route::middleware(["auth"])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('packages', PackageController::class);

    Route::resource('categories', CategoryController::class);

    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');

    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('enquiries', EnquiryController::class);

    Route::get("storage-link", function () {

        Artisan::call("storage:link");
        return "Storage Link Perform !!";
    });
});

// Pre Defines
require __DIR__ . '/auth.php';
