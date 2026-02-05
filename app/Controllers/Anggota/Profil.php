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

        $user = $this->userModel->find($idUser);

        $biodata = $this->pendaftaranModel
            ->where('nama_lengkap', $idUser)
            ->first();

        return view('home/profil/index', [
            'title'   => 'Profil Anggota | LASMURA DKI JAKARTA',
            'user'    => $user,
            'biodata' => $biodata
        ]);
    }

    // halaman cetak KTA
    public function kta()
    {
        $user = $this->userModel->find(session()->get('id_user'));

        return view('home/profil/kta', [
            'title' => 'Kartu Tanda Anggota | LASMURA DKI JAKARTA',
            'user'  => $user
        ]);
    }

    // cetak KTA ke PDF
    public function cetak()
    {
        $user = $this->userModel->find(session()->get('id_user'));

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
