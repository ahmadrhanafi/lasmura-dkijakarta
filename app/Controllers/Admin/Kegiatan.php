<?php

namespace App\Controllers\Admin;

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
        return view('admin/pages/kegiatan/index', [
            'title' => 'Pengelolaan Kegiatan',
            'kegiatan' => $this->kegiatan
                ->withUser()
                ->orderBy('tanggal_kegiatan', 'DESC')
                ->paginate(5),
            'pager' => $this->kegiatan->pager
        ]);
    }

    public function create()
    {
        return view('admin/pages/kegiatan/create', [
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

        return view('admin/pages/kegiatan/preview', [
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

        return view('admin/pages/kegiatan/edit', [
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

        return redirect()->to('/admin/kegiatan')
            ->with('success', 'Kegiatan berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->kegiatan->delete($id);

        return redirect()->to('/admin/kegiatan')
            ->with('success', 'Kegiatan berhasil dihapus');
    }
}
