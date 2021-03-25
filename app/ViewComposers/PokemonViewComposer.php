<?php

namespace App\ViewComposers;
use Illuminate\View\View;

class PokemonViewComposer{

    /**
     * Bind data to the view
     *
     * @param View $view
     * return void
     */
    public function compose(View $view){
        $view->with([
            'pokemon' => request()->pokemon,
            'pokemon_id' => request()->pokemon_id
        ]);
    }
}
