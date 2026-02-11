<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\LogAktivitasModel;
use App\Models\PengaturanModel;

class Logs extends BaseController
{
    public function index()
    {
        $logModel = new LogAktivitasModel();

        $from  = $this->request->getGet('from');
        $to    = $this->request->getGet('to');
        $modul = $this->request->getGet('modul');
        $user  = $this->request->getGet('user');

        $logModel
            ->select('log_aktivitas.*, users.nama_lengkap')
            ->join('users', 'users.id_user = log_aktivitas.id_user', 'left');

        if ($from) {
            $logModel->where('log_aktivitas.created_at >=', $from . ' 00:00:00');
        }

        if ($to) {
            $logModel->where('log_aktivitas.created_at <=', $to . ' 23:59:59');
        }

        if ($modul) {
            $logModel->where('log_aktivitas.modul', $modul);
        }

        if ($user) {
            $logModel->where('log_aktivitas.id_user', $user);
        }

        $data = [
            'logs' => $logModel
                ->orderBy('log_aktivitas.created_at', 'DESC')
                ->paginate(15, 'logs'),
            'title' => 'Log Aktivitas Sistem',
            'pager' => $logModel->pager,
            'filter' => compact('from', 'to', 'modul', 'user'),
        ];

        // dd($this->request->getGet());

        return view('board/super/logs', $data);
    }

    public function cleanup()
    {
        $setting = new PengaturanModel();
        $logModel = new LogAktivitasModel();

        $hari = (int) ($setting->getValue('log_retention_days') ?? 90);

        $jumlah = $logModel->hapusLogLama($hari);

        return redirect()->back()
            ->with('success', "Log lebih dari {$hari} hari berhasil dibersihkan");
    }
}
