<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table      = 'pendaftaran_anggota';
    protected $primaryKey = 'id_pendaftaran';

    protected $allowedFields = [
        'nama_lengkap',
        'username',
        'nik',
        'jenis_kelamin',
        'tanggal_lahir',
        'no_hp',
        'email',
        'alamat',
        'status',
        'catatan_admin'
    ];

    protected $useTimestamps = true;
}
