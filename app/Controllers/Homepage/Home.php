<?php

namespace App\Controllers\Homepage;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\KegiatanModel;

class Home extends BaseController
{
    protected $berita;
    protected $kegiatan;

    public function __construct()
    {
        $this->berita = new BeritaModel();
        $this->kegiatan = new KegiatanModel();
    }

    public function index(): string
    {
        $data = [
            'title'  => 'LASMURA DKI JAKARTA',
            'kegiatan' => $this->kegiatan->where('status', 'publish')
                ->orderBy('tanggal_kegiatan', 'DESC')
                ->limit(3)
                ->find(),
            'berita' => $this->berita->withUser()
                ->where('berita.status', 'publish')
                ->orderBy('berita.created_at', 'DESC')
                ->limit(6)
                ->find(),
            'sponsors' => [
                ['name' => 'Partai Hanura', 'logo' => 'hanura.png'],
                ['name' => 'KPU DKI', 'logo' => 'kpu.png'],
                ['name' => 'Bawaslu', 'logo' => 'bawaslu.png'],
                ['name' => 'Pemprov DKI', 'logo' => 'jakarta.png'],
            ]
        ];

        return view('home/index', $data);
    }

    public function tentang(): string
    {
        $data = [
            'title' => 'Tentang | LASMURA DKI JAKARTA',
        ];
        return view('home/pages/tentang', $data);
    }

    public function struktur(): string
    {
        $data = [
            'title' => 'Struktur | LASMURA DKI JAKARTA',
        ];
        return view('home/pages/struktur', $data);
    }

    public function alur_pendaftaran(): string
    {
        $data = [
            'title' => 'Alur Pendaftaran | LASMURA DKI JAKARTA',
        ];
        return view('home/pages/alur_pendaftaran', $data);
    }
    public function dokumen_legalitas(): string
    {
        $data = [
            'title' => 'Dokumen Legalitas | LASMURA DKI JAKARTA',
        ];
        return view('home/pages/dokumen_legalitas', $data);
    }
    public function laporan_kinerja(): string
    {
        $data = [
            'title' => 'Laporan Kinerja | LASMURA DKI JAKARTA',
        ];
        return view('home/pages/laporan_kinerja', $data);
    }
    public function regulasi_kebijakan(): string
    {
        $data = [
            'title' => 'Regulasi & Kebijakan | LASMURA DKI JAKARTA',
        ];
        return view('home/pages/regulasi_kebijakan', $data);
    }
    public function layanan_advokasi(): string
    {
        $data = [
            'title' => 'Layanan Advokasi | LASMURA DKI JAKARTA',
        ];
        return view('home/pages/layanan_advokasi', $data);
    }

    public function alur_aktivasi(): string
    {
        $data = [
            'title' => 'Alur Aktivasi Akun | LASMURA DKI JAKARTA',
        ];
        return view('home/pages/alur_aktivasi', $data);
    }

    public function bantuan(): string
    {
        $data = [
            'title' => 'Bantuan | LASMURA DKI JAKARTA',
        ];
        return view('home/pages/bantuan', $data);
    }

    public function privacy(): string
    {
        $data = [
            'title' => 'Kebijakan Privasi | LASMURA DKI JAKARTA',
        ];
        return view('home/pages/privacy', $data);
    }

    public function terms(): string
    {
        $data = [
            'title' => 'Ketentuan Layanan | LASMURA DKI JAKARTA',
        ];
        return view('home/pages/terms', $data);
    }
}
