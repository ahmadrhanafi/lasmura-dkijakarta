<?php

namespace App\Controllers\Dashboard;

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

        $builder = $model;

        if ($keyword) {
            $builder = $builder->groupStart()
                ->like('nama_lengkap', $keyword)
                ->orLike('no_hp', $keyword)
                ->orLike('email', $keyword)
                ->orLike('alamat', $keyword)
                ->groupEnd();
        }

        if ($status) {
            $builder = $builder->where('status', $status);
        }

        $dataPendaftaran = $builder->orderBy('created_at', 'DESC')
            ->paginate(10, 'pendaftaran');

        return view('board/pages/pendaftaran/index', [
            'title'       => 'Penerimaan Anggota | Dashboard LASMURA DKI JAKARTA',
            'pendaftaran' => $dataPendaftaran,
            'pager'       => $model->pager,
            'keyword'     => $keyword,
            'status'      => $status,
            'breadcrumb'  => [
                ['label' => 'Dashboard', 'url' => base_url('/admin/dashboard'), 'icon' => 'fa-solid fa-gauge'],
                ['label' => 'Penerimaan Anggota']
            ]
        ]);
    }

    public function terima($id)
    {
        $pendaftaranModel = new PendaftaranModel();
        $userModel        = new UserModel();

        $pendaftar = $pendaftaranModel->find($id);

        if (!$pendaftar || $pendaftar['status'] !== 'menunggu') {
            return redirect()->back()->with('error', 'Data tidak valid');
        }

        $userModel->insert([
            'nama_lengkap' => $pendaftar['nama_lengkap'],
            'username'     => $pendaftar['username'],
            'nik'          => $pendaftar['nik'],
            'role'         => 'anggota',
            'status'       => 'aktif',
            'password'     => null,
            'created_at'   => date('Y-m-d H:i:s')
        ]);

        $pendaftaranModel->update($id, [
            'status' => 'diterima'
        ]);

        logAktivitas(
            'Penerimaan Anggota',
            'Admin menerima pendaftaran anggota: ' . $pendaftar['nama_lengkap']
        );

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
            'status'         => 'ditolak',
            'catatan_admin'  => $this->request->getPost('catatan_admin')
        ]);

        logAktivitas(
            'Penerimaan Anggota',
            'Admin menolak pendaftaran anggota: ' . $pendaftar['nama_lengkap']
        );

        return redirect()->back()->with('success', 'Pendaftaran ditolak');
    }
}
