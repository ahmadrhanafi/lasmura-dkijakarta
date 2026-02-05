<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $allowedFields = [
        'nama_lengkap',
        'username',
        'nik',
        'foto',
        'nomor_anggota',
        'password',
        'role',
        'status',
        'created_at'
    ];
}

