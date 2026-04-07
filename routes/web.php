<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RendezvousController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
// Page d'accueil
Route::get('/', function () {
    return redirect()->route('login');
});

// Auth routes manuelles
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');

// Routes protégées
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/rendezvous', [RendezvousController::class, 'index'])->name('rendezvous.index');
    Route::get('/rendezvous/create', [RendezvousController::class, 'create'])->name('rendezvous.create');
    Route::post('/rendezvous', [RendezvousController::class, 'store'])->name('rendezvous.store');
    Route::delete('/rendezvous/{id}', [RendezvousController::class, 'destroy'])->name('rendezvous.destroy');
});
// Routes Admin — protégées par le middleware admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::put('/rendezvous/{id}', [AdminController::class, 'updateStatut'])->name('admin.rendezvous.update');
});