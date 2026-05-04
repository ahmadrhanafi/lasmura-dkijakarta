<?php

namespace App\Controllers\Dashboard;

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
        $keyword = $this->request->getGet('q');

        $query = $this->kegiatan->withUser();

        if ($keyword) {
            $query->like('judul', $keyword);
        }
        logAktivitas(
            'Pengelolaan Kegiatan',
            'Mengakses halaman pengelolaan kegiatan'
                . ($keyword ? " | keyword: {$keyword}" : '')
        );

        return view('board/pages/kegiatan/index', [
            'title' => 'Pengelolaan Kegiatan | Dashboard LASMURA DKI JAKARTA',
            'kegiatan' => $query->orderBy('tanggal_kegiatan', 'DESC')->paginate(5),
            'pager' => $query->pager,
            'keyword' => $keyword,
            'breadcrumb' => [
                ['label' => 'Dashboard', 'url' => base_url('/admin/dashboard'), 'icon' => 'fa-solid fa-gauge'],
                ['label' => 'Pengelolaan Kegiatan']
            ]
        ]);
    }

    public function create()
    {
        return view('board/pages/kegiatan/create', [
            'title' => 'Tambah Kegiatan'
        ]);
    }

    public function store()
    {
        $thumb = $this->request->getFile('thumbnail');
        $thumbName = null;

        if ($thumb && $thumb->isValid()) {
            $thumbName = $thumb->getRandomName();
            $thumb->move('uploads/kegiatan', $thumbName);
        }

        $judul = $this->request->getPost('judul');

        $this->kegiatan->insert([
            'judul'            => $judul,
            'slug'             => url_title($judul, '-', true),
            'deskripsi'        => $this->request->getPost('deskripsi'),
            'konten'           => $this->request->getPost('konten'),
            'tanggal_kegiatan' => $this->request->getPost('tanggal_kegiatan'),
            'lokasi'           => $this->request->getPost('lokasi'),
            'status'           => $this->request->getPost('status'),
            'thumbnail'        => $thumbName,
            'dibuat_oleh'      => session()->get('id_user')
        ]);

        logAktivitas(
            'Kegiatan LASMURA',
            'Admin menambahkan kegiatan: ' . $judul
        );

        return redirect()->to('/admin/kegiatan')
            ->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function preview($slug)
    {
        $kegiatan = $this->kegiatan
            ->withUser()
            ->where('slug', $slug)
            ->first();

        if (!$kegiatan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('board/pages/kegiatan/preview', [
            'title'    => 'Preview Kegiatan',
            'kegiatan' => $kegiatan
        ]);
    }

    public function edit($id)
    {
        $kegiatan = $this->kegiatan->find($id);

        if (!$kegiatan) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        return view('board/pages/kegiatan/edit', [
            'title' => 'Edit Kegiatan',
            'kegiatan' => $kegiatan
        ]);
    }

    public function update($id)
    {
        $kegiatan = $this->kegiatan->find($id);

        if (!$kegiatan) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $thumb = $this->request->getFile('thumbnail');
        $thumbName = $kegiatan['thumbnail'];

        if ($thumb && $thumb->isValid()) {
            $thumbName = $thumb->getRandomName();
            $thumb->move('uploads/kegiatan', $thumbName);
        }

        $judul = $this->request->getPost('judul');

        $this->kegiatan->update($id, [
            'judul'            => $judul,
            'slug'             => url_title($judul, '-', true),
            'deskripsi'        => $this->request->getPost('deskripsi'),
            'konten'           => $this->request->getPost('konten'),
            'tanggal_kegiatan' => $this->request->getPost('tanggal_kegiatan'),
            'lokasi'           => $this->request->getPost('lokasi'),
            'status'           => $this->request->getPost('status'),
            'thumbnail'        => $thumbName
        ]);

        logAktivitas(
            'Kegiatan LASMURA',
            'Admin mengedit kegiatan: ' . $judul
        );

        return redirect()->to('/admin/kegiatan')
            ->with('success', 'Kegiatan berhasil diperbarui');
    }

    public function delete($id)
    {
        $kegiatan = $this->kegiatan->find($id);

        if ($kegiatan) {
            $this->kegiatan->delete($id);

            logAktivitas(
                'Kegiatan LASMURA',
                'Admin menghapus kegiatan: ' . $kegiatan['judul']
            );
        }

        return redirect()->to('/admin/kegiatan')
            ->with('success', 'Kegiatan berhasil dihapus');
    }
}
