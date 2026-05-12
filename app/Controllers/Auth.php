<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function authenticate()
    {
        $model = new UserModel();

        $user = $model
            ->where('username', $this->request->getPost('username'))
            ->first();

        if (!$user) {
            return redirect()->back()
                ->with('error', 'Username or password is incorrect');
        }

        if (!password_verify(
            $this->request->getPost('password'),
            $user['password']
        )) {

            return redirect()->back()
                ->with('error', 'Username or password is incorrect');
        }

        session()->set('user', [
            'id' => $user['id'],
            'name' => $user['name'],
            'role' => $user['role']
        ]);

        return redirect()->to('/users');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}
