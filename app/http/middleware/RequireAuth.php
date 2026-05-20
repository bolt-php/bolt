<?php

namespace app\http\middleware;

use framework\web\request\Request;

class RequireAuth {
    public function handle($next, Request $request) {
        $user = $request->get('user');

        if (empty($user)) {
            return response()->redirect(app()->url->named('auth.login'));
        }
        
        return $next();
    }
}