<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;


//First page
Route::get('/', [NoteController::class, 'index'])
    ->name('home');

//Shows 4 notes of notes table for each page
Route::get('/show', [NoteController::class, 'show'])
    ->middleware('verified')
    ->name('show');

//Stores a note
Route::post('/store-a-note', [NoteController::class, 'store'])
    ->middleware('verified')
    ->name('store');

//Stores checkbox status of a note
Route::post('/check-req', [NoteController::class, 'storeChecked'])
    ->middleware('verified');


//Edits the note
Route::get('edit-the-note/{id}', [NoteController::class, 'edit'])
    ->middleware('verified')
    ->name('edit');

//Updates the note
Route::post('update-the-note/{id}', [NoteController::class, 'update'])
    ->middleware('verified')
    ->name('update');

//Distroys the note
Route::get('destroy-the-note/{id}', [NoteController::class, 'destroy'])
    ->middleware('verified')
    ->name('destroy');

//Logout
Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Auth::routes(['verify' => true]);

require __DIR__ . '/auth.php';
