<?php

namespace App\Controllers\Homepage;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class Home extends BaseController
{
    protected $berita;

    public function __construct()
    {
        $this->berita = new BeritaModel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'LASMURA DKI JAKARTA',
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

    public function alur(): string
    {
        $data = [
            'title' => 'Alur Aktivasi Akun | LASMURA DKI JAKARTA',
        ];
        return view('home/pages/alur', $data);
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
