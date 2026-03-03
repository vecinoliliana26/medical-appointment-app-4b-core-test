<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin');
//Route::get('/', function () {
  //  return view('welcome');
//});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas para la gestión de tickets de soporte
    Route::get('/soporte', [App\Http\Controllers\TicketController::class, 'index'])->name('tickets.index');
    Route::get('/soporte/nuevo', [App\Http\Controllers\TicketController::class, 'create'])->name('tickets.create');
    Route::post('/soporte', [App\Http\Controllers\TicketController::class, 'store'])->name('tickets.store');
});
