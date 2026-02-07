<?php

use App\Models\LogAktivitasModel;

if (!function_exists('logAktivitas')) {
    function logAktivitas(string $modul, string $aksi)
    {
        $session = session();

        $logModel = new LogAktivitasModel();

        $logModel->insert([
            'id_user'    => $session->get('id_user'),
            'role'       => $session->get('role'),
            'modul'      => $modul,
            'aksi'       => $aksi,
            'ip_address' => service('request')->getIPAddress(),
            'user_agent' => service('request')->getUserAgent()->getAgentString(),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
