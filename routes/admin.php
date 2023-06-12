<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;

Route::get('',[HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users',UserController::class)->only('index','edit','update')->names('admin.users');

Route::resource('categories',CategoryController::class)->names('admin.categories');

Route::resource('products',ProductController::class)->names('admin.products');

Route::resource('patients',PatientController::class)->names('admin.patients');