<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use Dompdf\Dompdf;

class Berita extends BaseController
{
    protected $berita;
    protected $dompdf;

    public function __construct()
    {
        $this->berita = new BeritaModel();
        $this->dompdf = new Dompdf();
    }

    public function index()
    {
        $keyword = $this->request->getGet('q');

        $query = $this->berita->withUser();

        if ($keyword) {
            $query->groupStart()
                ->like('berita.judul', $keyword)
                ->orLike('berita.konten', $keyword)
                ->groupEnd();
        }

        logAktivitas(
            'Pengelolaan Berita',
            'Mengakses halaman pengelolaan berita'
                . ($keyword ? " | keyword: {$keyword}" : '')
        );

        $data = [
            'title' => 'Pengelolaan Berita | Dashboard LASMURA DKI JAKARTA',
            'berita' => $query->orderBy('created_at', 'DESC')->paginate(5, 'berita'),
            'pager' => $query->pager,
            'keyword' => $keyword,
            'breadcrumb' => [
                ['label' => 'Dashboard', 'url' => base_url('/admin/dashboard'), 'icon' => 'fa-solid fa-gauge'],
                ['label' => 'Pengelolaan Berita']
            ]
        ];

        return view('board/pages/berita/index', $data);
    }

    public function preview($slug)
    {
        $berita = $this->berita
            ->withUser()
            ->where('berita.slug', $slug)
            ->first();

        if (!$berita) {
            logAktivitas('Pengelolaan Berita', "Gagal preview berita | slug={$slug}");
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        logAktivitas(
            'Pengelolaan Berita',
            "Preview berita | {$berita['judul']} (slug: {$slug})"
        );

        $data = [
            'title' => 'Preview Berita | Dashboard LASMURA DKI JAKARTA',
            'berita' => $berita,
            'breadcrumb' => [
                ['label' => 'Dashboard', 'url' => base_url('/admin/dashboard'), 'icon' => 'fa-solid fa-gauge'],
                ['label' => 'Pengelolaan Berita', 'url' => base_url('/admin/berita')],
                ['label' => 'Preview Berita']
            ]
        ];

        return view('board/pages/berita/preview', $data);
    }

    public function setHeadline($id)
    {
        $berita = $this->berita->find($id);

        if (!$berita) {
            logAktivitas('Pengelolaan Berita', "Gagal set headline | id={$id}");
            return redirect()->back()->with('error', 'Berita tidak ditemukan');
        }

        $this->berita->builder()
            ->set('is_headline', 0)
            ->where('is_headline', 1)
            ->update();

        $this->berita->update($id, ['is_headline' => 1]);

        logAktivitas(
            'Pengelolaan Berita',
            "Menjadikan headline | {$berita['judul']} (ID: {$id})"
        );

        return redirect()->back()
            ->with('success', 'Berita berhasil dijadikan headline');
    }

    public function exportPdf($slug)
    {
        $berita = $this->berita
            ->withUser()
            ->where('berita.slug', $slug)
            ->first();

        if (!$berita) {
            logAktivitas('Pengelolaan Berita', "Gagal export PDF | slug={$slug}");
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        logAktivitas(
            'Pengelolaan Berita',
            "Export berita ke PDF | {$berita['judul']} (slug: {$slug})"
        );

        $html = view('board/pages/berita/pdf', ['berita' => $berita]);

        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();

        return $this->response
            ->setContentType('application/pdf')
            ->setHeader(
                'Content-Disposition',
                'inline; filename="berita-' . $berita['slug'] . '.pdf"'
            )
            ->setBody($this->dompdf->output());
    }

    public function create()
    {
        logAktivitas('Pengelolaan Berita', 'Membuka form tambah berita');

        $data = [
            'title' => 'Pengelolaan Berita | Dashboard LASMURA DKI JAKARTA',
            'berita' => $this->berita->orderBy('created_at', 'DESC')->findAll(),
            'breadcrumb' => [
                ['label' => 'Dashboard', 'url' => base_url('/admin/dashboard'), 'icon' => 'fa-solid fa-gauge'],
                ['label' => 'Pengelolaan Berita', 'url' => base_url('/admin/berita')],
                ['label' => 'Tambah Berita'],
            ]
        ];

        return view('board/pages/berita/create', $data);
    }

    public function store()
    {
        $judul = $this->request->getPost('judul');

        if (!$judul) {
            logAktivitas('Pengelolaan Berita', 'Gagal menambah berita | judul kosong');
            return redirect()->back()->with('error', 'Judul wajib diisi');
        }

        $thumbnail = $this->request->getFile('thumbnail');
        $thumbnailName = null;

        if ($thumbnail && $thumbnail->isValid()) {
            $thumbnailName = $thumbnail->getRandomName();
            $thumbnail->move('uploads/berita', $thumbnailName);
        }

        $this->berita->insert([
            'judul'       => $judul,
            'slug'        => url_title($judul, '-', true),
            'ringkasan'   => $this->request->getPost('ringkasan'),
            'konten'      => $this->request->getPost('konten'),
            'thumbnail'   => $thumbnailName,
            'status'      => $this->request->getPost('status'),
            'dibuat_oleh' => session()->get('id_user')
        ]);

        logAktivitas('Pengelolaan Berita', "Menambahkan berita | {$judul}");

        return redirect()->to('/admin/berita')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit($id)
    {
        $berita = $this->berita->find($id);

        if (!$berita) {
            logAktivitas('Pengelolaan Berita', "Gagal membuka edit berita | id={$id}");
            return redirect()->to('/admin/berita')
                ->with('error', 'Berita tidak ditemukan');
        }

        logAktivitas(
            'Pengelolaan Berita',
            "Membuka form edit berita | {$berita['judul']} (ID: {$id})"
        );

        $data = [
            'title' => 'Edit Berita | Dashboard LASMURA DKI JAKARTA',
            'berita' => $berita,
            'breadcrumb' => [
                ['label' => 'Dashboard', 'url' => base_url('/admin/dashboard'), 'icon' => 'fa-solid fa-gauge'],
                ['label' => 'Pengelolaan Berita', 'url' => base_url('/admin/berita')],
                ['label' => 'Edit Berita'],
            ]
        ];

        return view('board/pages/berita/edit', $data);
    }

    public function update($id)
    {
        $berita = $this->berita->find($id);

        if (!$berita) {
            logAktivitas('Pengelolaan Berita', "Gagal update berita | id={$id}");
            return redirect()->to('/admin/berita')
                ->with('error', 'Berita tidak ditemukan');
        }

        $thumbnail = $this->request->getFile('thumbnail');
        $thumbnailName = $berita['thumbnail'];

        if ($thumbnail && $thumbnail->isValid()) {
            $thumbnailName = $thumbnail->getRandomName();
            $thumbnail->move('uploads/berita', $thumbnailName);
        }

        $this->berita->update($id, [
            'judul'     => $this->request->getPost('judul'),
            'slug'      => url_title($this->request->getPost('judul'), '-', true),
            'ringkasan' => $this->request->getPost('ringkasan'),
            'konten'    => $this->request->getPost('konten'),
            'status'    => $this->request->getPost('status'),
            'thumbnail' => $thumbnailName
        ]);

        logAktivitas(
            'Pengelolaan Berita',
            "Memperbarui berita | {$berita['judul']} (ID: {$id})"
        );

        return redirect()->to('/admin/berita')
            ->with('success', 'Berita berhasil diperbarui');
    }

    public function delete($id)
    {
        $berita = $this->berita->find($id);

        if (!$berita) {
            logAktivitas('Pengelolaan Berita', "Gagal menghapus berita | id={$id}");
            return redirect()->to('/admin/berita')
                ->with('error', 'Berita tidak ditemukan');
        }

        $this->berita->delete($id);

        logAktivitas(
            'Pengelolaan Berita',
            "Menghapus berita | {$berita['judul']} (ID: {$id})"
        );

        return redirect()->to('/admin/berita')
            ->with('success', 'Berita berhasil dihapus');
    }
}
