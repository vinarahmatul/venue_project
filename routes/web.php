<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\homecontroller;
use App\Http\Controllers\authcontroller;
use App\Http\Controllers\weddingcontroller;
use App\Http\Controllers\partycontroller;
use App\Http\Controllers\bannercontroller;

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

Route::get('/Beranda', [homecontroller::class, "index"])->name('home.index');
Route::get('/Tentang', [homecontroller::class, "about"])->name('about.index');
Route::get('/Paket-Pernikahan', [homecontroller::class, "wedding"])->name('wedding.index');
Route::get('/Detail-Venue-Pernikahan/{id}', [homecontroller::class, "detailwedding"])->name('detailwedding.index');
Route::get('/Paket-Pesta', [homecontroller::class, "party"])->name('party.index');
Route::get('/Detail-Venue-Pesta/{id}', [homecontroller::class, "detailparty"])->name('detailparty.index');

Route::get('/Login', [authcontroller::class, 'showLoginForm'])->name('login');
Route::post('/Login', [authcontroller::class, 'login']);
Route::get('/Logout', [authcontroller::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/Paket-Wedding', [weddingcontroller::class, 'index'])->name('index');
    Route::get('/Tambah-Paket-Wedding', [weddingcontroller::class, 'create'])->name('create');
    Route::post('/Tambah-Paket-Wedding', [weddingcontroller::class, 'store'])->name('store');
    Route::get('/Edit-Paket-Wedding/{id}', [weddingcontroller::class, 'edit']);
    Route::post('/Edit-Paket-Wedding/{id}', [weddingcontroller::class, 'update']);
    Route::delete('/Hapus-Paket-Wedding/{id}', [weddingcontroller::class, 'destroy']);

    Route::get('/Paket-Party', [partycontroller::class, 'index'])->name('index');
    Route::get('/Tambah-Paket-Party', [partycontroller::class, 'create'])->name('create');
    Route::post('/Tambah-Paket-Party', [partycontroller::class, 'store'])->name('store');
    Route::get('/Edit-Paket-Party/{id}', [partycontroller::class, 'edit']);
    Route::post('/Edit-Paket-Party/{id}', [partycontroller::class, 'update']);
    Route::delete('/Hapus-Paket-Party/{id}', [partycontroller::class, 'destroy']);

    Route::get('/Banner', [bannercontroller::class, 'index'])->name('index');
    Route::get('/Tambah-Banner', [bannercontroller::class, 'create'])->name('create');
    Route::post('/Tambah-Banner', [bannercontroller::class, 'store'])->name('store');
    Route::get('/Edit-Banner/{id}', [bannercontroller::class, 'edit']);
    Route::post('/Edit-Banner/{id}', [bannercontroller::class, 'update']);
    Route::delete('/Hapus-Banner/{id}', [bannercontroller::class, 'destroy']);
});


