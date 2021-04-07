<?php

namespace App\ViewComposers;
use Illuminate\View\View;

class UserViewComposer{

    /**
     * Bind data to the view
     *
     * @param View $view
     * return void
     */
    public function compose(View $view){
        $view->with([
            'user' => request()->user,
            'user_id' => request()->user_id
        ]);
    }
}
