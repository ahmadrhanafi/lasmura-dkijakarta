<?php

namespace App\Controllers\Anggota;

use App\Controllers\BaseController;
use App\Models\PendaftaranModel;
use App\Models\UserModel;
use App\Models\StrukturAnggotaModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Profil extends BaseController
{
    protected $userModel;
    protected $pendaftaranModel;
    protected $strukturAnggotaModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->pendaftaranModel = new PendaftaranModel();
        $this->strukturAnggotaModel = new StrukturAnggotaModel();
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

        $strukturModel = new StrukturAnggotaModel();

        $jabatan = $strukturModel->getByUser($idUser);


        $user = $this->userModel
            ->withPendaftaran()
            ->where('users.id_user', $idUser)
            ->first();

        return view('home/profil/kta', [
            'title' => 'Kartu Tanda Anggota | LASMURA DKI JAKARTA',
            'user'  => $user,
            'jabatan' => $jabatan
        ]);
    }

    public function cetak()
    {
        $idUser = session()->get('id_user');

        $strukturModel = new StrukturAnggotaModel();

        $jabatan = $strukturModel->getByUser($idUser);

        $user = $this->userModel
            ->withPendaftaran()
            ->where('users.id_user', $idUser)
            ->first();

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isFontSubsettingEnabled', true);


        $dompdf = new Dompdf($options);

        $frontPath = FCPATH . 'assets/images/kta-template1.png';
        $backPath  = FCPATH . 'assets/images/kta-template2.png';

        $frontData = base64_encode(file_get_contents($frontPath));
        $backData  = base64_encode(file_get_contents($backPath));

        $dataView = [
            'user' => $user,
            'jabatan' => $jabatan,
            'frontImage' => 'data:image/png;base64,' . $frontData,
            'backImage'  => 'data:image/png;base64,' . $backData,
        ];

        $html = view('home/profil/pdf', $dataView);

        $dompdf->loadHtml($html);

        $dompdf->setPaper([0, 0, 241.89, 155.91]);

        $dompdf->render();

        $dompdf->stream(
            'KTA-' . $user['nomor_anggota'] . '.pdf',
            ['Attachment' => false]
        );
    }
}
