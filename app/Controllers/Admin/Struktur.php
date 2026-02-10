<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StrukturLevelModel;
use App\Models\StrukturJabatanModel;
use App\Models\StrukturAnggotaModel;
use App\Models\UserModel;

class Struktur extends BaseController
{
    protected $levelModel;
    protected $jabatanModel;
    protected $anggotaModel;
    protected $userModel;

    public function __construct()
    {
        $this->levelModel   = new StrukturLevelModel();
        $this->jabatanModel = new StrukturJabatanModel();
        $this->anggotaModel = new StrukturAnggotaModel();
        $this->userModel    = new UserModel();
    }

    public function index()
    {
        $data['title'] = 'Struktur Organisasi LASMURA | Dashboard LASMURA DKI Jakarta';

        $data['level'] = $this->levelModel
            ->orderBy('urutan')
            ->findAll();

        $data['jabatan'] = $this->jabatanModel
            ->select('struktur_jabatan.*, struktur_level.nama_level')
            ->join('struktur_level', 'struktur_level.id_level = struktur_jabatan.id_level')
            ->orderBy('struktur_level.urutan')
            ->orderBy('struktur_jabatan.urutan')
            ->findAll();

        $data['anggota'] = $this->anggotaModel
            ->select('
        struktur_anggota.*,
        struktur_jabatan.nama_jabatan,
        users.nama_lengkap,
        users.nik,
        users.status
        ')
            ->join('struktur_jabatan', 'struktur_jabatan.id_jabatan = struktur_anggota.id_jabatan')
            ->join('users', 'users.id_user = struktur_anggota.id_user', 'left')
            ->orderBy('struktur_anggota.urutan')
            ->paginate(5, 'anggota');

        $data['pager'] = $this->anggotaModel->pager;

        return view('admin/pages/struktur/index', $data);
    }

    public function create()
    {
        $userModel = new UserModel();

        $data = [
            'title'  => 'Tambah Struktur Anggota | Dashboard LASMURA',
            'level'  => $this->levelModel->orderBy('urutan')->findAll(),
            'users'  => $userModel
                ->where('role', 'anggota')
                ->where('status', 'aktif')
                ->orderBy('nama_lengkap')
                ->findAll(),
        ];

        return view('admin/pages/struktur/create', $data);
    }

    public function editAnggota($id)
    {
        $userModel = new UserModel();

        $anggota = $this->anggotaModel
            ->select('struktur_anggota.*, struktur_jabatan.id_level')
            ->join('struktur_jabatan', 'struktur_jabatan.id_jabatan = struktur_anggota.id_jabatan')
            ->where('id_anggota', $id)
            ->first();

        if (!$anggota) {
            return redirect()->to('/admin/struktur')
                ->with('error', 'Data struktur tidak ditemukan');
        }

        $data = [
            'title'   => 'Edit Anggota | Dashboard LASMURA',
            'anggota' => $anggota,
            'level'   => $this->levelModel->orderBy('urutan')->findAll(),
            'users'   => $userModel
                ->where('role', 'anggota')
                ->where('status', 'aktif')
                ->orderBy('nama_lengkap')
                ->findAll(),
        ];

        return view('admin/pages/struktur/edit_anggota', $data);
    }

    public function simpanAnggota()
    {
        $idUser = $this->request->getPost('id_user');

        // CEK: apakah user sudah punya jabatan
        $cek = $this->anggotaModel
            ->where('id_user', $idUser)
            ->first();

        if ($cek) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Anggota ini sudah memiliki jabatan di struktur.');
        }

        $this->anggotaModel->insert([
            'id_user'    => $idUser,
            'id_jabatan' => $this->request->getPost('id_jabatan'),
            'gelar'      => $this->request->getPost('gelar'),
            'urutan'     => $this->request->getPost('urutan'),
        ]);

        logAktivitas(
            'Struktur Anggota',
            'Menambahkan anggota struktur: ' . $this->request->getPost('nama')
        );

        return redirect()->to('/admin/struktur')
            ->with('success', 'Anggota berhasil ditambahkan ke dalam struktur');
    }

    public function updateAnggota($id)
    {
        $idUser = $this->request->getPost('id_user');

        // ambil data lama
        $datalama = $this->anggotaModel->find($id);

        // kalau ganti user → cek konflik
        if ($datalama['id_user'] != $idUser) {
            $cek = $this->anggotaModel
                ->where('id_user', $idUser)
                ->first();

            if ($cek) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Anggota ini sudah memiliki jabatan lain.');
            }
        }

        $this->anggotaModel->update($id, [
            'id_user'    => $idUser,
            'id_jabatan' => $this->request->getPost('id_jabatan'),
            'gelar'      => $this->request->getPost('gelar'),
            'urutan'     => $this->request->getPost('urutan'),
        ]);

        logAktivitas(
            'Struktur Anggota',
            'Mengedit data anggota struktur: ' . $this->request->getPost('nama')
        );

        return redirect()->to('/admin/struktur')
            ->with('success', 'Data anggota berhasil diperbarui');
    }

    public function hapusAnggota($id)
    {
        $this->anggotaModel->delete($id);
        logAktivitas(
            'Struktur Anggota',
            'Menghapus anggota struktur: ' . $this->request->getPost('nama')
        );

        return redirect()->back();
    }

    // ===> LEVEL <===

    public function simpanLevel()
    {
        $this->levelModel->insert([
            'nama_level' => $this->request->getPost('nama_level'),
            'urutan'     => $this->request->getPost('urutan') ?? 0,
            'status'     => 'aktif'
        ]);

        logAktivitas(
            'Struktur Anggota',
            'Menambahkan level pada struktur anggota: ' . $this->request->getPost('nama')
        );

        return redirect()->back();
    }

    public function editLevel($id)
    {
        $data['title'] = 'Edit Level';
        $data['level'] = $this->levelModel->find($id);

        return view('admin/pages/struktur/edit_level', $data);
    }

    public function updateLevel($id)
    {
        $this->levelModel->update($id, [
            'nama_level' => $this->request->getPost('nama_level'),
            'urutan'     => $this->request->getPost('urutan'),
        ]);

        logAktivitas(
            'Struktur Anggota',
            'Mengedit urutan level organisasi'
        );

        return redirect()->to('admin/struktur');
    }

    public function hapusLevel($id)
    {
        // cek apakah level punya jabatan
        $cek = $this->jabatanModel
            ->where('id_level', $id)
            ->countAllResults();

        if ($cek > 0) {
            return redirect()->back()
                ->with('error', 'Level masih memiliki jabatan');
        }

        $this->levelModel->delete($id);
        logAktivitas(
            'Struktur Anggota',
            'Menghapus level pada struktur anggota: ' . $this->request->getPost('nama')
        );

        return redirect()->back()
            ->with('success', 'Level berhasil dihapus');
    }


    // ===> JABATAN <===
    public function simpanJabatan()
    {
        $this->jabatanModel->insert([
            'id_level'     => $this->request->getPost('id_level'),
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
            'urutan'       => $this->request->getPost('urutan') ?? 0,
            'status'       => 'aktif'
        ]);

        logAktivitas(
            'Struktur Anggota',
            'Menambahkan jabatan pada struktur anggota: ' . $this->request->getPost('nama')
        );

        return redirect()->back();
    }

    public function editJabatan($id)
    {
        $data['title'] = 'Edit Jabatan';
        $data['jabatan'] = $this->jabatanModel->find($id);
        $data['level']   = $this->levelModel->findAll();

        return view('admin/pages/struktur/edit_jabatan', $data);
    }

    public function updateJabatan($id)
    {
        $this->jabatanModel->update($id, [
            'id_level'     => $this->request->getPost('id_level'),
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
            'urutan'       => $this->request->getPost('urutan'),
        ]);

        logAktivitas(
            'Struktur Jabatan',
            'Mengedit urutan jabatan organisasi'
        );

        return redirect()->to('admin/struktur');
    }

    public function hapusJabatan($id)
    {
        $cek = $this->anggotaModel
            ->where('id_jabatan', $id)
            ->countAllResults();

        if ($cek > 0) {
            return redirect()->back()
                ->with('error', 'Jabatan masih memiliki anggota');
        }

        $this->jabatanModel->delete($id);

        logAktivitas(
            'Struktur Anggota',
            'Menghapus jabatan pada struktur anggota: ' . $this->request->getPost('nama')
        );
        return redirect()->back()
            ->with('success', 'Jabatan berhasil dihapus');
    }

    public function jabatanByLevel($id_level)
    {
        $jabatan = $this->jabatanModel
            ->where('id_level', $id_level)
            ->where('status', 'aktif')
            ->orderBy('urutan')
            ->findAll();

        return $this->response->setJSON($jabatan);
    }
}
