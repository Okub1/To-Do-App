<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoitemController;
use App\Models\User;
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


Route::get("/", [HomeController::class, "index"])->name("home")->middleware("auth");
Route::get("/home", [HomeController::class, "index"])->name("home")->middleware("auth");

Route::post("/home/create", [TodoitemController::class, "store"])->middleware("auth");

// TODO: create middleware to CRUD users to their certain items only!!
Route::get("/home/{todoitem}", [TodoitemController::class, "show"])->middleware("auth");

Route::get("/home/{todoitem}/edit", [TodoitemController::class, "edit"])->middleware("auth");
Route::patch("/home/{todoitem}/edit", [TodoitemController::class, "update"])->middleware("auth");

Route::get("/home/{todoitem}/delete", [TodoitemController::class, "delete"])->middleware("auth");
Route::delete("/home/{todoitem}/delete", [TodoitemController::class, "destroy"])->middleware("auth");

Route::get("/home/{todoitem}/share", [TodoitemController::class, "share"])->middleware("auth");
Route::patch("/home/{todoitem}/share", [TodoitemController::class, "shareItem"])->middleware("auth");

Auth::routes();
