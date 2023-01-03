<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name("laravel.home");

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware(["noAuth"]);
Route::post('/register/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/login/signin', [AuthController::class, 'signin'])->name('signin');
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware(["noAuth"]);
Route::any('/logout', [AuthController::class, 'logout'])->name("logout")->middleware(["withAuth"]);

Route::get('/register/chef', [ChefController::class, 'register'])->name('chef.register')->middleware(["withAuth"]);
Route::post('/signup/chef/{id}', [ChefController::class, 'createChef'])->name('chef.create')->middleware(['withAuth']);

Route::middleware(['withAuth'])->prefix('resep')->group(function() {
    Route::get('/', [ResepController::class, 'index'])->name('resep.list');
    Route::get('/store', [ResepController::class, 'store'])->name('resep.store')->middleware(['isChef']);
    Route::post('/create', [ResepController::class, 'create'])->name('resep.create')->middleware(['isChef']);
    Route::get('/detail/{id}', [ResepController::class, 'detail'])->name('resep.detail');
    Route::get('/update/{id}', [ResepController::class, 'update'])->name('resep.update')->middleware(['isChef']);
    Route::post('/edit/{id}', [ResepController::class, 'edit'])->name('resep.edit')->middleware(['isChef']);
    Route::get('/destroy/{id}', [ResepController::class, 'destroy'])->name('resep.destroy')->middleware(['isChef']);
    Route::get('/resepku', [ChefController::class, 'resepku'])->name('resep.resepku')->middleware(['isChef']);
    Route::post('/simpan/{id}', [ResepController::class, 'simpan'])->name('resep.simpan');
    Route::get('/simpan_resep', [ResepController::class, 'simpan_resep'])->name('resep.simpan_resep');
});


