<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Factories\PokemonFactory;
use App\Helpers\Pokeapi;
use App\Models\Pokemon;

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
        $pokemons = Pokemon::all();
        $route_name = Route::currentRouteName();

        return view('pokemon.index')->with([
            'pokemons' => $pokemons,
            'route_name' => $route_name
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
     * @param \Illuminate\Http\Request $request
     * @return View
     */
    public function show($pokemon_id, Request $request){
        $route_name = Route::currentRouteName();

        return view('pokemon.show')->with([
            'route_name' => $route_name
            // permite trabajar la variable en la vista
        ]);

    }

     /**
     * View editing form
     *
     * @param int $pokemon_id
     * @param \Illuminate\Http\Request $request
     * @return View
     */
    public function edit($pokemon_id, Request $request){

        return view('pokemon.edit');
    }

     /**
     * Update an existing pokemon
     *
     * @param \Illuminate\Http\Request $request
     * @param int $pokemon_id
     * @return Redirection
     */
    public function update($pokemon_id, Request $request){
        $params = $request->all();
        $params['pokemon_id'] = $params['pokemon_game_id'];
        Pokemon::validate($params, 'edit', ['pokemon_id' => $request->pokemon->id])->validate();
        $this->factory->save($params, $request->pokemon);
        return redirect()->route('pokemon.show', $pokemon_id);
    }

    /**
     * Delete an existing pokemon
     *
     * @param \Illuminate\Http\Request $request
     * @param int $pokemon_id
     * @return Redirection
     */
    public function delete($pokemon_id, Request $request){
        $this->factory->delete($request->pokemon);
        return redirect()->route('pokemon.index');
    }

    /*
    |--------------------------------------------------------------------------
    | Prefix 'pokemon/api/'
    |--------------------------------------------------------------------------
    */

    public function api_name($name){
        $api = new Pokeapi;
        $pokemon = $api->get_pokemon_by_id($name)['body'];
        return view('api.show')->with([
            'pokemon' => $pokemon
        ]);
    }

    public function api_id($id){
        $api = new Pokeapi;
        $pokemon = $api->get_pokemon_by_id($id)['body'];

        return view('api.show')->with([
            'pokemon' => $pokemon
        ]);
    }
    /**
     * Store a pokemon from the api
     *
     * @param \Illuminate\Http\Request $request
     * @return Redirection
     */
    public function api_store(Request $request){
        $params = $request->all();
        Pokemon::validate($params, 'api')->validate();
        $api = new Pokeapi;
        $data = $api->get_pokemon_by_id($params['pokemon_id'])['body'];
        $params['name'] = $data->name;
        $params['front_img'] = $data->sprites->front_default;
        $params['back_img'] = $data->sprites->back_default;
        $params['weight'] = $data->weight;
        $params['height'] = $data->height;
        $params['type'] = $data->types[0]->type->name;
        $params['hp'] = $data->stats[0]->base_stat;
        $params['attack'] = $data->stats[1]->base_stat;
        $params['defense'] = $data->stats[2]->base_stat;

        $pokemon = $this->factory->save($params);
        return redirect()->route('pokemon.show', [$pokemon->id]);
    }
}
