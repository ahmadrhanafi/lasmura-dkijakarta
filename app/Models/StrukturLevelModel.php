<?php

namespace App\Models;

use CodeIgniter\Model;

class StrukturLevelModel extends Model
{
    protected $table = 'struktur_level';
    protected $primaryKey = 'id_level';
    protected $allowedFields = [
        'nama_level', 'keterangan', 'urutan', 'status'
    ];
}

