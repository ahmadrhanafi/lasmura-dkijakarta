<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PendaftaranModel;

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
        session()->set('login_at', time());

        $userModel = new UserModel();
        $pendaftaranModel = new PendaftaranModel();

        $loginIdentity = $this->request->getPost('username');
        $password      = $this->request->getPost('password');

        // 1. Cek dulu di tabel Users (Akun yang sudah resmi/aktif)
        $user = $userModel
            ->groupStart()
            ->where('username', $loginIdentity)
            ->orWhere('nomor_anggota', $loginIdentity)
            ->groupEnd()
            ->first();

        // 2. Jika tidak ada di tabel Users, cek di tabel Pendaftaran
        if (!$user) {
            $pendaftar = $pendaftaranModel->where('username', $loginIdentity)->first();

            if ($pendaftar) {
                if ($pendaftar['status'] === 'menunggu') {
                    return redirect()->back()->with('error', 'Pendaftaran Anda masih dalam tahap moderasi Admin. Mohon tunggu beberapa saat lagi.');
                }
                if ($pendaftar['status'] === 'ditolak') {
                    return redirect()->back()->with('error', 'Mohon maaf, pendaftaran Anda ditolak. Silakan hubungi admin untuk informasi lebih lanjut.');
                }
            }

            return redirect()->back()->with('error', 'Username atau Nomor Anggota tidak ditemukan.');
        }

        // 3. Jika user ada tapi statusnya tidak aktif (misal diblokir)
        if ($user['status'] !== 'aktif') {
            return redirect()->back()->with('error', 'Akun Anda telah dinonaktifkan.');
        }

        // 4. Logika Aktivasi (Password NULL)
        if (is_null($user['password'])) {
            session()->set([
                'id_user'         => $user['id_user'],
                'username'        => $user['username'],
                'nomor_anggota'   => $user['nomor_anggota'],
                'need_activation' => true
            ]);
            return redirect()->to('/aktivasi')->with('success', 'Akun ditemukan! Silakan lakukan aktivasi password.');
        }

        // 5. Verifikasi Password (Untuk yang sudah aktivasi)
        if (empty($password) || !password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Password salah.');
        }

        // 6. Set Session Login Full
        session()->set([
            'id_user'      => $user['id_user'],
            'username'     => $user['username'],
            'nama_lengkap' => $user['nama_lengkap'],
            'role'         => $user['role'],
            'logged_in'    => true
        ]);

        return (in_array($user['role'], ['super_admin', 'admin']))
            ? redirect()->to('/admin/dashboard')
            : redirect()->to('/');
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
        // 1. Pastikan user memang sedang dalam status 'need_activation'
        if (!session()->get('need_activation')) {
            return redirect()->to('/login');
        }

        // 2. Ambil input dari form aktivasi
        $username      = $this->request->getPost('username');
        $nomorAnggota  = $this->request->getPost('nomor_anggota');
        $password      = $this->request->getPost('password');
        $confirm       = $this->request->getPost('password_confirm');

        // 3. Validasi Password Match
        if ($password !== $confirm) {
            return redirect()->back()->with('error', 'Konfirmasi password tidak cocok');
        }

        $userModel = new UserModel();

        // 4. Verifikasi Data: Cocokkan ID (dari session) dengan Username & Nomor Anggota
        $user = $userModel
            ->where('id_user', session()->get('id_user'))
            ->where('username', $username)
            ->where('nomor_anggota', $nomorAnggota)
            ->where('password', null)
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Data aktivasi (Username atau Nomor Anggota) tidak valid');
        }

        // 5. Update Password (Hash)
        $userModel->update($user['id_user'], [
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        // 6. Bersihkan Session Aktivasi
        session()->remove(['id_user', 'username', 'role', 'logged_in', 'need_activation']);

        return redirect()->to('/login')
            ->with('success', 'Selamat, akun Anda berhasil diaktivasi. Silakan login menggunakan password baru Anda.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
