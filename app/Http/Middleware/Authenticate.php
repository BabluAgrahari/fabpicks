<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        
        if (empty(Auth::user())){
            return url('/');
        }
           

        if (!empty(Auth::user()))
            $request->merge(['user_id' => Auth::user()->_id, 'parent_id' => Auth::user()->parent_id]);
    }
}
