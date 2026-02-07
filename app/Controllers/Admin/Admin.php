<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Admin extends BaseController
{
    public function index()
    {
        if (session()->get('role') !== 'super_admin') {
            return redirect()->back();
        }

        $userModel = new UserModel();

        // Ambil input filter
        $keyword = $this->request->getVar('keyword');
        $role    = $this->request->getVar('role');

        // Mulai Query
        $builder = $userModel->where('status', 'aktif');

        // Jika ada keyword pencarian
        if ($keyword) {
            $builder->groupStart()
                ->like('nama_lengkap', $keyword)
                ->orLike('username', $keyword)
                ->groupEnd();
        }

        // Jika ada filter role
        if ($role) {
            $builder->where('role', $role);
        }

        $data = [
            'title'         => 'Manajemen Admin | Dashboard LASMURA DKI Jakarta',
            'keyword'       => $keyword,
            'selected_role' => $role,
            'users'         => $builder
                ->orderBy("FIELD(role,'super_admin','admin','anggota')", '', false)
                ->orderBy('nama_lengkap', 'ASC')
                ->paginate(10, 'user'),
            'pager'         => $userModel->pager,
            'total_user'    => $builder->countAllResults(false) // Hitung total setelah filter
        ];

        return view('admin/pages/admin/index', $data);
    }
}
