<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EmployeeModel;

class Employee extends BaseController
{
    public function index()
    {
        $model = new EmployeeModel();

        $search = $this->request->getGet('q') ?? '';

        $employees = $model->like('name', $search)
            ->orLike('email', $search)
            ->findAll();

        $currentPage = 'employees';
        $title = 'Employee - Index';

        return view('employee/index', compact('employees', 'currentPage', 'title'));
    }

    public function detail($id)
    {
        $model = new EmployeeModel();
        $employee = $model->find($id);

        if (!$employee) {
            return redirect()->to('/employees')
                ->with('errors', ['Employee not found']);
        }

        $currentPage = 'employees';
        $title = 'Employee - Detail';

        return view('employee/detail', compact('employee', 'currentPage', 'title'));
    }

    public function create()
    {
        $currentPage = 'employees';
        $title = 'Employee - Create';

        return view('employee/create', compact('currentPage', 'title'));
    }

    public function store()
    {
        try {
            $validation = \Config\Services::validation();

            $rules = [
                'name' => 'required',
                'email' => 'required|valid_email',
                'phone' => 'required',
                'address' => 'required',
                'photo' => [
                    'rules' => 'uploaded[photo]|max_size[photo,300]|mime_in[photo,image/jpeg,image/jpg]',
                    'errors' => [
                        'uploaded' => 'Photo is required',
                        'max_size' => 'Photo must be less than 300KB',
                        'mime_in' => 'Photo must be a JPEG image'
                    ]
                ]
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $validation->getErrors());
            }

            $model = new EmployeeModel();

            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $phone = $this->request->getPost('phone');
            $address = $this->request->getPost('address');
            $photo = $this->request->getFile('photo');


            $photoName = $photo->getRandomName();
            $photo->move(FCPATH . 'uploads', $photoName);

            $model->save([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'photo' => $photoName
            ]);

            return redirect()->to('/employees')
                ->with('success', 'Employee created successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('errors', ['Failed to create employee: ' . $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $model = new EmployeeModel();
        $employee = $model->find($id);

        if (!$employee) {
            return redirect()->to('/employees')
                ->with('errors', ['Employee not found']);
        }

        $currentPage = 'employees';
        $title = 'Employee - Edit';

        return view('employee/edit', compact('employee', 'currentPage', 'title'));
    }

    public function update($id)
    {
        try {
            $model = new EmployeeModel();
            $employee = $model->find($id);

            if (!$employee) {
                return redirect()->to('/employees')
                    ->with('errors', ['Employee not found']);
            }

            $validation = \Config\Services::validation();

            $rules = [
                'name' => 'required',
                'email' => 'required|valid_email',
                'phone' => 'required',
                'address' => 'required',
                'photo' => [
                    'rules' => 'max_size[photo,300]|mime_in[photo,image/jpeg,image/jpg]',
                    'errors' => [
                        'max_size' => 'Photo must be less than 300KB',
                        'mime_in' => 'Photo must be a JPEG image'
                    ]
                ]
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $validation->getErrors());
            }

            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $phone = $this->request->getPost('phone');
            $address = $this->request->getPost('address');

            $photoName = $employee['photo'];


            if ($this->request->getFile('photo')->isValid()) {
                $photo = $this->request->getFile('photo');

                // Delete old photo
                if ($employee['photo'] && file_exists(FCPATH . 'uploads/' . $employee['photo'])) {
                    unlink(FCPATH . 'uploads/' . $employee['photo']);
                }

                $photoName = $photo->getRandomName();
                $photo->move(FCPATH . 'uploads', $photoName);
            }

            $model->update($id, [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'photo' => $photoName
            ]);

            return redirect()->to('/employees')
                ->with('success', 'Employee updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('errors', ['Failed to update employee: ' . $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            $model = new EmployeeModel();
            $employee = $model->find($id);

            if (!$employee) {
                return redirect()->to('/employees')
                    ->with('errors', ['Employee not found']);
            }

            // Delete photo
            if ($employee['photo'] && file_exists(FCPATH . 'uploads/' . $employee['photo'])) {
                unlink(FCPATH . 'uploads/' . $employee['photo']);
            }

            $model->delete($id);

            return redirect()->to('/employees')
                ->with('success', 'Employee deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('errors', ['Failed to delete employee: ' . $e->getMessage()]);
        }
    }
}
