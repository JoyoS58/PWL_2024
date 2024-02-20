<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticlesController;

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
// Basic Routes
Route::get('/hello', function () {
    return 'Hello World';
    });

Route::get('/world', function () {
    return 'World';
    });

Route::get('/', function(){
    return 'Selamat Datang';
});
Route::get('/about', function(){
    return 'Nama : Joyo Sugito | NIM : 2241720050';
});

//Route Parameters
Route::get('/user/{name}', function ($name) {
    return 'Nama saya '.$name;
    });
Route::get('/posts/{post}/comments/{comment}', function
    ($postId, $commentId) {
    return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
    });
Route::get('/articles/{id}', function
    ($idArticles) {
    return 'Halaman Artikel dengan ID '.$idArticles;
    });

// Optional Parameters
Route::get('/user/{name?}', function ($name=null) {
    return 'Nama saya '.$name;
    });
Route::get('/user/{name?}', function ($name='John') {
    return 'Nama saya '.$name;
    });

// Route Name
Route::get('/user/profile', function() {
    //
    })->name('profile');

// Route Group dan Route Prefixes

// Route with Controller
Route::get('/hello', [WelcomeController::class,'hello']);
Route::get('/index', [PageController::class,'index']);
Route::get('/about', [PageController::class,'about']);
Route::get('/articles/{id}', [PageController::class,'articles']);
Route::get('/index', [HomeController::class,'index']);
Route::get('/about', [AboutController::class,'about']);
Route::get('/articles/{id}', [ArticlesController::class,'articles']);

// Resource Controller
use App\Http\Controllers\PhotoController;
Route::resource('photos', PhotoController::class);

Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
    ]);

Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
    ]);



    // Route::get('mahasiswa', function ($id) {
    // });
    // Route::post('mahasiswa', function ($id) {
    // });
    // Route::put('mahasiswa', function ($id) {
    // });
    // Route::delete('mahasiswa', function ($id) {
    // });
    // Route::get('mahasiswa/{id}', function ($id) {
    // });
    // Route::put('mahasiswa/{id}', function ($id) {
    // });
    // Route::delete('mahasiswa/{id}', function ($id) {
    // });