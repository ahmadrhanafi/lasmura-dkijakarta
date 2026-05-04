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

    public function exportPendaftaran()
    {
        $pendaftaranModel = new \App\Models\PendaftaranModel();

        $data = $pendaftaranModel->findAll();

        if (function_exists('logAktivitas')) {
            logAktivitas('Pendaftaran LASMURA', 'Export data pendaftaran ke CSV');
        }

        if (ob_get_level() > 0) {
            ob_end_clean();
        }

        header("Content-Type: text/csv; charset=utf-8");
        header("Content-Disposition: attachment; filename=data_pendaftaran_lasmura_" . date('Ymd_His') . ".csv");
        header("Pragma: no-cache");
        header("Expires: 0");

        $output = fopen("php://output", "w");

        fputcsv($output, [
            'No',
            'Nomor Anggota',
            'Nama Lengkap',
            'Email',
            'WhatsApp',
            'Alamat',
            'Tanggal Daftar',
            'Status'
        ]);

        $no = 1;
        foreach ($data as $row) {
            fputcsv($output, [
                $no++,
                $row['nomor_anggota'] ?? '-',
                $row['nama_lengkap'] ?? '-',
                $row['email'] ?? '-',
                $row['whatsapp'] ?? '-',
                $row['alamat'] ?? '-',
                $row['created_at'] ?? '-',
                $row['status'] ?? 'pending'
            ]);
        }

        fclose($output);
        exit();
    }

    public function terima($id)
    {
        $pendaftaranModel = new PendaftaranModel();
        $userModel        = new UserModel();

        $pendaftar = $pendaftaranModel->find($id);

        // Validasi data
        if (!$pendaftar || $pendaftar['status'] !== 'menunggu') {
            return redirect()->back()->with('error', 'Data tidak valid atau sudah diproses.');
        }

        // 1. Pindahkan data ke tabel users
        // Sertakan 'nomor_anggota' yang diambil dari tabel pendaftaran_anggota
        $userModel->insert([
            'nama_lengkap'  => $pendaftar['nama_lengkap'],
            'username'      => $pendaftar['username'],
            'nomor_anggota' => $pendaftar['nomor_anggota'], // Ambil dari pendaftaran
            'nik'           => $pendaftar['nik'],
            'role'          => 'anggota',
            'status'        => 'aktif',
            'password'      => null, // User perlu aktivasi/set password nanti
            'created_at'    => date('Y-m-d H:i:s')
        ]);

        // 2. Update status di tabel pendaftaran_anggota
        $pendaftaranModel->update($id, [
            'status' => 'diterima'
        ]);

        logAktivitas(
            'Penerimaan Anggota',
            'Admin menerima pendaftaran anggota: ' . $pendaftar['nama_lengkap'] . ' (' . $pendaftar['nomor_anggota'] . ')'
        );

        return redirect()->back()->with('success', 'Pendaftaran berhasil diterima dan akun anggota telah dibuat.');
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
