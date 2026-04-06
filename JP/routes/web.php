<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;


Route::get('/cars/index',[CarsController::class, 'index'])->name('cars.index');
Route::get('/cars/indexShow',[CarsController::class, 'indexShow'])->name('cars.indexShow');
Route::get('/cars/create',[CarsController::class,'create'])->name('cars.create');
Route::post('/cars/submit',[CarsController::class,'submit'])->name('cars.submit');
Route::get('cars/edit/{id}',[CarsController::class,'edit'])->name('cars.edit');
Route::put('cars/{id}',[CarsController::class,'update'])->name('cars.update');
Route::delete('cars/{id}',[CarsController::class,'delete'])->name('cars.delete');
Route::get('/cars/show/{id}',[CarsController::class,'show'])->name('cars.show');

