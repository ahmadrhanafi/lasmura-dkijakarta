<?php

namespace App\Controllers\Anggota;

use App\Controllers\BaseController;
use App\Models\PendaftaranModel;
use App\Models\UserModel;
use Dompdf\Dompdf;

class Profil extends BaseController
{
    protected $userModel;
    protected $pendaftaranModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->pendaftaranModel = new PendaftaranModel();
    }

    public function index()
    {
        $idUser = session()->get('id_user');

        $user = $this->userModel
            ->withPendaftaran()
            ->where('users.id_user', $idUser)
            ->first();

        return view('home/profil/index', [
            'title' => 'Profil Anggota | LASMURA DKI JAKARTA',
            'user'  => $user
        ]);
    }

    public function edit()
    {
        $idUser = session()->get('id_user');

        $user = $this->userModel
            ->withPendaftaran()
            ->where('users.id_user', $idUser)
            ->first();

        if (!$user) {
            return redirect()->to('/anggota/profil')
                ->with('error', 'Data profil tidak ditemukan');
        }

        return view('home/profil/edit', [
            'title' => 'Edit Profil | LASMURA DKI JAKARTA',
            'user'  => $user
        ]);
    }

    public function update()
    {
        $idUser = session()->get('id_user');

        $this->userModel->update($idUser, [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username'     => $this->request->getPost('username'),
        ]);

        $pendaftaran = $this->pendaftaranModel
            ->where('nik', $this->request->getPost('nik'))
            ->first();

        $dataPendaftaran = [
            'nama_lengkap'  => $this->request->getPost('nama_lengkap'),
            'nik'           => $this->request->getPost('nik'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'email'         => $this->request->getPost('email'),
            'alamat'        => $this->request->getPost('alamat'),
            'status'        => 'diterima',
        ];

        if ($pendaftaran) {
            $this->pendaftaranModel->update(
                $pendaftaran['id_pendaftaran'],
                $dataPendaftaran
            );
        } else {
            $this->pendaftaranModel->insert($dataPendaftaran);
        }

        return redirect()->to('/anggota/profil')
            ->with('success', 'Profil berhasil diperbarui');
    }

    public function kta()
    {
        $idUser = session()->get('id_user');

        $user = $this->userModel
            ->withPendaftaran()
            ->where('users.id_user', $idUser)
            ->first();

        return view('home/profil/kta', [
            'title' => 'Kartu Tanda Anggota | LASMURA DKI JAKARTA',
            'user'  => $user
        ]);
    }

    public function cetak()
    {
        $idUser = session()->get('id_user');

        $user = $this->userModel
            ->withPendaftaran()
            ->where('users.id_user', $idUser)
            ->first();

        $html = view('home/profil/pdf', [
            'user' => $user
        ]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $dompdf->stream(
            'KTA-' . $user['nomor_anggota'] . '.pdf',
            ['Attachment' => false]
        );
    }
}
