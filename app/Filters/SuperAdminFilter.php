<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class SuperAdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        if (session()->get('role') !== 'super_admin') {
            return redirect()->to('/admin/dashboard')
                ->with('error', 'Hanya Super Admin yang boleh mengakses');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
