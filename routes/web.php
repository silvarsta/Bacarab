<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\gameAngkaController;
use App\Http\Controllers\gameHurufController;
use App\Http\Controllers\gameKataController;

use App\Http\Controllers\KamusController;
use App\Http\Controllers\PrintableController;

use App\Http\Controllers\landingController;
use App\Http\Controllers\mainpageController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


Route::get('/', [landingController::class, 'landing']);
Route::get('/main', [mainpageController::class, 'main'])->name('main');
Route::get('/gameHuruf', [gameHurufController::class, 'gameHuruf']);
    Route::get('/bermainGameHuruf', function(){ return view('gameHurufInner');});
Route::get('/gameAngka', [gameAngkaController::class, 'gameAngka']);
    Route::get('/bermainGameAngka', function(){ return view('gameAngkaInner');});
Route::get('/gameKata', [gameKataController::class, 'gameKata']);
    Route::get('/bermainGameKata', function(){ return view('gameKataInner');});


Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/account', [AdminController::class, 'account'])->name('admin.account');

Route::get('/admin/about', [AdminController::class, 'about']);
Route::get('/admin/victor', [AdminController::class, 'victor']);

Route::get('/loginreg', [SessionController::class, 'loginreg'])->name('loginreg');


Route::post('/postlogin', [SessionController::class, 'postlogin'])->name('postlogin');

Route::get('/logout', [SessionController::class, 'logout'])->name('logout');

Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth', 'role:admin');

Route::get('/main', [mainpageController::class, 'main'])->name('main')->middleware('auth', 'role:user');



Route::get('/admin/kamus', [KamusController::class, 'dictionary'])
    ->name('admin.dictionary');
Route::get('/kamus/create', [KamusController::class, 'create'])
    ->name('admin.create');
Route::post('/admin/kamus', [KamusController::class, 'store'])
    ->name('admin.store');
Route::get('/kamus/{kamus}/edit', [KamusController::class, 'edit'])
    ->name('admin.edit');
Route::get('/kamus/{kamus}', [KamusController::class, 'show'])
    ->name('admin.show');
Route::patch('/kamus/{kamus}', [KamusController::class, 'update'])
    ->name('admin.update');
Route::delete('/kamus/{kamus}', [KamusController::class, 'destroy'])
    ->name('admin.destroy');


Route::get('/admin/printable', [PrintableController::class, 'printable'])
    ->name('admin.printable');
Route::get('/printable/create', [PrintableController::class, 'create'])
    ->name('admin.create');
Route::post('/admin/printable', [PrintableController::class, 'store'])
    ->name('admin.store');
Route::get('/printable/{printable}/edit', [PrintableController::class, 'edit'])
    ->name('admin.edit');
Route::get('/printable/{printable}', [PrintableController::class, 'show'])
    ->name('admin.show');
Route::patch('/printable/{printable}', [PrintableController::class, 'update'])
    ->name('admin.update');
Route::delete('/printable/{printable}', [PrintableController::class, 'destroy'])
    ->name('admin.destroy');
