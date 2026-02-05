<?php

namespace App\Controllers;

use App\Models\BeritaModel;

class Berita extends BaseController
{
    protected $berita;

    public function __construct()
    {
        $this->berita = new BeritaModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('q');

        $headline = $this->berita
            ->withUser()
            ->where('berita.status', 'publish')
            ->where('berita.is_headline', 1)
            ->first();

        if (!$headline) {
            $headline = $this->berita
                ->withUser()
                ->where('berita.status', 'publish')
                ->orderBy('berita.created_at', 'DESC')
                ->first();
        }

        $query = $this->berita
            ->withUser()
            ->where('berita.status', 'publish');

        if ($headline) {
            $query->where('berita.id_berita !=', $headline['id_berita']);
        }

        if ($keyword) {
            $query->groupStart()
                ->like('berita.judul', $keyword)
                ->orLike('berita.konten', $keyword)
                ->groupEnd();
        }

        $berita = $query
            ->orderBy('berita.created_at', 'DESC')
            ->paginate(6, 'berita');

        return view('pages/berita/index', [
            'title'    => 'Kabar Terkini LASMURA',
            'headline' => $headline,
            'berita'   => $berita,
            'pager'    => $this->berita->pager,
            'keyword'  => $keyword
        ]);
    }

    public function search()
    {
        $keyword = trim($this->request->getGet('q'));

        if (!$keyword) {
            return redirect()->to('/berita');
        }

        $berita = $this->berita
            ->withUser()
            ->where('berita.status', 'publish')
            ->groupStart()
            ->like('berita.judul', $keyword)
            ->orLike('berita.ringkasan', $keyword)
            ->orLike('berita.konten', $keyword)
            ->groupEnd()
            ->orderBy('berita.created_at', 'DESC')
            ->paginate(6, 'berita');

        return view('pages/berita/search', [
            'title'   => 'Hasil Pencarian: ' . esc($keyword),
            'berita'  => $berita,
            'pager'   => $this->berita->pager,
            'keyword' => $keyword
        ]);
    }

    public function detail($slug)
    {
        $berita = $this->berita
            ->withUser()
            ->where('berita.slug', $slug)
            ->where('berita.status', 'publish')
            ->first();

        if (!$berita) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $related = $this->berita
            ->withUser()
            ->where('berita.status', 'publish')
            ->where('berita.id_berita !=', $berita['id_berita'])
            ->orderBy('berita.created_at', 'DESC')
            ->limit(3)
            ->find();

        return view('pages/berita/detail', [
            'title'   => $berita['judul'],
            'berita'  => $berita,
            'related' => $related
        ]);
    }
}
