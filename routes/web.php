<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', [FormController::class, 'create'])->name('home');
Route::post('/form', [FormController::class, 'store'])->name('form.store');

Route::get('/admin', [FormController::class, 'admin'])->name('admin');
Route::get('/admin/{id}/edit', [FormController::class, 'edit'])->name('form.edit');
Route::put('/admin/{id}', [FormController::class, 'update'])->name('form.update');
Route::delete('/admin/{id}', [FormController::class, 'destroy'])->name('form.destroy');