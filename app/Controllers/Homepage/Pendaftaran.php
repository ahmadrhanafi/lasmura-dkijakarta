<?php

namespace App\Controllers\Homepage;

use App\Controllers\BaseController;
use App\Models\PendaftaranModel;

class Pendaftaran extends BaseController
{
    public function index()
    {
        return view('home/pages/daftar', [
            'title' => 'Form Pendaftaran Anggota LASMURA DKI Jakarta | ' . $this->siteName
        ]);
    }

    public function simpan()
    {
        $rules = [
            'nama_lengkap'  => 'required|min_length[3]|max_length[100]',
            'username'      => 'required|min_length[4]|max_length[15]|is_unique[pendaftaran_anggota.username]|alpha_dash',
            'email'         => 'required|valid_email|is_unique[pendaftaran_anggota.email]',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|valid_date[Y-m-d]',
            'no_hp'         => 'required|numeric|min_length[10]|max_length[15]',
            'alamat'        => 'required|min_length[10]',
            'setuju'        => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()
                ->with('error', 'Maaf, pendaftaran gagal. Silakan periksa kembali.')
                ->with('errors', $this->validator->getErrors());
        }

        $model = new PendaftaranModel();

        $nomorAnggota = $this->_generateNomorAnggota($model);

        $data = [
            'nama_lengkap'  => $this->request->getPost('nama_lengkap'),
            'username'      => $this->request->getPost('username'),
            'nomor_anggota' => $nomorAnggota,
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'email'         => $this->request->getPost('email'),
            'alamat'        => $this->request->getPost('alamat'),
            'status'        => 'menunggu'
        ];

        if ($model->insert($data)) {

            $emailSent = $this->_sendEmail($data);

            return view('home/pages/sukses', [
                'nama'           => $data['nama_lengkap'],
                'nomor_anggota'  => $data['nomor_anggota'],
                'email_terkirim' => $emailSent,
                'email_user'     => $data['email']
            ]);
        }
    }

    private function _generateNomorAnggota($model)
    {
        $tahun = date('Y');
        $prefix = "LSM-" . $tahun . "-";
        $terakhir = $model->like('nomor_anggota', $prefix, 'after')
            ->orderBy('nomor_anggota', 'DESC')
            ->first();

        if ($terakhir) {
            $urut = substr($terakhir['nomor_anggota'], -4);
            $nomorBaru = intval($urut) + 1;
        } else {
            $nomorBaru = 1;
        }

        return $prefix . str_pad($nomorBaru, 4, '0', STR_PAD_LEFT);
    }


    private function _sendEmail($data)
    {
        $email = \Config\Services::email();

        $config = [
            'protocol'     => 'smtp',
            'SMTPHost'     => 'ssl://smtp.gmail.com',
            'SMTPUser'     => 'salemankelrey99@gmail.com',
            'SMTPPass'     => 'wcmpvzluyzartsjo',
            'SMTPPort'     => 465,
            'SMTPCrypto'   => 'ssl',
            'mailType'     => 'html',
            'charset'      => 'utf-8',
            'newline'      => "\r\n",
            'CRLF'         => "\r\n",
            'SMTPKeepAlive' => true,
            'SMTPTimeout'  => 30,
        ];

        // if (is_file(ROOTPATH . '.env')) {
        //     $config['DSN'] = true;
        // }

        $email->initialize($config);

        $email->setFrom('salemankelrey99@gmail.com', 'Admin LASMURA');
        $email->setTo($data['email']);
        $email->setSubject('Nomor Anggota LASMURA DKI Jakarta');

        $message = "Halo <b>{$data['nama_lengkap']}</b>,<br><br>Nomor Anggota Anda: <h2>{$data['nomor_anggota']}</h2>";
        $email->setMessage($message);

        if ($email->send()) {
            return true;
            // echo "Email Berhasil Terkirim!";
        } else {
            // echo $email->printDebugger(['headers', 'subject', 'body']);
            // die();
            return false;
        }
    }

    // Fungsi Privat Kirim Email
    // private function _sendEmail($data)
    // {
    //     $email = \Config\Services::email();
    //     $email->setTo($data['email']);
    //     $email->setSubject('Nomor Anggota LASMURA DKI Jakarta');

    //     $html = "
    // <div style='font-family: sans-serif; max-width: 600px; margin: auto; border: 1px solid #eee; padding: 20px; border-radius: 15px;'>
    //     <h2 style='color: #ea7e13; text-align: center;'>Halo, {$data['nama_lengkap']}!</h2>
    //     <p>Pendaftaran Anda telah kami terima. Berikut adalah nomor pendaftaran/anggota Anda:</p>
    //     <div style='background: #fdf2e9; padding: 15px; text-align: center; border-radius: 10px; border: 2px dashed #ea7e13;'>
    //         <h1 style='color: #ec1309; margin: 0; letter-spacing: 2px;'>{$data['nomor_anggota']}</h1>
    //     </div>
    //     <p style='font-size: 12px; color: #666; margin-top: 20px;'>
    //         *Gunakan nomor ini untuk memantau status pendaftaran atau melakukan aktivasi setelah disetujui Admin.
    //     </p>
    //     <hr style='border: 0; border-top: 1px solid #eee; margin: 20px 0;'>
    //     <p style='text-align: center; font-weight: bold;'>LASMURA DKI JAKARTA</p>
    // </div>
    // ";

    //     $email->setMessage($html);

    //     if ($email->send()) {
    //         return true;
    //     } else {
    //         log_message('error', $email->printDebugger(['headers']));
    //         return false;
    //     }
    // }
}
