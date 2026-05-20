<?php

namespace app\http\controllers;

use app\http\models\LoginModel;
use app\http\models\User;
use app\http\services\AuthService;
use framework\web\request\Request;

class AuthController {
    public function register() {
        return view()->with('user', new User());
    }

    public function store(Request $request) {
        $user = User::from($request->post());

        
        if ($user->validate()) {
            $user->password = password_hash($user->password, PASSWORD_DEFAULT);
            $user->save();
        }
        else {
            var_dump($user->errors);
            exit();
        }

        return response()->redirect(app()->url->named('auth.login'));
    }

    public function login() {
        return view()->with('model', new LoginModel());
    }

    public function authenticate(LoginModel $model) {
        if (!$model->validate()) {
            return view('auth.login', [
                'model' => $model,
            ]);
        }

        $user = AuthService::authenticate($model);

        if (empty($user)) {
            return view('auth.login', [
                'model' => $model,
            ]);
        }

        app()->session->set('user', $user->id);

        return response()->redirect('/');
    }

    public function logout() {
        app()->session->unset();

        return response()->redirect('/');
    }
}