<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Anggota extends BaseController
{
    public function anggota()
    {
        $userModel = new UserModel();

        $keyword = $this->request->getGet('q');
        $status  = $this->request->getGet('status');

        $builder = $userModel->where('role', 'anggota');

        if ($keyword) {
            $builder->groupStart()
                ->like('nama_lengkap', $keyword)
                ->orLike('nik', $keyword)
                ->groupEnd();
        }

        if ($status) {
            $builder->where('status', $status);
        }

        logAktivitas(
            'Anggota LASMURA',
            'Mengakses halaman daftar anggota'
            . ($keyword ? " | keyword: {$keyword}" : '')
            . ($status ? " | status: {$status}" : '')
        );

        $data = [
            'title'   => 'Anggota LASMURA | Dashboard LASMURA DKI JAKARTA',
            'anggota' => $builder->paginate(10, 'anggota'),
            'pager'   => $userModel->pager,
            'keyword' => $keyword,
            'status'  => $status,
            'breadcrumb' => [
                ['label' => 'Dashboard', 'url' => base_url('/admin/dashboard'), 'icon' => 'fa-solid fa-gauge'],
                ['label' => 'Anggota LASMURA'],
            ],
        ];

        return view('admin/pages/anggota/index', $data);
    }

    public function exportAnggota()
    {
        $userModel = new UserModel();

        $data = $userModel
            ->where('role', 'anggota')
            ->findAll();

        logAktivitas('Anggota LASMURA', 'Export data anggota ke CSV');

        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename=anggota_lasmura.csv");

        $output = fopen("php://output", "w");

        fputcsv($output, [
            'Nama Lengkap',
            'NIK',
            'Jenis Kelamin',
            'Tanggal Lahir',
            'Status'
        ]);

        foreach ($data as $row) {
            fputcsv($output, [
                $row['nama_lengkap'],
                $row['nik'],
                $row['jenis_kelamin'],
                $row['tanggal_lahir'],
                $row['status']
            ]);
        }

        fclose($output);
        exit;
    }

    public function detailAnggota($id)
    {
        $userModel = new UserModel();

        $anggota = $userModel
            ->where('id_user', $id)
            ->where('role', 'anggota')
            ->first();

        if (!$anggota) {
            logAktivitas('Anggota LASMURA', "Gagal membuka detail anggota | id_user={$id}");

            return redirect()->to('/admin/anggota')
                ->with('error', 'Data anggota tidak ditemukan');
        }

        logAktivitas(
            'Anggota LASMURA',
            "Membuka detail anggota | {$anggota['nama_lengkap']} (ID: {$id})"
        );

        $data = [
            'title'   => 'Detail Anggota | Dashboard LASMURA DKI JAKARTA',
            'anggota' => $anggota,
            'breadcrumb' => [
                ['label' => 'Dashboard', 'url' => base_url('/admin/dashboard'), 'icon' => 'fa-solid fa-gauge'],
                ['label' => 'Anggota LASMURA', 'url' => base_url('/admin/anggota')],
                ['label' => 'Detail Anggota'],
            ],
        ];

        return view('admin/pages/anggota/detail', $data);
    }

    public function editAnggota($id)
    {
        $userModel = new UserModel();

        $anggota = $userModel
            ->where('id_user', $id)
            ->where('role', 'anggota')
            ->first();

        if (!$anggota) {
            logAktivitas('Anggota LASMURA', "Gagal membuka form edit anggota | id_user={$id}");

            return redirect()->to('/admin/anggota')
                ->with('error', 'Data anggota tidak ditemukan');
        }

        logAktivitas(
            'Anggota LASMURA',
            "Membuka form edit anggota | {$anggota['nama_lengkap']} (ID: {$id})"
        );

        $data = [
            'title'   => 'Edit Anggota | Dashboard LASMURA DKI JAKARTA',
            'anggota' => $anggota,
            'breadcrumb' => [
                ['label' => 'Dashboard', 'url' => base_url('/admin/dashboard'), 'icon' => 'fa-solid fa-gauge'],
                ['label' => 'Anggota LASMURA', 'url' => base_url('/admin/anggota')],
                ['label' => 'Edit Anggota'],
            ],
        ];

        return view('admin/pages/anggota/edit', $data);
    }

    public function updateAnggota($id)
    {
        $userModel = new UserModel();

        $userModel->update($id, [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'status'       => $this->request->getPost('status'),
        ]);

        logAktivitas(
            'Anggota LASMURA',
            "Update data anggota | id_user={$id}"
        );

        return redirect()->to('/admin/anggota')
            ->with('success', 'Data anggota berhasil diperbarui');
    }

    public function hapusAnggota($id)
    {
        $userModel = new UserModel();

        $anggota = $userModel
            ->where('id_user', $id)
            ->where('role', 'anggota')
            ->first();

        if (!$anggota) {
            logAktivitas('Anggota LASMURA', "Gagal menghapus anggota | id_user={$id}");

            return redirect()->to('/admin/anggota')
                ->with('error', 'Data anggota tidak ditemukan');
        }

        $userModel->delete($id);

        logAktivitas(
            'Anggota LASMURA',
            "Menghapus anggota | {$anggota['nama_lengkap']} (ID: {$id})"
        );

        return redirect()->to('/admin/anggota')
            ->with('success', 'Data anggota berhasil dihapus');
    }
}
