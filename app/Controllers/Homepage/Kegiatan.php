<?php

namespace App\Controllers\Homepage;

use App\Controllers\BaseController;
use App\Models\KegiatanModel;

class Kegiatan extends BaseController
{
    protected $kegiatan;

    public function __construct()
    {
        $this->kegiatan = new KegiatanModel();
    }

    public function index()
    {
        return view('home/pages/kegiatan/index', [
            'title' => 'Agenda & Kegiatan',
            'kegiatan' => $this->kegiatan
                ->where('status', 'publish')
                ->orderBy('tanggal_kegiatan', 'DESC')
                ->paginate(6),
            'pager' => $this->kegiatan->pager
        ]);
    }

    public function detail($slug)
    {
        $kegiatan = $this->kegiatan
            ->withUser()
            ->where('kegiatan.slug', $slug)
            ->where('kegiatan.status', 'publish')
            ->first();


        if (!$kegiatan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('home/pages/kegiatan/detail', [
            'title' => $kegiatan['judul'],
            'kegiatan' => $kegiatan
        ]);
    }
}
