<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;
use App\Models\LogAktivitasModel;

class Logs extends BaseController
{
    public function index()
    {
        $logModel = new LogAktivitasModel();

        $logs = $logModel
            ->select('log_aktivitas.*, users.nama_lengkap')
            ->join('users', 'users.id_user = log_aktivitas.id_user', 'left')
            ->orderBy('log_aktivitas.created_at', 'DESC')
            ->paginate(15, 'logs');

        $data = [
            'title' => 'Log Aktivitas | Super Admin',
            'logs'  => $logs,
            'pager' => $logModel->pager,
            'breadcrumb' => [
                ['label' => 'Dashboard', 'url' => base_url('/super-admin/dashboard')],
                ['label' => 'Log Aktivitas'],
            ]
        ];

        return view('superadmin/logs', $data);
    }
}
