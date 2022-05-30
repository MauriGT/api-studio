<?php

use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;

Route::post("/register",[RegisterController::class,'store'])->name('api.v1.register');


Route::apiResource('categories',CategoryController::class)->names('api.v1.categories');
