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

    public function getByUser($idUser)
    {
        return $this->select('
            struktur_anggota.*,
            struktur_jabatan.nama_jabatan,
            struktur_level.nama_level
        ')
            ->join('struktur_jabatan', 'struktur_jabatan.id_jabatan = struktur_anggota.id_jabatan')
            ->join('struktur_level', 'struktur_level.id_level = struktur_jabatan.id_level')
            ->where('struktur_anggota.id_user', $idUser)
            ->where('struktur_anggota.status', 'aktif')
            ->first();
    }
}
