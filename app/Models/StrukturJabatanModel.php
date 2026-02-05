<?php

namespace App\Models;

use CodeIgniter\Model;

class StrukturJabatanModel extends Model
{
    protected $table = 'struktur_jabatan';
    protected $primaryKey = 'id_jabatan';
    protected $allowedFields = [
        'id_level', 'nama_jabatan', 'urutan', 'status'
    ];
}

