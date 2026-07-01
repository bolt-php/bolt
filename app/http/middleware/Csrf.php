<?php

namespace app\http\middleware;

use Exception;
use framework\contracts\request\RequestInterface;

class Csrf
{
    public function handle($next, RequestInterface $request)
    {
        if ($request->method() != 'GET') {
            if (!\framework\web\utils\security\Csrf::validate($request->post('_csrf'))) {
                throw new Exception("Unable to verify CSRF token");
            }
        }

        return $next();
    }
}