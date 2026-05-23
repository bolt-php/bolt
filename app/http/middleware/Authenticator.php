<?php

namespace app\http\middleware;

use app\http\models\User;
use framework\web\request\Request;

class Authenticator {
    public function handle($next, Request $request) {
        $user = app()->session->get('user');

        $user = User::find($user);
        $request->put('user', $user);
        
        return $next();
    }
}