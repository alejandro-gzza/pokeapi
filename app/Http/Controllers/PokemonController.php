<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;
use App\Factories\PokemonFactory;

class PokemonController extends Controller
{
    private $factory;

    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->factory = new PokemonFactory;
    }


    /**
     * View all pokemon
     *
     * @return View
     */
    public function index(){
        $pokemon = Pokemon::all();

        return view('pokemon.index')->with([
            'pokemon' => $pokemon
            // permite trabajar la variable en la vista
        ]);
    }

    /**
     * View creation form
     *
     * @return View
     */
    public function create(){

        return view('pokemon.create');
    }

    /**
     * Create a new pokemon
     *
     * @param \Illuminate\Http\Request $request
     * @return Redirection
     */
    public function store(Request $request){
        $params = $request->all();
        Pokemon::validate($params)->validate();
        $newPokemon = $this->factory->save($params);
        return redirect()->route('pokemon.show', $newPokemon->id);
        //
    }


    /*
    |--------------------------------------------------------------------------
    | Prefix 'pokemon/pokemon_id'
    |--------------------------------------------------------------------------
    */

     /**
     * View a specific pokemon
     *
     * @param int $pokemon_id
     * @return View
     */
    public function show($pokemon_id){
        $pokemon = Pokemon::find($pokemon_id);
        return view('pokemon.show')->with([
            'pokemon' => $pokemon
            // permite trabajar la variable en la vista
        ]);

    }

     /**
     * View editing form
     *
     * @param int $pokemon_id
     * @return View
     */
    public function edit($pokemon_id){
        $pokemon = Pokemon::find($pokemon_id);
        return view('pokemon.edit')->with([
            'pokemon' => $pokemon
            // permite trabajar la variable en la vista
        ]);
    }

     /**
     * Update an existing pokemon
     *
     * @param \Illuminate\Http\Request $request
     * @param int $pokemon_id
     * @return Redirection
     */
    public function update(Request $request, $pokemon_id){
        $pokemon = Pokemon::find($pokemon_id);
        $params = $request->all();
        Pokemon::validate($params, 'edit', ['pokemon_id' => $pokemon_id])->validate();
        $this->factory->save($params, $pokemon);
        return redirect()->route('pokemon.show', $pokemon_id);
    }

    /**
     * Delete an existing pokemon
     *
     * @param int $pokemon_id
     * @return Redirection
     */
    public function delete($pokemon_id){
        $pokemon = Pokemon::find($pokemon_id);
        $this->factory->delete($pokemon);
        return redirect()->route('pokemon.index');
    }
}
