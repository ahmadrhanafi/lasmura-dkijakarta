<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Models\LogAktivitasModel;
use App\Models\PengaturanModel;

class CleanupLog extends BaseCommand
{
    protected $group       = 'Logs';
    protected $name        = 'logs:cleanup';
    protected $description = 'Menghapus log aktivitas lama berdasarkan pengaturan sistem';

    public function run(array $params)
    {
        $settingModel = new PengaturanModel();
        $logModel     = new LogAktivitasModel();

        // ambil setting (default 90 hari)
        $hari = $settingModel->get('log_retention_days') ?? 90;

        $jumlah = $logModel->hapusLogLama($hari);

        CLI::write("Log lebih dari {$hari} hari berhasil dihapus: {$jumlah} data", 'green');
    }
}
