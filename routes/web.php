<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
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

// redirect to login
Route::redirect('/', '/login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware('auth')->prefix('stores')->group(function () {
	Route::get('/', [StoreController::class, 'index'])->name('stores');
	Route::get('/add', [StoreController::class, 'add'])->name('stores.add');
	Route::post('/create', [StoreController::class, 'create'])->name('stores.create');
	Route::get('/edit/{id}', [StoreController::class, 'edit'])->name('stores.edit');
	Route::patch('/edit/{id}', [StoreController::class, 'update'])->name('stores.update');
	Route::delete('/delete/{id}', [StoreController::class, 'delete'])->name('stores.delete');
});
