<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TugasController;
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

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('/dashboard')->group(function () {
        // Route::get('/mata-pelajaran', [MataPelajaranController::class,'index']);
        // Route::post('/mata-pelajaran', [MataPelajaranController::class,'store']);
        Route::resource('/mata-pelajaran', MataPelajaranController::class);
        Route::resource('/materi', MateriController::class);
        Route::get('/tugas/{id}/edit', [TugasController::class, 'edit'])->name('tugas.edit');
        // Route untuk mengupdate tugas
        Route::put('/tugas/{id}', [TugasController::class, 'update'])->name('tugas.update');

        // Route untuk menghapus tugas
        Route::delete('/tugas/{id}', [TugasController::class, 'destroy'])->name('tugas.destroy');
        Route::resource('/tugas', TugasController::class);
        // Route untuk halaman edit tugas
        // Route::put('dashboard/tugas/{tugas}/edit', [TugasController::class, 'update'])->name('tugas.update');

    });
});

require __DIR__ . '/auth.php';
