<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        $data = [
            'title' => 'Login | LASMURA DKI JAKARTA'
        ];

        return view('auth/login', $data);
    }

    public function attemptLogin()
    {
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel
            ->where('username', $username)
            ->where('status', 'aktif')
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Username yang Anda masukkan tidak ditemukan atau belum disetujui oleh admin');
        }

        // 🔐 BELUM AKTIVASI (password NULL)
        if (is_null($user['password'])) {

            session()->set([
                'id_user'          => $user['id_user'],
                'username'         => $user['username'],
                'need_activation'  => true
            ]);
            // dd(session()->get());
            return redirect()->to('/aktivasi');
        }

        // 🔐 SUDAH AKTIVASI → WAJIB PASSWORD
        if (empty($password) || !password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Password salah');
        }

        session()->set([
            'id_user'          => $user['id_user'],
            'username'         => $user['username'],
            'nama_lengkap'     => $user['nama_lengkap'],
            'role'             => $user['role'],
            'logged_in'        => true,
            'need_activation'  => false
        ]);

        if (in_array($user['role'], ['super_admin', 'admin'])) {
            return redirect()->to('/admin/dashboard');
        }

        // if ($user['role'] === 'super_admin') {
        //     return redirect()->to('/super-admin/dashboard');
        // }

        // if ($user['role'] === 'admin') {
        //     return redirect()->to('/admin/dashboard');
        // }

        return redirect()->to('/');
    }

    public function aktivasi()
    {
        if (!session()->get('need_activation')) {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Aktivasi Akun | LASMURA DKI JAKARTA'
        ];

        return view('auth/aktivasi', $data);
    }

    public function prosesAktivasi()
    {
        if (!session()->get('need_activation')) {
            return redirect()->to('/');
        }

        $username = $this->request->getPost('username');
        $nik      = $this->request->getPost('nik');
        $password = $this->request->getPost('password');
        $confirm  = $this->request->getPost('password_confirm');

        if ($password !== $confirm) {
            return redirect()->back()->with('error', 'Password tidak cocok');
        }

        $userModel = new UserModel();

        $user = $userModel
            ->where('id_user', session()->get('id_user'))
            ->where('username', $username)
            ->where('nik', $nik)
            ->where('password', null)
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Data aktivasi tidak valid');
        }

        // ✅ set password
        $userModel->update($user['id_user'], [
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        // 🔴 LOGOUT PAKSA SETELAH AKTIVASI
        session()->remove(['id_user', 'username', 'role', 'logged_in', 'need_activation']);
        // session()->destroy();

        return redirect()->to('/login')
            ->with('success', 'Selamat, aktivasi akun berhasil. Silakan login dengan password baru.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
