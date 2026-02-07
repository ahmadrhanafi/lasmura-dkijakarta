<?php

namespace App\Models;

use CodeIgniter\Model;

class StrukturAnggotaModel extends Model
{
    protected $table = 'struktur_anggota';
    protected $primaryKey = 'id_anggota';
    protected $allowedFields = [
        'id_user',
        'id_jabatan',
        'nama',
        'gelar',
        'foto',
        'urutan',
        'status'
    ];
}

