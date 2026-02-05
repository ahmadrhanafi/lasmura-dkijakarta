<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $table      = 'kegiatan';
    protected $primaryKey = 'id_kegiatan';

    protected $allowedFields = [
        'judul',
        'slug',
        'deskripsi',
        'konten',
        'thumbnail',
        'tanggal_kegiatan',
        'lokasi',
        'status',
        'dibuat_oleh'
    ];

    protected $useTimestamps = true;

    public function withUser()
    {
        return $this
            ->select('kegiatan.*, users.nama_lengkap')
            ->join('users', 'users.id_user = kegiatan.dibuat_oleh', 'left');
    }
}
