<?php
namespace App\Factories;
use App\Models\Pokemon;
use illuminate\Support\Arr;

class PokemonFactory{
    /**
     * Edit/ store a pokemon into database
     *
     * @param Array $params
     * @param App\Models\Pokemon $pokemon=null
     * @return App\Models\Pokemon
     */
    public function save($params, Pokemon $pokemon=null){
        $pokemon = ($pokemon) ? : new Pokemon;
        // Must have attributes
        $pokemon->pokemon_id = $params['pokemon_id'];
        $pokemon->name = $params['name'];
        $pokemon->front_img = $params['front_img'];
        $pokemon->back_img = $params['back_img'];
        $pokemon->weight = $params['weight'];
        $pokemon->height = $params['height'];
        $pokemon->type = $params['type'];
        $pokemon->hp = $params['hp'];
        $pokemon->attack = $params['attack'];
        $pokemon->defense = (Arr::has($params, 'defense')) ? $params['defense'] : 10;
        // Save into database
        $pokemon->save();
        return $pokemon;
    }

    /**
     * Delete a pokemon from database
     *
     * @param App\Models\Pokemon $pokemon
     * @return void
     */
    public function delete(Pokemon $pokemon){
        $pokemon->delete();
        return;
    }
}

