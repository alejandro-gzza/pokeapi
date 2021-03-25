<?php

namespace App\Http\Middleware;

use App\Models\Pokemon;
use Closure;
use Illuminate\Http\Request;

class GetPokemon
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $pokemon = Pokemon::find($request->pokemon_id);
        if(!$pokemon){
            return redirect()->route('pokemon.index');
        }
        $request->pokemon = $pokemon;
        return $next($request);
    }
}
