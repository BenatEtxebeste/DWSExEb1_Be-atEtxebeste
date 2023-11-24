<?php

use App\Http\Controllers\ManzanaController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/manzanas', [ManzanaController::class, 'index'])->middleware(['auth', 'verified']);

Route::get('insertarManzana', [ManzanaController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('insertarManzana', [ManzanaController::class, 'store'])->middleware(['auth', 'verified']);

Route::delete('eliminarManzana/{manzana}', [ManzanaController::class, 'destroy'])->middleware(['auth', 'verified', 'eliminado']);

Route::get('modificarManzana/editar', [ManzanaController::class, 'edit'])->middleware(['auth', 'verified']);
Route::put('modificarManzana', [ManzanaController::class, 'update'])->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';