<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class UserController extends Controller
{
    /**
     * View all users
     *
     * @return View
     */
    public function index(){

        return view('users.index');
    }

    /**
     * View a specific user
     *
     * @param \Illuminate\Http\Request $request
     * @param int $user_id
     * @return View
     */
    public function show($user_id, Request $request){
        //$user = User::find($user_id);
        $user = $request->user;
        $pokemon = $user->pokemon;
        $route_name = Route::currentRouteName();
        return view('users.show')->with([
            'pokemon' => $pokemon,
            'route_name' => $route_name,
            'user_id' => $user_id
            // permite trabajar la variable en la vista
        ]);
    }
}
