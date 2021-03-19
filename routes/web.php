<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Pokemon pages

Route::prefix('pokemon')->group(function(){
    Route::get('/', [App\Http\Controllers\PokemonController::class, 'index'])->name('pokemon.index'); // Read
    Route::get('/create', [App\Http\Controllers\PokemonController::class, 'create'])->name('pokemon.create'); // Create
    Route::post('/store', [App\Http\Controllers\PokemonController::class, 'store'])->name('pokemon.store'); // Create

    Route::prefix('{pokemon_id}')->group(function(){
        Route::get('/', [App\Http\Controllers\PokemonController::class, 'show'])->name('pokemon.show'); // Read
        Route::get('/edit', [App\Http\Controllers\PokemonController::class, 'edit'])->name('pokemon.edit'); // Update
        Route::post('/update', [App\Http\Controllers\PokemonController::class, 'update'])->name('pokemon.update'); // Update
        Route::delete('/', [App\Http\Controllers\PokemonController::class, 'delete'])->name('pokemon.delete'); // Delete
    });


});
