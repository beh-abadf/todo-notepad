<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


//Shows notes each page has 4 notes
Route::get('/', [NoteController::class, 'index'])
    ->name('home');

//Stores a note
Route::post('/store-a-note', [NoteController::class, 'store'])
    ->name('store');

//Edits the note
Route::get('edit-the-note/{note}', [NoteController::class, 'edit'])
    ->name('edit');

//Updates the note
Route::post('update-the-note/{note}', [NoteController::class, 'update'])
    ->name('update');

//Distroys the note
Route::get('destroy-the-note/{note}', [NoteController::class, 'destroy'])
    ->name('destroy');

//Logout
Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
