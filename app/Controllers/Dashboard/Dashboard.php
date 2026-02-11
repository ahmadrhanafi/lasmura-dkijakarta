<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\PendaftaranModel;
use App\Models\BeritaModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $pendaftaranModel = new PendaftaranModel();
        $beritaModel = new BeritaModel();
        $userModel = new UserModel();

        $data = [
            'title' => 'Dashboard Administrator | Dashboard LASMURA DKI JAKARTA',
            'role'  => 'admin',
            'breadcrumb' => [
                ['label' => 'Dashboard', 'url' => base_url('/admin/dashboard'), 'icon' => 'fa-solid fa-gauge'],
            ],
            'stats' => [
                'total_anggota'   => $userModel->where('role', 'anggota')
                    ->where('status', 'aktif')
                    ->countAllResults(),

                'total_pendaftar' => $pendaftaranModel->where('status', 'menunggu')
                    ->countAllResults(),

                'total_berita'    => $beritaModel->where('status', 'publish')
                    ->countAllResults(),
            ]
        ];

        logAktivitas('Dashboard', 'Mengakses halaman dashboard');

        return view('board/dashboard', $data);
    }
}
