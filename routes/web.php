<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use Dedoc\Scramble\Scramble;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [CarController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('cars', CarController::class)->except('index')->middleware(['auth', 'verified']);
Route::get('/cars', function () {
    return redirect()->route('dashboard');
});

Route::domain(env('APP_URL'))->group(function () {
    Scramble::registerUiRoute('scramble');
    Scramble::registerJsonSpecificationRoute('api.json');
});

require __DIR__ . '/auth.php';
