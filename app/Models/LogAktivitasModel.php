<?php

namespace App\Models;

use CodeIgniter\Model;

class LogAktivitasModel extends Model
{
    protected $table = 'log_aktivitas';
    protected $primaryKey = 'id_log';

    protected $allowedFields = [
        'id_user',
        'role',
        'modul',
        'aksi',
        'ip_address',
        'user_agent',
        'created_at',
    ];

    protected $useTimestamps = false;

    public function hapusLogLama(int $hari)
    {
        return $this->where(
            'created_at <',
            date('Y-m-d H:i:s', strtotime("-{$hari} days"))
        )->delete();
    }
}
