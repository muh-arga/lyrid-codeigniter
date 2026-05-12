<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null) 
    {
        $user = session()->get('user');
        if (!$user) {
            return redirect()->to('/login');
        }

        if ($user['role'] !== 'admin') {
            return redirect()->to('/employees')
                ->with('error', 'Access denied');
        }
    }

    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {}
}
