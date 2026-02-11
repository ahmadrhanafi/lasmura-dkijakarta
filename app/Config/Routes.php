<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// =============================================================
// ================= OPEN THE GATE TO HOMEPAGE =================
// =============================================================
$routes->get('/', 'Homepage\Home::index');

// ********* head **********
$routes->get('/kegiatan', 'Homepage\Kegiatan::index');
$routes->get('/kegiatan/(:segment)', 'Homepage\Kegiatan::detail/$1');
$routes->get('/berita', 'Homepage\Berita::index');
$routes->get('/berita/cari', 'Homepage\Berita::search');
$routes->get('/berita/(:segment)', 'Homepage\Berita::detail/$1');
$routes->get('/tentang', 'Homepage\Home::tentang');
$routes->get('/struktur', 'Homepage\Home::struktur');
$routes->get('/daftar', 'Homepage\Pendaftaran::index');
$routes->post('/daftar/simpan', 'Homepage\Pendaftaran::simpan');
// ********* foot **********
$routes->get('/alur-aktivasi', 'Homepage\Home::alur');
$routes->get('/bantuan', 'Homepage\Home::bantuan');
$routes->get('/privacy', 'Homepage\Home::privacy');
$routes->get('/terms', 'Homepage\Home::terms');

// ===================== AUTHENTICATION =======================
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('aktivasi', 'Auth::aktivasi');
$routes->post('aktivasi', 'Auth::prosesAktivasi');
$routes->get('logout', 'Auth::logout', ['filter' => 'auth']);

// ===================== FITUR ANGGOTA ========================
$routes->group('anggota', ['filter' => 'role:anggota'], function ($routes) {
    $routes->get('profil', 'Anggota\Profil::index');
    $routes->get('profil/edit', 'Anggota\Profil::edit');
    $routes->get('profil/update', 'Anggota\Profil::update');
    $routes->get('kta', 'Anggota\Profil::kta');
    $routes->get('kta/cetak', 'Anggota\Profil::cetak');
});


// ==============================================================
// =============== DASHBOARD ADMINISTRATOR PANEL ================
// ==============================================================
$routes->group('admin', ['filter' => 'role:admin,super_admin'], function ($routes) {
    // AKSES DASHBOARD ADMINISTRATOR
    $routes->get('dashboard', 'Dashboard\Dashboard::index');

    // ===== MANAJEMEN ANGGOTA =====
    $routes->get('anggota', 'Dashboard\Anggota::anggota');
    $routes->get('anggota/export', 'Dashboard\Anggota::exportAnggota');
    $routes->get('anggota/detail/(:num)', 'Dashboard\Anggota::detailAnggota/$1');
    $routes->get('anggota/edit/(:num)', 'Dashboard\Anggota::editAnggota/$1');
    $routes->post('anggota/update/(:num)', 'Dashboard\Anggota::updateAnggota/$1');
    $routes->get('anggota/hapus/(:num)', 'Dashboard\Anggota::hapusAnggota/$1');

    // ===== MANAJEMEN BERITA =====
    $routes->get('berita', 'Dashboard\Berita::index');
    $routes->get('berita/tambah', 'Dashboard\Berita::create');
    $routes->post('berita/simpan', 'Dashboard\Berita::store');
    $routes->get('berita/edit/(:num)', 'Dashboard\Berita::edit/$1');
    $routes->post('berita/update/(:num)', 'Dashboard\Berita::update/$1');
    $routes->post('berita/hapus/(:num)', 'Dashboard\Berita::delete/$1');
    $routes->get('berita/preview/(:segment)', 'Dashboard\Berita::preview/$1');
    $routes->get('berita/export-pdf/(:segment)', 'Dashboard\Berita::exportPdf/$1');
    $routes->get('berita/headline/(:num)', 'Dashboard\Berita::setHeadline/$1');

    // ===== MANAJEMEN KEGIATAN =====
    $routes->get('kegiatan', 'Dashboard\Kegiatan::index');
    $routes->get('kegiatan/tambah', 'Dashboard\Kegiatan::create');
    $routes->post('kegiatan/simpan', 'Dashboard\Kegiatan::store');
    $routes->get('kegiatan/preview/(:segment)', 'Dashboard\Kegiatan::preview/$1');
    $routes->get('kegiatan/edit/(:num)', 'Dashboard\Kegiatan::edit/$1');
    $routes->post('kegiatan/update/(:num)', 'Dashboard\Kegiatan::update/$1');
    $routes->post('kegiatan/hapus/(:num)', 'Dashboard\Kegiatan::delete/$1');

    // ===== MANAJEMEN PENDAFTARAN =====
    $routes->get('pendaftaran', 'Dashboard\Pendaftaran::index');
    $routes->post('pendaftaran/terima/(:num)', 'Dashboard\Pendaftaran::terima/$1');
    $routes->post('pendaftaran/tolak/(:num)', 'Dashboard\Pendaftaran::tolak/$1');

    // ===== MANAJEMEN STRUKTUR =====
    $routes->get('struktur', 'Dashboard\Struktur::index');
    // KELOLA ANGGOTA PADA STRUKTUR
    $routes->get('struktur/create', 'Dashboard\Struktur::create');
    $routes->post('struktur/anggota/simpan', 'Dashboard\Struktur::simpanAnggota');
    $routes->get('struktur/edit/(:num)', 'Dashboard\Struktur::editAnggota/$1');
    $routes->post('struktur/anggota/update/(:num)', 'Dashboard\Struktur::updateAnggota/$1');
    $routes->get('struktur/anggota/hapus/(:num)', 'Dashboard\Struktur::hapusAnggota/$1');

    // AJAX
    $routes->get('struktur/jabatan-by-level/(:num)', 'Dashboard\Struktur::jabatanByLevel/$1');

    // KELOLA LEVEL PADA STRUKTUR
    $routes->post('struktur/level/simpan', 'Dashboard\Struktur::simpanLevel');
    $routes->get('struktur/level/edit/(:num)', 'Dashboard\Struktur::editLevel/$1');
    $routes->post('struktur/level/update/(:num)', 'Dashboard\Struktur::updateLevel/$1');
    $routes->get('struktur/level/hapus/(:num)', 'Dashboard\Struktur::hapusLevel/$1');
    $routes->post('struktur/level/update-urutan', 'Dashboard\Struktur::updateUrutanLevel');
    // KELOLA JABATAN PADA STRUKTUR
    $routes->post('struktur/jabatan/simpan', 'Dashboard\Struktur::simpanJabatan');
    $routes->get('struktur/jabatan/edit/(:num)', 'Dashboard\Struktur::editJabatan/$1');
    $routes->post('struktur/jabatan/update/(:num)', 'Dashboard\Struktur::updateJabatan/$1');
    $routes->get('struktur/jabatan/hapus/(:num)', 'Dashboard\Struktur::hapusJabatan/$1');
    $routes->post('struktur/jabatan/update-urutan', 'Dashboard\Struktur::updateUrutanJabatan');


    // ===== SUPER ADMIN EXTRA FITUR =====
    $routes->get('logs', 'Dashboard\Logs::index');
    $routes->post('logs/cleanup', 'Dashboard\Logs::cleanup');
    $routes->get('manajemen-admin', 'Dashboard\Admin::index');
    $routes->get('pengaturan', 'Dashboard\Pengaturan::index');
    $routes->post('pengaturan/save', 'Dashboard\Pengaturan::save');
});

// ================= SUPER ADMIN PANEL =================
$routes->group('admin', ['filter' => 'role:super_admin'], function ($routes) {
    $routes->get('dashboard', 'Dashboard\Dashboard::index');
});
