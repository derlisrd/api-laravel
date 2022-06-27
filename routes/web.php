<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetController;


Route::get("/",function(){ return response()->json(['message' => 'Not Found!'], 404);})->name("none");

Route::get("/{table}",[GetController::class,'show'])->name("ApiGet");
