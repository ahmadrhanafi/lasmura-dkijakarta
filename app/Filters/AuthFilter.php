<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $path = trim($request->getUri()->getPath(), '/');

        // BELUM LOGIN
        if (!$session->get('logged_in')) {

            // TAPI LAGI AKTIVASI → BOLEH
            if ($session->get('need_activation') && $path === 'aktivasi') {
                return;
            }

            return redirect()->to('/login');
        }

        // SUDAH LOGIN TAPI MAKSA KE /AKTIVASI
        if ($session->get('logged_in') && $path === 'aktivasi') {
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
