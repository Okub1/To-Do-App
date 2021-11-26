<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoItemController;
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


Route::group(["middleware" => "auth"], function () {
    Route::get("/", [HomeController::class, "index"])->name("home");
    Route::get("/home", [HomeController::class, "index"])->name("home");

    Route::post("/home/create", [TodoItemController::class, "store"]);

// TODO: create middleware to CRUD users to their certain items only!!
    Route::get("/home/{todoitem}", [TodoItemController::class, "show"]);

    Route::get("/home/{todoitem}/edit", [TodoItemController::class, "edit"]);
    Route::patch("/home/{todoitem}/edit", [TodoItemController::class, "update"])->name("editItem");

    Route::get("/home/{todoitem}/delete", [TodoItemController::class, "delete"]);
    Route::delete("/home/{todoitem}/delete", [TodoItemController::class, "destroy"])->name("deleteItem");

    Route::get("/home/{todoitem}/share", [TodoItemController::class, "share"]);
    Route::patch("/home/{todoitem}/share", [TodoItemController::class, "shareItem"])->name("shareItem");
});

Auth::routes();
