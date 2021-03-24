<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\User;
use App\Models\UserPokemon;
use Illuminate\Http\Request;

class UserPokemonController extends Controller
{

    /**
     * View creation form
     *
     * @param int $user_id
     * @return View
     */
    public function create($user_id){
        $pokemon = Pokemon::all();
        return view('users.create')->with([
            'pokemon' => $pokemon,
            'user_id' => $user_id
        ]);
    }

    /**
     * Adds a new pokemon into users table
     *
     * @param int $user_id
     * @param \Illuminate\Http\Request $request
     * @return Redirection
     */
    public function store($user_id, Request $request){
        $user = User::find($user_id);
        $pokemon = Pokemon::find($request->pokemon_id); //recordar que es el id de la tabla pokemon, no pokemon_id
        $user->pokemon()->attach($pokemon);
        return redirect()->route('users.show', $user_id);
    }

    /**
     * Deletes a pokemon in users table
     *
     * @param int $user_id
     * @param int $pivot_id
     * @return Redirection
     */
    public function delete($user_id, $pivot_id){
        $pivot = UserPokemon::find($pivot_id);
        $pivot->delete();
        return redirect()->route('users.show', [$user_id]);
    }

}
