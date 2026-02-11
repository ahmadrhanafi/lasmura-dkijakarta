<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Administrator | Dashboard LASMURA DKI JAKARTA',
            'role'  => 'admin',
            'breadcrumb' => [
                ['label' => 'Dashboard', 'url' => base_url('/admin/dashboard'), 'icon' => 'fa-solid fa-gauge'],
            ],
        ];

        logAktivitas('Dashboard', 'Mengakses halaman dashboard');

        return view('board/dashboard', $data);
    }
}
