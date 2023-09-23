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


Route::middleware('auth')->prefix('store')->group(function () {
	Route::get('/', [StoreController::class, 'index'])->name('store.index');
	Route::get('/add', [StoreController::class, 'add'])->name('store.add');
	Route::post('/create', [StoreController::class, 'create'])->name('store.create');
	Route::get('/edit/{id}', [StoreController::class, 'edit'])->name('store.edit');
	Route::patch('/edit/{id}', [StoreController::class, 'update'])->name('store.update');
	Route::delete('/delete/{id}', [StoreController::class, 'delete'])->name('store.delete');
});
