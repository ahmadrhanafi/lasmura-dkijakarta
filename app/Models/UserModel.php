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

    public function withPendaftaran()
    {
        return $this->select('
            users.*,
            pendaftaran_anggota.jenis_kelamin,
            pendaftaran_anggota.tanggal_lahir,
            pendaftaran_anggota.no_hp,
            pendaftaran_anggota.email,
            pendaftaran_anggota.alamat
        ')
            ->join(
                'pendaftaran_anggota',
                'pendaftaran_anggota.nik = users.nik',
                'left'
            );
    }
}
