<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Anggota extends BaseController
{
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
            'title'   => 'Anggota LASMURA | Dashboard LASMURA DKI JAKARTA',
            'anggota' => $builder->paginate(10, 'anggota'),
            'pager'   => $userModel->pager,
            'keyword' => $keyword,
            'status'  => $status,
            'breadcrumb' => [
                ['label' => 'Dashboard', 'url' => base_url('/admin/dashboard'), 'icon' => 'fa-solid fa-gauge'],
                ['label' => 'Anggota LASMURA', ],
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

        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename=anggota_lasmura.csv");

        $output = fopen("php://output", "w");

        // Header kolom
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

        $anggota = $userModel->where('id_user', $id)
            ->where('role', 'anggota')
            ->first();

        if (!$anggota) {
            return redirect()->to('/admin/anggota')
                ->with('error', 'Data anggota tidak ditemukan');
            // throw new \CodeIgniter\Exceptions\PageNotFoundException('Anggota tidak ditemukan.');
        }

        $data = [
            'title'   => 'Detail Anggota | Dashboard LASMURA DKI JAKARTA',
            'anggota' => $anggota,
            'breadcrumb' => [
                ['label' => 'Dashboard', 'url' => base_url('/admin/dashboard'), 'icon' => 'fa-solid fa-gauge'],
                ['label' => 'Anggota LASMURA', 'url' => base_url('/admin/anggota')],
                ['label' => 'Detail Anggota', ],
            ],
        ];

        return view('admin/pages/anggota/detail', $data);
    }

    public function editAnggota($id)
    {
        $userModel = new \App\Models\UserModel();

        $anggota = $userModel
            ->where('id_user', $id)
            ->where('role', 'anggota')
            ->first();

        if (!$anggota) {
            return redirect()->to('/admin/anggota')
                ->with('error', 'Data anggota tidak ditemukan');
        }

        $data = [
            'title'   => 'Edit Anggota | Dashboard LASMURA DKI JAKARTA',
            'anggota' => $anggota,
            'breadcrumb' => [
                ['label' => 'Dashboard', 'url' => base_url('/admin/dashboard'), 'icon' => 'fa-solid fa-gauge'],
                ['label' => 'Anggota LASMURA', 'url' => base_url('/admin/anggota')],
                ['label' => 'Detail Anggota', 'url' => base_url('/anggota/detail/'.$id)],
                ['label' => 'Edit Anggota', ],
            ],
        ];

        return view('admin/pages/anggota/edit', $data);
    }

    public function updateAnggota($id)
    {
        $userModel = new \App\Models\UserModel();

        $userModel->update($id, [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'status'       => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/anggota')
            ->with('success', 'Data anggota berhasil diperbarui');
    }

    public function hapusAnggota($id)
    {
        $userModel = new UserModel();

        $anggota = $userModel->where('id_user', $id)
            ->where('role', 'anggota')
            ->first();

        if (!$anggota) {
            return redirect()->to('/admin/anggota')
                ->with('error', 'Data anggota tidak ditemukan');
        }

        $userModel->delete($id);

        return redirect()->to('/admin/anggota')
            ->with('success', 'Data anggota berhasil dihapus');
    }
}
