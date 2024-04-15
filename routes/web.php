<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Testing\WithoutMiddleware;
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

Route::get("/", [DashboardController::class, 'dashboard'])->name('dashboard');


Route::resource('ideas',IdeaController::class)->except(['index','create'])->middleware('auth');

Route::resource('ideas',IdeaController::class)->only(['show']);

Route::resource('ideas.comments',CommentController::class)->only(['store'])->middleware('auth');

Route::resource('users',UserController::class)->only('show','edit','update')->middleware('auth');

Route::get('/terms', function () {
    return view('terms');
});











// for making a comment function
// model
// controller
// migration
//setup the routes

// this route manually created without route::group and route::resource

// Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');

// Route::post('', [IdeaController::class, 'store'])->name('store');

// Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');

// Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');

// Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');


// Route::group([ 'prefix' => 'ideas/','as'=>'ideas.'], function () {

//     Route::group(['middleware' => ['auth']], function (){

//     Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
//     });
// });
