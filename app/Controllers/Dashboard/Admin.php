<?php

namespace App\Controllers\Dashboard;

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

        return view('board/super/manage', $data);
    }

    public function promote($id = null)
    {
        if (session()->get('role') !== 'super_admin') {
            return redirect()->to('/login');
        }

        $userModel = new \App\Models\UserModel();

        // Cek apakah user ada
        $user = $userModel->find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        // Update role
        $userModel->update($id, ['role' => 'admin']);

        return redirect()->back()->with('success', 'User ' . $user['nama_lengkap'] . ' berhasil dipromosikan menjadi Admin.');
    }

    public function demote($id = null)
    {
        // Hanya Super Admin yang boleh akses
        if (session()->get('role') !== 'super_admin') {
            return redirect()->back();
        }

        $userModel = new \App\Models\UserModel();

        // Cek apakah user ada
        $user = $userModel->find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        // Update role kembali menjadi 'anggota'
        $userModel->update($id, ['role' => 'anggota']);

        return redirect()->back()->with('success', 'User ' . $user['nama_lengkap'] . ' telah diturunkan menjadi Anggota.');
    }
}
