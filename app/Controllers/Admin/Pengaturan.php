<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PengaturanModel;

class Pengaturan extends BaseController
{
    public function index()
    {
        $model = new PengaturanModel();

        $data = [
            'title' => 'Pengaturan Sistem',
            'retention' => $model->getValue('log_retention_days') ?? 90
        ];

        return view('admin/pages/pengaturan/index', $data);
    }

    public function save()
    {
        $model = new PengaturanModel();

        $hari = (int) $this->request->getPost('log_retention_days');

        if ($hari < 1) {
            return redirect()->back()
                ->with('error', 'Jumlah hari tidak valid');
        }

        $model->setValue('log_retention_days', $hari);

        return redirect()->back()
            ->with('success', 'Pengaturan berhasil disimpan');
    }
}
