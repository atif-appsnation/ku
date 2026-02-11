<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
});

Route::group(['middleware' => 'guest'], function () {

    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/index/{id}', [HomeController::class, 'index']);

    Route::get('/home', [HomeController::class, 'showForm']);
    Route::post('/home',  [HomeController::class, 'upload'])->name('upload');
    Route::get('/files', [HomeController::class, 'viewfiles']);
    
    Route::get('/generate-pdf/{id}', [HomeController::class,'generatePasswordProtectedPDF'])->name('generate.pdf');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
// Route::post('/checkuser', [HomeController::class, 'checkUser'])->name('logged');
