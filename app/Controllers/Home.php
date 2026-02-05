<?php

namespace App\Controllers;
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
        return view('pages/tentang', $data);
    }

    public function struktur(): string
    {
        $data = [
            'title' => 'Struktur | LASMURA DKI JAKARTA',
        ];
        return view('pages/struktur', $data);
    }
}