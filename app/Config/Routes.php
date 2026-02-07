<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// =============================================================
// ================= OPEN THE GATE TO HOMEPAGE =================
// =============================================================
$routes->get('/', 'Home::index');
$routes->get('/tentang', 'Home::tentang');

$routes->get('/kegiatan', 'Kegiatan::index');
$routes->get('/kegiatan/(:segment)', 'Kegiatan::detail/$1');
$routes->get('/berita', 'Berita::index');
$routes->get('/berita/cari', 'Berita::search');
$routes->get('/berita/(:segment)', 'Berita::detail/$1');
$routes->get('/struktur', 'Home::struktur');
$routes->get('/daftar', 'Pendaftaran::index');
$routes->post('/daftar/simpan', 'Pendaftaran::simpan');

// ===================== AUTHENTICATION =======================
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('aktivasi', 'Auth::aktivasi');
$routes->post('aktivasi', 'Auth::prosesAktivasi');
$routes->get('logout', 'Auth::logout', ['filter' => 'auth']);

// ===================== FITUR ANGGOTA ========================
$routes->group('anggota', ['filter' => 'role:anggota'], function ($routes) {
    $routes->get('profil', 'Anggota\Profil::index');
    $routes->get('kta', 'Anggota\Profil::kta');
    $routes->get('kta/cetak', 'Anggota\Profil::cetak');
});


// ==============================================================
// =============== DASHBOARD ADMINISTRATOR PANEL ================
// ==============================================================
$routes->group('admin', ['filter' => 'role:admin,super_admin'], function ($routes) {
    // AKSES DASHBOARD ADMINISTRATOR
    $routes->get('dashboard', 'Admin\Dashboard::index');

    // ===== MANAJEMEN ANGGOTA =====
    $routes->get('anggota', 'Admin\Anggota::anggota');
    $routes->get('anggota/export', 'Admin\Anggota::exportAnggota');
    $routes->get('anggota/detail/(:num)', 'Admin\Anggota::detailAnggota/$1');
    $routes->get('anggota/edit/(:num)', 'Admin\Anggota::editAnggota/$1');
    $routes->post('anggota/update/(:num)', 'Admin\Anggota::updateAnggota/$1');
    $routes->get('anggota/hapus/(:num)', 'Admin\Anggota::hapusAnggota/$1');

    // ===== MANAJEMEN BERITA =====
    $routes->get('berita', 'Admin\Berita::index');
    $routes->get('berita/tambah', 'Admin\Berita::create');
    $routes->post('berita/simpan', 'Admin\Berita::store');
    $routes->get('berita/edit/(:num)', 'Admin\Berita::edit/$1');
    $routes->post('berita/update/(:num)', 'Admin\Berita::update/$1');
    $routes->post('berita/hapus/(:num)', 'Admin\Berita::delete/$1');
    $routes->get('berita/preview/(:segment)', 'Admin\Berita::preview/$1');
    $routes->get('berita/export-pdf/(:segment)', 'Admin\Berita::exportPdf/$1');
    $routes->get('berita/headline/(:num)', 'Admin\Berita::setHeadline/$1');

    // ===== MANAJEMEN KEGIATAN =====
    $routes->get('kegiatan', 'Admin\Kegiatan::index');
    $routes->get('kegiatan/tambah', 'Admin\Kegiatan::create');
    $routes->post('kegiatan/simpan', 'Admin\Kegiatan::store');
    $routes->get('kegiatan/preview/(:segment)', 'Admin\Kegiatan::preview/$1');
    $routes->get('kegiatan/edit/(:num)', 'Admin\Kegiatan::edit/$1');
    $routes->post('kegiatan/update/(:num)', 'Admin\Kegiatan::update/$1');
    $routes->post('kegiatan/hapus/(:num)', 'Admin\Kegiatan::delete/$1');

    // ===== MANAJEMEN PENDAFTARAN =====
    $routes->get('pendaftaran', 'Admin\Pendaftaran::index');
    $routes->post('pendaftaran/terima/(:num)', 'Admin\Pendaftaran::terima/$1');
    $routes->post('pendaftaran/tolak/(:num)', 'Admin\Pendaftaran::tolak/$1');

    // ===== MANAJEMEN STRUKTUR =====
    $routes->get('struktur', 'Admin\Struktur::index');
    // KELOLA ANGGOTA PADA STRUKTUR
    $routes->get('struktur/create', 'Admin\Struktur::create');
    $routes->post('struktur/anggota/simpan', 'Admin\Struktur::simpanAnggota');
    $routes->get('struktur/edit/(:num)', 'Admin\Struktur::editAnggota/$1');
    $routes->post('struktur/anggota/update/(:num)', 'Admin\Struktur::updateAnggota/$1');
    $routes->get('struktur/anggota/hapus/(:num)', 'Admin\Struktur::hapusAnggota/$1');

    // AJAX
    $routes->get('struktur/jabatan-by-level/(:num)', 'Admin\Struktur::jabatanByLevel/$1');

    // KELOLA LEVEL PADA STRUKTUR
    $routes->post('struktur/level/simpan', 'Admin\Struktur::simpanLevel');
    $routes->get('struktur/level/edit/(:num)', 'Admin\Struktur::editLevel/$1');
    $routes->post('struktur/level/update/(:num)', 'Admin\Struktur::updateLevel/$1');
    $routes->get('struktur/level/hapus/(:num)', 'Admin\Struktur::hapusLevel/$1');
    $routes->post('struktur/level/update-urutan', 'Admin\Struktur::updateUrutanLevel');
    // KELOLA JABATAN PADA STRUKTUR
    $routes->post('struktur/jabatan/simpan', 'Admin\Struktur::simpanJabatan');
    $routes->get('struktur/jabatan/edit/(:num)', 'Admin\Struktur::editJabatan/$1');
    $routes->post('struktur/jabatan/update/(:num)', 'Admin\Struktur::updateJabatan/$1');
    $routes->get('struktur/jabatan/hapus/(:num)', 'Admin\Struktur::hapusJabatan/$1');
    $routes->post('struktur/jabatan/update-urutan', 'Admin\Struktur::updateUrutanJabatan');


    // ===== LOG AKTIVITAS =====
    $routes->get('logs', 'SuperAdmin\Logs::index');
});