<?php

use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\AdminFilmController;
use App\Http\Controllers\admin\AdminMessageController;
use App\Http\Controllers\fron\indexController;
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

//Admin

Route::prefix("/admin")->name("admin.")->group(function () {
    Route::redirect("/", "login");
    Route::get('/login', [AdminController::class, "login"])->name("login");
    Route::post('/check', [AdminController::class, "loginCheck"])->name("login.check");
    Route::middleware("auth")->group(function () {

        Route::get('/dashboard', [AdminController::class, "index"])->name("dashboard");

        Route::get('/film', [AdminFilmController::class, "film"])->name("film");
        Route::get('/film-add', [AdminFilmController::class, "filmAddView"])->name("film-add");
        Route::post('/film-add', [AdminFilmController::class, "FilmAdd"])->name("film-add-check");
        Route::get('/film-delete/{id}', [AdminFilmController::class, "filmDelete"])->name("film-delete");

        Route::get('/category', [AdminCategoryController::class, "index"])->name("category");

        Route::get('/message', [AdminMessageController::class, "message_list"])->name("message");

        Route::get('/logout', [AdminController::class, "logout"])->name("logout");
    });
});

// Front
Route::get('/', [indexController::class, "index"])->name("anasayfa");
Route::get('/gender/{id?}', [indexController::class, "index"])->name("gender");
Route::post('/status', [indexController::class, "status"])->name("status");
