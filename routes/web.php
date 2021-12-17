<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogiqueController;


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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//logic answer
Route::get('/bil-prima/{input}', [LogiqueController::class, 'bilPrima']);
Route::get('/max', [LogiqueController::class, 'max']);
Route::get('/star/{input}', [LogiqueController::class, 'star']);
Route::get('/bubble', [LogiqueController::class, 'bubbleSort']);
Route::get('/square/{input}', [LogiqueController::class, 'square']);


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [LogiqueController::class, 'cardList'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/add-card', function () {
    return view('add-card');
})->name('add-card');

Route::middleware(['auth:sanctum', 'verified'])->post('/register-card', [LogiqueController::class, 'registerCard'])->name('register-card');