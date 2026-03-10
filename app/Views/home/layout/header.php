<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <link rel="shortcut icon" href="<?= base_url('assets/favicon/lasmura.ico') ?>" type="image/x-icon">
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/favicon/lasmura.ico?v=1.1') ?>">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        html,
        body {
            max-width: 100%;
            overflow-x: hidden;
            font-family: 'Inter', sans-serif;
        }

        .header-active {
            /* background: linear-gradient(135deg, #ea7e13 0%, #ec1309 100%); */
            background: #ea7e13;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.2);
            padding-top: 0.5rem !important;
            padding-bottom: 0.5rem !important;
        }

        .nav-link {
            position: relative;
            transition: color 0.3s;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: white;
            transition: width 0.3s;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .bg-gradient-lasmura {
            background: linear-gradient(135deg, #ea7e13 0%, #ec1309 100%);
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800">

    <header id="mainHeader" class="fixed top-0 w-full z-[100] transition-all duration-500 text-white">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center transition-all duration-500">

            <a href="<?= base_url('/') ?>" class="flex items-center space-x-3 group">
                <div class="bg-white p-1.5 rounded-lg shadow-inner group-hover:scale-110 transition-transform">
                    <img src="<?= base_url('assets/logo/lasmura.png') ?>" class="w-6 h-6" alt="Logo">
                </div>
                <div class="flex flex-col">
                    <span class="font-extrabold text-md tracking-tight leading-none">LASMURA</span>
                    <span class="text-[8px] uppercase tracking-[0.3em] font-medium opacity-80">DKI Jakarta</span>
                </div>
            </a>

            <nav class="hidden lg:flex space-x-8 items-center text-[13px] font-semibold uppercase tracking-wider">
                <a href="<?= base_url('/') ?>" class="nav-link">Beranda</a>
                <div class="relative group">
                    <button id="aboutBtn" class="nav-link flex items-center space-x-1 focus:outline-none uppercase tracking-wider">
                        <span class="mr-1">Profil</span>
                        <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-300 mb-1" id="aboutChevron"></i>
                    </button>

                    <div id="aboutMenu" class="hidden absolute left-0 mt-3 w-52 bg-white text-slate-700 rounded-2xl shadow-2xl border border-slate-100 overflow-hidden py-2 animate-in fade-in slide-in-from-top-2">
                        <a href="<?= base_url('/tentang/profil') ?>" class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-100 transition-colors">
                            <i class="fa-solid fa-circle-info text-slate-400 w-4"></i>
                            <span class="normal-case font-medium">Tentang Kami</span>
                        </a>
                        <a href="<?= base_url('/struktur') ?>" class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-100 transition-colors">
                            <i class="fa-solid fa-sitemap text-slate-400 w-4"></i>
                            <span class="normal-case font-medium">Struktur Manajemen</span>
                        </a>
                        <a href="<?= base_url('/tentang/ad-art') ?>" class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-100 transition-colors">
                            <i class="fa-solid fa-file-contract text-slate-400 w-4"></i>
                            <span class="normal-case font-medium">Laporan Organisasi</span>
                        </a>
                    </div>
                </div>
                <a href="<?= base_url('/kegiatan') ?>" class="nav-link">Kegiatan</a>
                <a href="<?= base_url('/berita') ?>" class="nav-link">Berita</a>
                <a href="<?= base_url('/galeri') ?>" class="nav-link">Galeri</a>

                <div class="h-6 w-[1px] bg-white/20 mx-2"></div>

                <?php if (!session()->get('logged_in')): ?>
                    <div class="flex items-center space-x-8">
                        <a href="<?= base_url('/login') ?>"
                            class="hover:text-white/80 transition-colors">
                            Login
                        </a>
                        <a href="<?= base_url('/daftar') ?>"
                            class="bg-white text-[#ea7e13] px-4 py-1.5 rounded shadow-md hover:bg-slate-100 active:scale-95 transition-all">
                            Daftar Anggota
                        </a>
                    </div>

                <?php elseif (session()->get('logged_in')): ?>
                    <div class="relative">
                        <button id="profileBtn"
                            class="flex items-center space-x-3 bg-white/10 hover:bg-white/20 px-4 py-2 rounded-full transition-all focus:outline-none">
                            <div class="w-7 h-7 bg-white rounded-full flex items-center justify-center text-[#ec1309]">
                                <i class="fa-solid fa-user text-xs"></i>
                            </div>
                            <span class="normal-case font-medium"><?= explode(' ', (session()->get('nama_lengkap')))[0] ?></span>
                            <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-300" id="chevronIcon"></i>
                        </button>

                        <div id="profileMenu"
                            class="hidden absolute right-0 mt-3 w-56 bg-white text-slate-700 rounded-2xl shadow-2xl border border-slate-100 overflow-hidden py-2 animate-in fade-in slide-in-from-top-2">
                            <?php if (!in_array(session()->get('role'), ['admin', 'superadmin'])): ?>
                                <div class="px-4 py-2 border-b border-slate-50 mb-1">
                                    <p class="text-[10px] text-slate-400 uppercase font-bold tracking-widest">Akun Saya</p>
                                </div>
                                <a href="<?= base_url('/anggota/profil') ?>" class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-50 transition-colors">
                                    <i class="fa-solid fa-id-badge text-slate-400 w-5 text-center"></i>
                                    <span class="text-slate-400">Lihat Profil</span>
                                </a>
                                <a href="<?= base_url('/anggota/kta') ?>" class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-50 transition-colors">
                                    <i class="fa-solid fa-address-card text-slate-400 w-5 text-center"></i>
                                    <span class="text-slate-400">Cetak KTA</span>
                                </a>
                            <?php endif; ?>

                            <?php if (in_array(session()->get('role'), ['admin', 'superadmin'])): ?>
                                <a href="<?= base_url('/admin/dashboard') ?>" class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-50 transition-colors">
                                    <i class="fa-solid fa-gauge text-slate-400 w-5 text-center"></i>
                                    <span class="text-slate-400">Dashboard</span>
                                </a>
                            <?php endif; ?>
                            <div class="border-t border-slate-50 my-1"></div>

                            <a href="<?= base_url('/logout') ?>" class="flex items-center space-x-3 px-4 py-3 text-red-500 hover:bg-red-50 transition-colors"
                                onclick="return confirm('Anda yakin ingin mengakhiri sesi ini??')">
                                <i class="fa-solid fa-right-from-bracket w-5 text-center"></i>
                                <span class="font-bold">Logout</span>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </nav>

            <button id="menu-btn" class="lg:hidden w-10 h-10 flex items-center justify-center rounded-lg bg-white/10 hover:bg-white/20 transition-all">
                <i class="fa-solid fa-bars text-md" id="menuIcon"></i>
            </button>
        </div>

        <div id="menu" class="hidden lg:hidden bg-white text-slate-800 border-t border-slate-100 shadow-2xl animate-in fade-in zoom-in-95">
            <div class="px-6 py-8 space-y-6 font-semibold uppercase tracking-wider text-sm">
                <a href="<?= base_url('/') ?>" class="block hover:text-[#ec1309]">Beranda</a>
                <div class="space-y-4">
                    <button onclick="toggleMobileAbout()" class="flex justify-between items-center w-full uppercase font-semibold tracking-wider hover:text-[#ec1309]">
                        Profil <i class="fa-solid fa-chevron-down text-xs transition-transform" id="mobileAboutChevron"></i>
                    </button>
                    <div id="mobileAboutMenu" class="hidden pl-4 space-y-4 border-l-2 border-slate-100 ml-1">
                        <a href="<?= base_url('/tentang/profil') ?>" class="block text-slate-500 hover:text-[#ec1309] normal-case">Tentang Kami</a>
                        <a href="<?= base_url('/struktur') ?>" class="block text-slate-500 hover:text-[#ec1309] normal-case">Struktur Manajemen</a>
                        <a href="<?= base_url('/tentang/ad-art') ?>" class="block text-slate-500 hover:text-[#ec1309] normal-case">Laporan Organisasi</a>
                    </div>
                </div>
                <a href="<?= base_url('/kegiatan') ?>" class="block hover:text-[#ec1309]">Kegiatan</a>
                <a href="<?= base_url('/berita') ?>" class="block hover:text-[#ec1309]">Berita</a>
                <a href="<?= base_url('/galeri') ?>" class="block hover:text-[#ec1309]">Galeri</a>
            </div>

            <hr class="border-slate-100">

            <?php if (!session()->get('logged_in')): ?>
                <div class="grid grid-cols-2 gap-4 p-5 mb-3">
                    <a href="<?= base_url('/login') ?>" class="flex items-center justify-center py-3 rounded-xl border border-slate-200 text-slate-600">Login</a>
                    <a href="<?= base_url('/daftar') ?>" class="flex items-center justify-center py-3 rounded-xl bg-gradient-lasmura text-white shadow-lg">Daftar</a>
                </div>
            <?php else: ?>
                <div class="space-y-4 p-4">
                    <?php if (!in_array(session()->get('role'), ['admin', 'superadmin'])): ?>
                        <a href="<?= base_url('/anggota/profil') ?>" class="block text-center py-3 rounded-xl bg-blue-50 text-blue-600 font-bold">
                            <span class="uppercase text-md font-bold">Profil</span>
                        </a>
                    <?php endif; ?>
                    <?php if (in_array(session()->get('role'), ['admin', 'superadmin'])): ?>
                        <a href="<?= base_url('/admin/dashboard') ?>" class="block text-center py-3 rounded-xl bg-blue-50 text-blue-600 font-bold">
                            <span class="text-slate-400">Dashboard</span>
                        </a>
                    <?php endif; ?>
                    <a href="<?= base_url('/logout') ?>"
                        class="block text-center py-3 rounded-xl bg-red-50 text-red-600 font-bold"
                        onclick="return confirm('Anda yakin ingin mengakhiri sesi ini??')">
                        Logout
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </header>

    <?php if (ENVIRONMENT === 'development' && session()->get('logged_in')): ?>
        <div class="fixed bottom-4 right-4 z-[999]">
            <span class="bg-slate-900/80 backdrop-blur text-white text-[10px] px-3 py-1.5 rounded-full shadow-2xl border border-white/10">
                <i class="fa-solid fa-code mr-1 opacity-50"></i> ROLE: <?= session()->get('role') ?>
        </div>
    <?php endif; ?>

    <script>
        // 1. Deklarasi Elemen (Posisikan di paling atas)
        const profileBtn = document.getElementById('profileBtn');
        const profileMenu = document.getElementById('profileMenu');
        const chevron = document.getElementById('chevronIcon');

        const aboutBtn = document.getElementById('aboutBtn');
        const aboutMenu = document.getElementById('aboutMenu');
        const aboutChevron = document.getElementById('aboutChevron');

        // 2. Dropdown Tentang Desktop
        if (aboutBtn) {
            aboutBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                // Tutup menu profil jika terbuka
                if (profileMenu) profileMenu.classList.add('hidden');
                if (chevron) chevron.classList.remove('rotate-180');

                aboutMenu.classList.toggle('hidden');
                aboutChevron.classList.toggle('rotate-180');
            });
        }

        // 3. Dropdown Profil Desktop
        if (profileBtn) {
            profileBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                // Tutup menu tentang jika terbuka
                if (aboutMenu) aboutMenu.classList.add('hidden');
                if (aboutChevron) aboutChevron.classList.remove('rotate-180');

                profileMenu.classList.toggle('hidden');
                chevron.classList.toggle('rotate-180');
            });
        }

        // 4. Klik di Luar (Global Close)
        document.addEventListener('click', function() {
            if (aboutMenu) {
                aboutMenu.classList.add('hidden');
                aboutChevron.classList.remove('rotate-180');
            }
            if (profileMenu) {
                profileMenu.classList.add('hidden');
                chevron.classList.remove('rotate-180');
            }
        });

        // 5. Sisa Logika (Mobile & Scroll)
        function toggleMobileAbout() {
            const mobileMenu = document.getElementById('mobileAboutMenu');
            const mobileChevron = document.getElementById('mobileAboutChevron');
            mobileMenu.classList.toggle('hidden');
            mobileChevron.classList.toggle('rotate-180');
        }

        window.addEventListener('scroll', function() {
            const header = document.getElementById('mainHeader');
            if (window.scrollY > 50) {
                header.classList.add('header-active', 'backdrop-blur-md');
                header.querySelector('.max-w-7xl').classList.replace('py-4', 'py-2');
            } else {
                header.classList.remove('header-active', 'backdrop-blur-md');
                header.querySelector('.max-w-7xl').classList.replace('py-2', 'py-4');
            }
        });

        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('menu');
        const menuIcon = document.getElementById('menuIcon');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            menuIcon.classList.toggle('fa-bars');
            menuIcon.classList.toggle('fa-xmark');
        });
    </script>