<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
          if ($_SERVER['REMOTE_ADDR'] == "24.133.200.66") {
        ini_set('display_errors', 1);
        config(['app.debug' => 'true']);
        }   

        if (! $request->expectsJson()) {
            return route('signin');
        }
    }
}
