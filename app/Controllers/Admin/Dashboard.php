<?php

namespace App\Controllers\Admin;

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

        return view('admin/dashboard', $data);
    }

    public function anggota()
    {
        $userModel = new UserModel();

        // 🔎 Ambil query dari URL
        $keyword = $this->request->getGet('q');
        $status  = $this->request->getGet('status');

        $builder = $userModel->where('role', 'anggota');

        // 🔍 Search (nama / NIK)
        if ($keyword) {
            $builder->groupStart()
                ->like('nama_lengkap', $keyword)
                ->orLike('nik', $keyword)
                ->groupEnd();
        }

        // 🎯 Filter status
        if ($status) {
            $builder->where('status', $status);
        }

        $data = [
            'anggota' => $builder->paginate(10, 'anggota'),
            'pager'   => $userModel->pager,
            'keyword' => $keyword,
            'status'  => $status,
        ];

        return view('admin/pages/anggota', $data);
    }
}
