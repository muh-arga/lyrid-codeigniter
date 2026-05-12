<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $users = $model->findAll();

        $title = 'User - Index';
        $currentPage = 'users';

        return view('user/index', compact('users', 'currentPage', 'title'));
    }

    public function detail($id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        if (!$user) {
            return redirect()->to('/users')
                ->with('errors', ['User not found']);
        }

        $currentPage = 'users';
        $title = 'User - Detail';

        return view('user/detail', compact('user', 'currentPage', 'title'));
    }

    public function create()
    {
        $roles = UserModel::getRoleList();
        $currentPage = 'users';
        $title = 'User - Create';

        return view('user/create', compact('roles', 'currentPage', 'title'));
    }

    public function store()
    {
        try {
            $validation = \Config\Services::validation();

            $rules = [
                'name' => 'required',
                'username' => 'required|is_unique[users.username]',
                'password' => 'required',
                'role' => 'required'
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $validation->getErrors());
            }

            $model = new UserModel();

            $name = $this->request->getPost('name');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $role = $this->request->getPost('role');

            $model->insert([
                'name' => $name,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role' => $role
            ]);

            return redirect()->to('/users');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('errors', ['Failed to create user: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        if (!$user) {
            return redirect()->to('/users')
                ->with('errors', ['User not found']);
        }

        $roles = UserModel::getRoleList();
        $currentPage = 'users';
        $title = 'User - Edit';

        return view('user/edit', compact('user', 'roles', 'currentPage', 'title'));
    }

    public function update($id)
    {
        try {
            $model = new UserModel();

            $user = $model->find($id);

            if (!$user) {
                return redirect()->to('/users')
                    ->with('errors', ['User not found']);
            }

            $validation = \Config\Services::validation();

            $rules = [
                'name' => 'required',
                'username' => 'required|is_unique[users.username,id,' . $id . ']',
                'role' => 'required'
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $validation->getErrors());
            }

            $name = $this->request->getPost('name');
            $username = $this->request->getPost('username');
            $role = $this->request->getPost('role');

            if ($this->request->getPost('password')) {
                $model->update($id, [
                    'name' => $name,
                    'username' => $username,
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    'role' => $role
                ]);
            } else {
                $model->update($id, [
                    'name' => $name,
                    'username' => $username,
                    'role' => $role
                ]);
            }

            return redirect()->to('/users');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('errors', ['Failed to update user: ' . $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            $model = new UserModel();

            $user = $model->find($id);

            if (!$user) {
                return redirect()->to('/users')
                    ->with('errors', ['User not found']);
            }

            $model->delete($id);

            return redirect()->to('/users');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('errors', ['Failed to delete user: ' . $e->getMessage()]);
        }
    }
}
