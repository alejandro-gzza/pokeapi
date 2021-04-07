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
    return redirect()->route('pokemon.index');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');
// Pokemon pages

Route::prefix('pokemon')->group(function(){
    Route::get('/', [App\Http\Controllers\PokemonController::class, 'index'])->name('pokemon.index'); // Read
    Route::get('/create', [App\Http\Controllers\PokemonController::class, 'create'])->name('pokemon.create'); // Create
    Route::post('/store', [App\Http\Controllers\PokemonController::class, 'store'])->name('pokemon.store'); // Create

    Route::prefix('{pokemon_id}')->middleware('getPokemon')->group(function(){
        Route::get('/', [App\Http\Controllers\PokemonController::class, 'show'])->name('pokemon.show'); // Read
        Route::get('/edit', [App\Http\Controllers\PokemonController::class, 'edit'])->name('pokemon.edit'); // Update
        Route::post('/update', [App\Http\Controllers\PokemonController::class, 'update'])->name('pokemon.update'); // Update
        Route::delete('/', [App\Http\Controllers\PokemonController::class, 'delete'])->name('pokemon.delete'); // Delete
    });

    Route::prefix('api')->group(function(){
        Route::prefix('name/{name}')->group(function(){
            Route::get('/', [App\Http\Controllers\PokemonController::class, 'api_name'])->name('pokemon.api.name');
        });
        Route::prefix('id/{id}')->group(function(){
            Route::get('/', [App\Http\Controllers\PokemonController::class, 'api_id'])->name('pokemon.api.id');
        });
        Route::post('/', [App\Http\Controllers\PokemonController::class, 'api_store'])->name('pokemon.api.store');
    });



});

// Users pages

Route::prefix('users')->group(function(){
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::prefix('{user_id}')->middleware('getUser')->group(function(){
        Route::get('/', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');

        Route::prefix('pokemon')->group(function(){
            Route::get('/create', [App\Http\Controllers\UserPokemonController::class, 'create'])->name('users.pokemon.create'); // Create
            Route::post('/store', [App\Http\Controllers\UserPokemonController::class, 'store'])->name('users.pokemon.store'); // Create

            Route::prefix('{pivot_id}')->group(function(){
                Route::delete('/', [App\Http\Controllers\UserPokemonController::class, 'delete'])->name('users.pokemon.delete'); // Delete
            });
        });
    });
});
