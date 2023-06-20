<?php

// RUTAS PARA EL ADMINISTRADOR

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\HistorialController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProveedorController;
use App\Http\Controllers\Admin\TreatmentController;
use App\Http\Controllers\Admin\UserController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

// Ruta para los usuarios
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

// Ruta para los roles
Route::resource('roles', RoleController::class)->names('admin.roles');

// Ruta para las categorias
Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

// Ruta para los proveedores
Route::resource('proveedores', ProveedorController::class)->names('admin.proveedores');

// Ruta para los productos
Route::resource('products', ProductController::class)->names('admin.products');

// Ruta para los pacientes
Route::resource('patients', PatientController::class)->names('admin.patients');

// Ruta para los historiales
Route::resource('historials', HistorialController::class)->names('admin.historials');

// Ruta para los tratamientos
Route::resource('treatments', TreatmentController::class)->names('admin.treatments');


