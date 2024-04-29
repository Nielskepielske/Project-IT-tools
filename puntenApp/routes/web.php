<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\VakController;
use Illuminate\Support\Facades\Route;

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

/**
 * De route / wordt opgeroepen en de view auth.login wordt getoond "/"-> root van de website
 */
Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/vakken/{user}', [VakController::class, 'index'])->name('vak.show');
/**
 * De route /vakken wordt opgeroepen en de index functie van de VakController wordt uitgevoerd
 * De naam van de route is vak.show
 */
Route::get('/vakken', [VakController::class, 'index'])->name('vak.show');

/**
 * De route /testen wordt opgeroepen en de showRadarGraph functie van de TestController wordt uitgevoerd
 * De naam van de route is test.show
 */
Route::get('/testen', [TestController::class, 'showRadarGraph'])->name('test.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
