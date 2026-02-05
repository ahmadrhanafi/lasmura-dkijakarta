<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendaftaranModel;
use App\Models\UserModel;

class Pendaftaran extends BaseController
{
    public function index()
    {
        $model = new PendaftaranModel();

        $keyword = $this->request->getGet('q');
        $status  = $this->request->getGet('status');

        // Inisialisasi builder langsung dari model
        $builder = $model;

        // 🔍 Search Logic
        if ($keyword) {
            $builder = $builder->groupStart()
                ->like('nama_lengkap', $keyword)
                ->orLike('no_hp', $keyword)
                ->orLike('email', $keyword)
                ->orLike('alamat', $keyword)
                ->groupEnd();
        }

        // 🎯 Filter status
        if ($status) {
            $builder = $builder->where('status', $status);
        }

        // Ambil data dengan pagination (Data ini yang akan dilooping di tabel)
        $dataPendaftaran = $builder->orderBy('created_at', 'DESC')
            ->paginate(10, 'pendaftaran');

        $data = [
            'title'       => 'Penerimaan Anggota | Dashboard LASMURA DKI JAKARTA',
            'pendaftaran' => $dataPendaftaran, // Data hasil filter & paginate
            'pager'       => $model->pager,
            'keyword'     => $keyword,
            'status'      => $status,
            'breadcrumb'  => [
                ['label' => 'Dashboard', 'url' => base_url('/admin/dashboard'), 'icon' => 'fa-solid fa-gauge'],
                ['label' => 'Penerimaan Anggota']
            ]
        ];

        return view('admin/pages/pendaftaran', $data);
    }

    public function terima($id)
    {
        $pendaftaranModel = new PendaftaranModel();
        $userModel        = new UserModel();

        $pendaftar = $pendaftaranModel->find($id);

        if (!$pendaftar || $pendaftar['status'] !== 'menunggu') {
            return redirect()->back()->with('error', 'Data tidak valid');
        }

        /**
         * 🔐 BUAT AKUN USER
         * password = NULL → aktivasi
         */
        $userModel->insert([
            'nama_lengkap'  => $pendaftar['nama_lengkap'],
            'username'      => $pendaftar['username'],
            'nik'           => $pendaftar['nik'],
            'role'          => 'anggota',
            'status'        => 'aktif',
            'password'      => null,
            'created_at'    => date('Y-m-d H:i:s')
        ]);

        // Update status pendaftaran
        $pendaftaranModel->update($id, [
            'status' => 'diterima'
        ]);

        return redirect()->back()->with('success', 'Pendaftaran berhasil diterima');
    }

    public function tolak($id)
    {
        $model = new PendaftaranModel();

        $pendaftar = $model->find($id);

        if (!$pendaftar || $pendaftar['status'] !== 'menunggu') {
            return redirect()->back()->with('error', 'Data tidak valid');
        }

        $model->update($id, [
            'status' => 'ditolak',
            'catatan_admin' => $this->request->getPost('catatan_admin')
        ]);

        return redirect()->back()->with('success', 'Pendaftaran ditolak');
    }
}
