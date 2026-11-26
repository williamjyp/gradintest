<?php


use App\Http\Controllers\KurirController;

use Illuminate\Support\Facades\Route;

Route::get('/',[KurirController::class,'index']);

Route::get('/kurir/index', [KurirController::class,'index'])->name('index');

Route::post('/kurir/store', [KurirController::class,'store'])->name('store');

Route::get('/kurir/show', [KurirController::class,'show'])->name('show');
Route::post('/kurir/update', [KurirController::class,'update'])->name('update');
Route::post('/kurir/destroy', [KurirController::class,'destroy'])->name('destroy');