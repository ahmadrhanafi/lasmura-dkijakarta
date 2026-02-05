<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendaftaranModel;

class Pendaftaran extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Form Pendaftaran Anggota LASMURA DKI Jakarta'
        ];

        return view('home/pages/daftar', $data);
    }

    public function simpan()
    {
        // Validasi dasar
        $rules = [
            'nama_lengkap'   => [
                'rules'  => 'required|min_length[3]|max_length[100]',
                'errors' => ['required' => 'Nama lengkap wajib diisi.']
            ],
            'username'       => [
                'rules'  => 'required|min_length[4]|max_length[15]|is_unique[users.username]|alpha_dash',
                'errors' => [
                    'is_unique' => 'Username ini sudah terdaftar.',
                    'alpha_dash' => 'Username hanya boleh berisi huruf, angka, dan underscore.'
                ]
            ],
            'nik'            => [
                'rules'  => 'required|exact_length[16]|numeric|is_unique[users.nik]',
                'errors' => [
                    'exact_length' => 'NIK harus tepat 16 digit.',
                    'numeric'      => 'NIK harus berupa angka.',
                    'is_unique'    => 'NIK ini sudah pernah mendaftar.'
                ]
            ],
            'jenis_kelamin'  => [
                'rules'  => 'required',
                'errors' => ['required' => 'Jenis kelamin wajib diisi.']
            ],
            'tanggal_lahir'  => [
                'rules'  => 'required|valid_date[Y-m-d]',
                'errors' => ['required' => 'Tanggal lahir wajib diisi.']
            ],
            'no_hp'          => [
                'rules'  => 'required|numeric|min_length[10]|max_length[15]',
                'errors' => ['numeric' => 'Nomor HP harus berupa angka.']
            ],
            'alamat'         => [
                'rules'  => 'required|min_length[10]',
                'errors' => ['min_length' => 'Alamat minimal 10 karakter.']
            ],
            'setuju'         => [
                'rules'  => 'required',
                'errors' => ['required' => 'Anda harus menyetujui syarat & ketentuan.']
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Maaf pendaftaran gagal. Silakan periksa kembali isian Anda.')
                ->with('errors', $this->validator->getErrors());
        }

        $model = new PendaftaranModel();

        /**
         * 🔐 CEK DUPLIKASI
         * username & nik tidak boleh sama
         */
        $cek = $model
            ->groupStart()
            ->where('username', $this->request->getPost('username'))
            ->orWhere('nik', $this->request->getPost('nik'))
            ->groupEnd()
            ->first();

        if ($cek) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Username atau NIK sudah pernah terdaftar');
        }

        // Simpan ke tabel pendaftaran_anggota
        $model->insert([
            'nama_lengkap'  => $this->request->getPost('nama_lengkap'),
            'username'      => $this->request->getPost('username'),
            'nik'           => $this->request->getPost('nik'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'email'         => $this->request->getPost('email'),
            'alamat'        => $this->request->getPost('alamat'),
            'status'        => 'menunggu'
        ]);

        return redirect()->to('/daftar')
            ->with('success', 'Pendaftaran berhasil dikirim. Silakan menunggu persetujuan admin.');
    }
}
