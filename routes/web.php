<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetController;
use App\Http\Controllers\JsonResponseController;

Route::get("/",[JsonResponseController::class,"error"])->name("none");

Route::get("/{table}",[GetController::class,'show'])->name("ApiGet");

Route::get("/{table}/{id}",[GetController::class,'find'])->name("ApiGetID");
