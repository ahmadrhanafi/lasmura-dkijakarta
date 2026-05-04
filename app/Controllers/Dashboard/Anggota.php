<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\PendaftaranModel;
use App\Models\UserModel;

class Anggota extends BaseController
{
    public function anggota()
    {
        $userModel = new UserModel();

        $keyword = $this->request->getGet('q');
        $status  = $this->request->getGet('status');

        $builder = $userModel->select('
                        users.id_user, 
                        users.nama_lengkap, 
                        users.nomor_anggota, 
                        users.status, 
                        pendaftaran_anggota.no_hp, 
                        pendaftaran_anggota.email, 
                        pendaftaran_anggota.alamat
                     ')
            ->join('pendaftaran_anggota', 'pendaftaran_anggota.nik = users.nik', 'left')
            ->where('users.role', 'anggota');

        if ($keyword) {
            $builder->groupStart()
                ->like('users.nama_lengkap', $keyword)
                ->orLike('users.nomor_anggota', $keyword)
                ->orLike('pendaftaran_anggota.no_hp', $keyword)
                ->groupEnd();
        }

        if ($status) {
            $builder->where('users.status', $status);
        }

        $data = [
            'title'      => 'Anggota LASMURA | Dashboard LASMURA DKI JAKARTA',
            'anggota'    => $builder->paginate(10, 'anggota'),
            'pager'      => $userModel->pager,
            'keyword'    => $keyword,
            'status'     => $status,
            'breadcrumb' => [
                'Manajemen Anggota' => ''
            ],
        ];

        return view('board/pages/anggota/index', $data);
    }

    public function exportAnggota()
    {
        $userModel = new \App\Models\UserModel();

        $builder = $userModel->select('
            users.nama_lengkap, 
            users.nomor_anggota, 
            users.status, 
            pendaftaran_anggota.jenis_kelamin, 
            pendaftaran_anggota.tanggal_lahir, 
            pendaftaran_anggota.no_hp, 
            pendaftaran_anggota.email, 
            pendaftaran_anggota.alamat
        ')
            ->join('pendaftaran_anggota', 'pendaftaran_anggota.nik = users.nik', 'left')
            ->where('users.role', 'anggota');

        $data = $builder->findAll();

        logAktivitas('Anggota LASMURA', 'Export data anggota ke CSV');

        if (ob_get_level() > 0) {
            ob_end_clean();
        }

        header("Content-Type: text/csv; charset=utf-8");
        header("Content-Disposition: attachment; filename=anggota_lasmura_" . date('Ymd_His') . ".csv");
        header("Pragma: no-cache");
        header("Expires: 0");

        $output = fopen("php://output", "w");

        fputcsv($output, [
            'Nama Lengkap',
            'Nomor Anggota',
            'Jenis Kelamin',
            'Tanggal Lahir',
            'No. HP',
            'Email',
            'Alamat',
            'Status'
        ]);

        foreach ($data as $row) {
            fputcsv($output, [
                $row['nama_lengkap'] ?? '-',
                $row['nomor_anggota'] ?? '-',
                $row['jenis_kelamin'] ?? '-',
                $row['tanggal_lahir'] ?? '-',
                $row['no_hp'] ?? '-',
                $row['email'] ?? '-',
                $row['alamat'] ?? '-',
                $row['status'] ?? '-'
            ]);
        }

        fclose($output);
        exit();
    }

    public function detailAnggota($id)
    {
        $userModel = new UserModel();

        $anggota = $userModel
            ->withPendaftaran()
            ->where('users.id_user', $id)
            ->where('users.role', 'anggota')
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

        return view('board/pages/anggota/detail', $data);
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

        return view('board/pages/anggota/edit', $data);
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
