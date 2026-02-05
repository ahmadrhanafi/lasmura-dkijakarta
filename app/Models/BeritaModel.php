<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table      = 'berita';
    protected $primaryKey = 'id_berita';

    protected $allowedFields = [
        'judul',
        'slug',
        'ringkasan',
        'konten',
        'thumbnail',
        'status',
        'is_headline',
        'dibuat_oleh'
    ];

    protected $useTimestamps = true;

    public function withUser()
    {
        return $this
            ->select('berita.*, users.nama_lengkap')
            ->join('users', 'users.id_user = berita.dibuat_oleh', 'left');
    }

    public function publik($keyword = null)
    {
        $builder = $this->withUser()
            ->where('berita.status', 'publish')
            ->orderBy('berita.created_at', 'DESC');

        if ($keyword) {
            $builder->groupStart()
                ->like('berita.judul', $keyword)
                ->orLike('berita.konten', $keyword)
                ->groupEnd();
        }

        return $builder;
    }
}
