<?php

use App\Http\Controllers\PostController;
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
    return view('home');
});

Route::get('/table', function () {
    return view('table');
});

Route::get('/update', function () {
    return view('update');
});

Route::get('/delete', function () {
    return view('delete');
});

Route::resource('tes', 'PostController');
Route::get('/post', [PostController::class, 'index']);
Route::get('/post/create', [PostController::class, 'create']);
Route::post('/post/save', [PostController::class, 'store']);
Route::get('/post/edit{id}', [PostController::class, 'show']);
Route::get('/post/update{id}', [PostController::class, 'update']);
Route::get('/delete{id}',[PostController::class,'destroy']);