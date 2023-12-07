<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClaimsController;

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

Route::get('/', function () {
    return view('claims.index');
});

Route::prefix('claims')->group(function () {
    Route::get('/', [ClaimsController::class, 'index'])->name('claims.index');
    Route::post('/check-airports', [ClaimsController::class, 'checkAirports'])->name('claims.checkAirports');

    Route::get('/step2', [ClaimsController::class, 'step2'])->name('claims.step2');
    Route::post('/check-flight', [ClaimsController::class, 'checkFlight'])->name('claims.checkFlight');

    Route::get('/step3', [ClaimsController::class, 'step3'])->name('claims.step3');
    Route::post('/check-compensation', [ClaimsController::class, 'checkCompensation'])->name('claims.checkCompensation');
});
