<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AdminController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        $users = $userModel
            ->whereIn('role', ['anggota', 'admin'])
            ->findAll();

        return view('superadmin/manajemen_admin', [
            'users' => $users
        ]);
    }

    public function updateRole($id)
    {
        $role = $this->request->getPost('role');

        if (!in_array($role, ['anggota', 'admin'])) {
            return redirect()->back()->with('error', 'Role tidak valid');
        }

        $userModel = new UserModel();
        $userModel->update($id, [
            'role' => $role
        ]);

        return redirect()->back()->with('success', 'Role berhasil diubah');
    }
}
