<?php
$role = session()->get('role');

$theme = [
    'bg'        => 'bg-[#b91c1c]',
    'hover'     => 'hover:bg-[#991b1b]',
    'title'     => 'Admin LASMURA',
];

if ($role === 'admin') {
    $theme = [
        'bg'        => 'bg-gray-800',
        'hover'     => 'hover:bg-[#d66a0c]',
        'title'     => 'Admin LASMURA',
    ];
}

if ($role === 'super_admin') {
    $theme = [
        'bg'        => 'bg-[#b91c1c]',
        'hover'     => 'hover:bg-[#d66a0c]',
        'title'     => 'Super Admin LASMURA',
    ];
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/svg+xml" href="<?= base_url('assets/favicon/lasmura.jpg') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        <!-- Sidebar Desktop -->
        <aside class="w-64 <?= $theme['bg'] ?> text-white hidden md:block">
            <div class="p-6 font-bold text-xl">
                <a href="<?= base_url('/admin/dashboard') ?>" class="flex justify-center items-center space-x-2">
                    <img src="<?= base_url('assets/logo/lasmura.png') ?>" alt="LASMURA" class="h-auto max-w-full" width="100" height="100">
                </a>
            </div>

            <nav class="px-4 space-y-2">
                <hr class="my-2 border-white/30">

                <?php if (in_array(session()->get('role'), ['admin', 'super_admin'])): ?>
                    <a href="<?= base_url('/admin/dashboard') ?>"
                        class="flex item-center gap-3 px-4 py-2 rounded <?= $theme['hover'] ?>">
                        <i class="fa-solid fa-gauge w-5 mt-1 text-center"></i>
                        <span>Dashboard</span>
                    </a>

                    <a href="<?= base_url('/admin/pendaftaran') ?>"
                        class="flex item-center gap-3 px-4 py-2 rounded <?= $theme['hover'] ?>">
                        <i class="fa-solid fa-user-check w-5 mt-1 text-center"></i>
                        <span>Penerimaan Anggota</span>
                    </a>

                    <a href="<?= base_url('/admin/anggota') ?>"
                        class="flex item-center gap-3 px-4 py-2 rounded <?= $theme['hover'] ?>">
                        <i class="fa-solid fa-users w-5 mt-1 text-center"></i>
                        <span>Anggota LASMURA</span>
                    </a>

                    <a href="<?= base_url('/admin/berita') ?>"
                        class="flex item-center gap-3 px-4 py-2 rounded <?= $theme['hover'] ?>">
                        <i class="fa-solid fa-newspaper w-5 mt-1 text-center"></i>
                        <span>Pengelolaan Berita</span>
                    </a>

                    <a href="<?= base_url('/admin/kegiatan') ?>"
                        class="flex item-center gap-3 px-4 py-2 rounded <?= $theme['hover'] ?>">
                        <i class="fa-solid fa-calendar-days w-5 mt-1 text-center"></i>
                        <span>Kegiatan LASMURA</span>
                    </a>

                    <a href="<?= base_url('/admin/struktur') ?>"
                        class="flex item-center gap-3 px-4 py-2 rounded <?= $theme['hover'] ?>">
                        <i class="fa-solid fa-sitemap w-5 mt-1 text-center"></i>
                        <span>Struktur Organisasi</span>
                    </a>
                <?php endif; ?>

                <?php if (session()->get('role') === 'super_admin'): ?>
                    <hr class="my-2 border-white/30">

                    <a href="<?= base_url('admin/logs') ?>"
                        class="flex item-center gap-3 px-4 py-2 rounded <?= $theme['hover'] ?>">
                        <i class="fa-solid fa-user-clock w-5 mt-1 text-center"></i>
                        <span>Log Aktivitas</span>
                    </a>

                    <a href="<?= base_url('admin/manajemen-admin') ?>"
                        class="flex item-center gap-3 px-4 py-2 rounded <?= $theme['hover'] ?> font-semibold">
                        <i class="fa-solid fa-user-shield w-5 mt-1 text-center"></i>
                        <span>Manajemen Admin</span>
                    </a>

                    <a href="<?= base_url('admin/pengaturan') ?>"
                        class="flex item-center gap-3 px-4 py-2 rounded <?= $theme['hover'] ?>">
                        <i class="fa-solid fa-gear w-5 mt-1 text-center"></i>
                        <span>Pengaturan Sistem</span>
                    </a>
                <?php endif; ?>

                <hr class="my-2 border-white/30">

                <a href="<?= base_url('/logout') ?>"
                    class="flex item-center gap-3 px-4 py-2 rounded <?= $theme['hover'] ?>"
                    onclick="return confirm('Anda yakin ingin mengakhiri sesi ini??')">
                    <i class="fa-solid fa-power-off w-5 mt-1 text-center"></i>
                    <span>Logout</span>
                </a>
            </nav>
        </aside>

        <!-- Mobile Sidebar Overlay -->
        <div id="mobileSidebar"
            class="fixed inset-0 z-50 <?= $theme['bg'] ?> text-white hidden md:hidden flex flex-col">
            <div class="p-6 flex justify-between items-center">

                <a href="<?= base_url('/admin/dashboard') ?>" class="flex justify-center items-center space-x-2">
                    <img src="<?= base_url('assets/logo/lasmura.png') ?>" alt="LASMURA" class="h-auto max-w-full" width="50" height="50">
                    <span class="text-xl"><b class="text-[#1a1817]">LASMURA</b> DKI JAKARTA</span>
                </a>
                <button id="closeSidebar" class="text-1xl">✕</button>
            </div>

            <nav class="px-4 space-y-2">
                <hr class="my-2 border-white/30">

                <a href="<?= base_url(
                                session()->get('role') === 'super_admin'
                                    ? 'super-admin/dashboard'
                                    : 'admin/dashboard'
                            ) ?>"
                    class="flex item-center gap-3 px-4 py-2 rounded <?= $theme['hover'] ?>">
                    <i class="fa-solid fa-gauge w-5 mt-1 text-center"></i>
                    <span>Dashboard</span>
                </a>

                <?php if (in_array(session()->get('role'), ['admin', 'super_admin'])): ?>
                    <a href="<?= base_url('/admin/pendaftaran') ?>"
                        class="flex item-center gap-3 px-4 py-2 rounded <?= $theme['hover'] ?>">
                        <i class="fa-solid fa-user-check w-5 mt-1 text-center"></i>
                        <span>Penerimaan Anggota</span>
                    </a>

                    <a href="<?= base_url('/admin/anggota') ?>"
                        class="flex item-center gap-3 px-4 py-2 rounded <?= $theme['hover'] ?>">
                        <i class="fa-solid fa-users w-5 mt-1 text-center"></i>
                        <span>Anggota LASMURA</span>
                    </a>

                    <a href="<?= base_url('/admin/berita') ?>"
                        class="flex item-center gap-3 px-4 py-2 rounded <?= $theme['hover'] ?>">
                        <i class="fa-solid fa-newspaper w-5 mt-1 text-center"></i>
                        <span>Pengelolaan Berita</span>
                    </a>

                    <a href="<?= base_url('/admin/anggota') ?>"
                        class="flex item-center gap-3 px-4 py-2 rounded <?= $theme['hover'] ?>">
                        <i class="fa-solid fa-calendar-days w-5 mt-1 text-center"></i>
                        <span>Kegiatan LASMURA</span>
                    </a>

                    <a href="<?= base_url('/admin/anggota') ?>"
                        class="flex item-center gap-3 px-4 py-2 rounded <?= $theme['hover'] ?>">
                        <i class="fa-solid fa-sitemap w-5 mt-1 text-center"></i>
                        <span>Struktur Organisasi</span>
                    </a>
                <?php endif; ?>

                <?php if (session()->get('role') === 'super_admin'): ?>
                    <hr class="my-2 border-white/30">

                    <a href="<?= base_url('/super-admin/logs') ?>"
                        class="flex item-center gap-3 px-4 py-2 rounded <?= $theme['hover'] ?>">
                        <i class="fa-solid fa-user-clock w-5 mt-1 text-center"></i>
                        <span>Log Aktivitas</span>
                    </a>

                    <a href="<?= base_url('/super-admin/admin') ?>"
                        class="flex item-center gap-3 px-4 py-2 rounded <?= $theme['hover'] ?> font-semibold">
                        <i class="fa-solid fa-user-shield w-5 mt-1 text-center"></i>
                        <span>Manajemen Admin</span>
                    </a>

                    <a href="<?= base_url('/super-admin/settings') ?>"
                        class="flex item-center gap-3 px-4 py-2 rounded <?= $theme['hover'] ?>">
                        <i class="fa-solid fa-gear w-5 mt-1 text-center"></i>
                        <span>Pengaturan Sistem</span>
                    </a>
                <?php endif; ?>

                <hr class="my-2 border-white/30">

                <a href="<?= base_url('/logout') ?>"
                    class="flex item-center gap-3 px-4 py-2 rounded <?= $theme['hover'] ?>"
                    onclick="return confirm('Anda yakin ingin mengakhiri sesi ini??')">
                    <i class="fa-solid fa-power-off w-5 mt-1 text-center"></i>
                    <span>Logout</span>
                </a>
            </nav>

        </div>

        <!-- Main Wrapper -->
        <div class="flex-1 flex flex-col">

            <!-- Topbar -->
            <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <!-- Mobile Toggle -->
                    <button id="openSidebar" class="md:hidden text-gray-700 text-1xl">
                        ☰
                    </button>

                    <h1 class="text-xl font-semibold text-gray-700">
                        Dashboard
                    </h1>
                </div>

                <div class="text-sm p-2 bg-gray-200 rounded text-gray-400">
                    <?= session()->get('role') === 'super_admin'
                        ? 'Super Admin'
                        : 'Admin' ?>
                </div>
            </header>

            <?php if (isset($breadcrumb)): ?>
                <?= $this->include('board/layout/breadcrumb') ?>
            <?php endif; ?>