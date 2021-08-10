<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PagesController::class, 'index'])->name('index');

Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::prefix('posts')->group(function () {
    Route::get('/', [PostsController::class, 'index'])->name('posts');
    Route::get('/create', [PostsController::class, 'create'])->name('create');
    Route::post('/store', [PostsController::class, 'store'])->name('store');
    Route::get('/{post}', [PostsController::class, 'show'])->name('show');
    Route::get('/edit/{id}',[PostsController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',[PostsController::class, 'update'])->name('update');
    Route::delete('/delete/{id}',[PostsController::class, 'destroy'])->name('delete');
   
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
