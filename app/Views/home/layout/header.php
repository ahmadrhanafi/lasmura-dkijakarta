<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <link rel="icon" type="image/x-icon" href="<?= base_url('lasmura.ico') ?>">
    <link rel="shortcut icon" href="<?= base_url('lasmura.ico') ?>" type="image/x-icon">
    <!-- <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/logo/lasmura.png') ?>"> -->
    <link rel="apple-touch-icon" href="<?= base_url('assets/logo/lasmura.png') ?>">

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

                    <div id="aboutMenu" onclick="toggleDropdown('aboutMenu')" class="hidden absolute left-0 mt-3 w-52 bg-white text-slate-700 rounded-2xl shadow-2xl border border-slate-100 overflow-hidden py-2 animate-in fade-in slide-in-from-top-2">
                        <a href="<?= base_url('/tentang-kami') ?>" class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-100 transition-colors">
                            <!-- <i class="fa-solid fa-circle-info text-slate-400 w-4"></i> -->
                            <span class="normal-case font-medium">Tentang Kami</span>
                        </a>
                        <a href="<?= base_url('/visi-misi') ?>" class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-100 transition-colors">
                            <!-- <i class="fa-solid fa-file-contract text-slate-400 w-4"></i> -->
                            <span class="normal-case font-medium">Visi & Misi</span>
                        </a>
                        <a href="<?= base_url('/struktur-organisasi') ?>" class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-100 transition-colors">
                            <!-- <i class="fa-solid fa-sitemap text-slate-400 w-4"></i> -->
                            <span class="normal-case font-medium">Struktur Organisasi</span>
                        </a>
                    </div>
                </div>

                <a href="<?= base_url('/kegiatan') ?>" class="nav-link">Aktivitas</a>

                <div class="relative group">
                    <button id="infolikBtn" class="nav-link flex items-center space-x-1 focus:outline-none uppercase tracking-wider">
                        <span class="mr-1">Informasi Publik</span>
                        <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-300 mb-1" id="infolikChevron"></i>
                    </button>

                    <div id="infolikMenu" onclick="toggleDropdown('infolikMenu')" class="hidden absolute left-0 mt-3 w-52 bg-white text-slate-700 rounded-2xl shadow-2xl border border-slate-100 overflow-hidden py-2 animate-in fade-in slide-in-from-top-2">
                        <a href="<?= base_url('/dokumen-legalitas') ?>" class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-100 transition-colors">
                            <span class="normal-case font-medium">Dokumen Legalitas</span>
                        </a>
                        <a href="<?= base_url('/laporan-kinerja') ?>" class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-100 transition-colors">
                            <span class="normal-case font-medium">Laporan Kinerja</span>
                        </a>
                        <a href="<?= base_url('/layanan-advokasi') ?>" class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-100 transition-colors">
                            <span class="normal-case font-medium">Layanan Advokasi</span>
                        </a>
                        <a href="<?= base_url('/regulasi-kebijakan') ?>" class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-100 transition-colors">
                            <span class="normal-case font-medium">Regulasi & Kebijakan</span>
                        </a>
                    </div>
                </div>

                <a href="<?= base_url('/berita') ?>" class="nav-link">Berita</a>

                <!-- <div class="relative group">
                    <button id="kegiatanBtn" class="nav-link flex items-center space-x-1 focus:outline-none uppercase tracking-wider">
                        <span class="mr-1">Kegiatan</span>
                        <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-300 mb-1" id="kegiatanChevron"></i>
                    </button>

                    <div id="kegiatanMenu" onclick="toggleDropdown('kegiatanMenu')" class="hidden absolute left-0 mt-3 w-52 bg-white text-slate-700 rounded-2xl shadow-2xl border border-slate-100 overflow-hidden py-2 animate-in fade-in slide-in-from-top-2">
                        <a href="<?= base_url('/kegiatan-unggulan') ?>" class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-100 transition-colors">
                            <span class="normal-case font-medium">Kegiatan Utama</span>
                        </a>
                        <a href="<?= base_url('/agenda-bulanan') ?>" class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-100 transition-colors">
                            <span class="normal-case font-medium">Agenda Bulanan</span>
                        </a>
                        <a href="<?= base_url('/laporan-kegiatan') ?>" class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-100 transition-colors">
                            <span class="normal-case font-medium">Laporan Kegiatan</span>
                        </a>
                    </div>
                </div> -->

                <!-- <div class="relative group">
                    <button id="mediaBtn" class="nav-link flex items-center space-x-1 focus:outline-none uppercase tracking-wider">
                        <span class="mr-1">Media</span>
                        <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-300 mb-1" id="mediaChevron"></i>
                    </button>

                    <div id="mediaMenu" onclick="toggleDropdown('mediaMenu')" class="hidden absolute left-0 mt-3 w-52 bg-white text-slate-700 rounded-2xl shadow-2xl border border-slate-100 overflow-hidden py-2 animate-in fade-in slide-in-from-top-2">
                        <a href="<?= base_url('/berita') ?>" class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-100 transition-colors">
                            <span class="normal-case font-medium">Berita Terbaru</span>
                        </a>
                        <a href="<?= base_url('/galeri-kegiatan') ?>" class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-100 transition-colors">
                            <span class="normal-case font-medium">Galeri Kegiatan</span>
                        </a>
                        <a href="<?= base_url('/pengumuman') ?>" class="flex items-center space-x-3 px-4 py-3 hover:bg-slate-100 transition-colors">
                            <span class="normal-case font-medium">Pengumuman</span>
                        </a>
                    </div>
                </div> -->

                <div class="h-6 w-[1px] bg-white/20 mx-2"></div>

                <?php if (!session()->get('logged_in')): ?>
                    <div class="flex items-center space-x-8">
                        <a href="<?= base_url('/login') ?>"
                            class="bg-white text-[#ea7e13] px-4 py-1.5 rounded shadow-md hover:bg-slate-100 active:scale-95 transition-all">
                            <i class="fa-solid fa-arrow-right-to-bracket mr-2"></i> Portal Login
                        </a>
                    </div>

                <?php elseif (session()->get('logged_in')): ?>
                    <div class="relative dropdown-wrapper">
                        <button id="profileBtn" class="flex items-center space-x-3 bg-white/10 hover:bg-white/20 px-4 py-2 rounded-[1.5rem] transition-all focus:outline-none">
                            <div class="w-7 h-7 bg-white rounded-full flex items-center justify-center text-[#ec1309] shadow-sm">
                                <i class="fa-solid fa-user text-[10px]"></i>
                            </div>
                            <span class="normal-case font-medium text-sm"><?= explode(' ', (session()->get('nama_lengkap')))[0] ?></span>
                            <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-300" id="profileChevron"></i>
                        </button>

                        <div id="profileMenu" class="hidden absolute right-0 mt-3 w-64 bg-white text-slate-700 rounded-[2rem] shadow-2xl border border-slate-100 overflow-hidden animate-in fade-in slide-in-from-top-2 normal-case">

                            <div class="p-4 bg-slate-50/80 border-b border-slate-100">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-xl bg-gradient-lasmura flex items-center justify-center text-white text-lg font-black shadow-lg shadow-orange-500/20">
                                        <?= substr(session()->get('nama_lengkap') ?? 'U', 0, 1) ?>
                                    </div>
                                    <div class="flex-1 min-w-0 text-left">
                                        <p class="text-[13px] font-bold text-slate-800 truncate leading-none mb-1"><?= session()->get('nama_lengkap') ?? 'User' ?></p>
                                        <div class="flex items-center space-x-2">
                                            <span class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Sesi Aktif:</span>
                                            <span id="session-timer-desktop" class="text-[10px] font-black text-orange-600 font-mono tracking-tighter">00:00:00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="py-2">
                                <?php if (!in_array(session()->get('role'), ['admin', 'superadmin'])): ?>
                                    <a href="<?= base_url('/anggota/profil') ?>" class="flex items-center space-x-3 px-5 py-3 hover:bg-slate-50 transition-colors group">
                                        <div class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400 group-hover:bg-orange-100 group-hover:text-orange-600 transition-all">
                                            <i class="fa-solid fa-id-badge text-xs"></i>
                                        </div>
                                        <span class="text-xs font-semibold text-slate-600">Profil Saya</span>
                                    </a>
                                    <a href="<?= base_url('/anggota/kta') ?>" class="flex items-center space-x-3 px-5 py-3 hover:bg-slate-50 transition-colors group">
                                        <div class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400 group-hover:bg-orange-100 group-hover:text-orange-600 transition-all">
                                            <i class="fa-solid fa-address-card text-xs"></i>
                                        </div>
                                        <span class="text-xs font-semibold text-slate-600">Cetak KTA</span>
                                    </a>
                                <?php endif; ?>

                                <?php if (in_array(session()->get('role'), ['admin', 'superadmin'])): ?>
                                    <a href="<?= base_url('/admin/dashboard') ?>" class="flex items-center space-x-3 px-5 py-3 hover:bg-slate-50 transition-colors group">
                                        <div class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400 group-hover:bg-orange-100 group-hover:text-orange-600 transition-all">
                                            <i class="fa-solid fa-gauge text-xs"></i>
                                        </div>
                                        <span class="text-xs font-semibold text-slate-600">Dashboard</span>
                                    </a>
                                <?php endif; ?>

                                <div class="border-t border-slate-50 my-2 px-5"></div>

                                <a href="<?= base_url('/logout') ?>" onclick="return confirm('Anda yakin ingin mengakhiri sesi?')" class="flex items-center space-x-3 px-5 py-3 text-red-500 hover:bg-red-50 transition-colors group">
                                    <div class="w-8 h-8 rounded-lg bg-red-50 flex items-center justify-center text-red-400 group-hover:bg-red-500 group-hover:text-white transition-all">
                                        <i class="fa-solid fa-power-off text-xs"></i>
                                    </div>
                                    <span class="font-bold text-xs">Logout</span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </nav>

            <button id="menu-btn" class="lg:hidden w-10 h-10 flex items-center justify-center rounded-lg bg-white/10 hover:bg-white/20 transition-all">
                <i class="fa-solid fa-bars text-md" id="menuIcon"></i>
            </button>
        </div>

    </header>

    <div id="menu" class="hidden lg:hidden fixed inset-0 z-[110] bg-white text-slate-800 transition-all duration-300 overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 bg-white">
            <div class="flex items-center space-x-3">
                <img src="<?= base_url('assets/logo/lasmura.png') ?>" class="w-8 h-8" alt="Logo">
                <span class="font-extrabold text-slate-800 tracking-tight text-sm uppercase">Menu Utama</span>
            </div>
            <button id="close-menu-btn" class="w-10 h-10 flex items-center justify-center rounded-full bg-slate-50 text-slate-500 active:scale-90 transition-all">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>

        <?php if (session()->get('logged_in')): ?>
            <div class="px-6 py-5 bg-slate-50/50 border-b border-slate-100">
                <a href="<?= base_url('/anggota/profil') ?>" class="flex items-center space-x-4 p-4 bg-white rounded-3xl shadow-sm border border-slate-200 active:scale-[0.98] transition-all">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-lasmura flex items-center justify-center text-white text-xl font-black shadow-orange-500/20 shadow-lg">
                        <?= substr(session()->get('nama_lengkap') ?? 'U', 0, 1) ?>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-slate-800 truncate"><?= session()->get('nama_lengkap') ?? 'User' ?></p>
                        <p class="text-[8px] text-slate-400 font-bold uppercase tracking-widest mb-0.5">Anggota Lasmura</p>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center">
                        <i class="fa-solid fa-chevron-right text-[10px] text-slate-400"></i>
                    </div>
                </a>
            </div>
        <?php endif; ?>

        <div class="<?= session()->get('logged_in') ? 'h-[calc(100vh-280px)]' : 'h-[calc(100vh-180px)]' ?> overflow-y-auto px-6 py-6 pb-24">
            <nav class="space-y-2">
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] ml-4 mb-4">Navigasi Utama</p>

                <a href="<?= base_url('/') ?>" class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-orange-50 transition-colors group">
                    <div class="w-10 h-10 rounded-xl bg-orange-100 flex items-center justify-center text-orange-600 group-hover:bg-[#ea7e13] group-hover:text-white transition-all">
                        <i class="fa-solid fa-house text-sm"></i>
                    </div>
                    <span class="font-bold text-slate-700 text-sm uppercase">Beranda</span>
                </a>

                <div class="space-y-1">
                    <button onclick="toggleMobileAbout()" class="w-full flex items-center justify-between p-4 rounded-2xl hover:bg-orange-50 transition-all group">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 rounded-xl bg-orange-100 flex items-center justify-center text-orange-600 group-hover:bg-[#ea7e13] group-hover:text-white transition-all">
                                <i class="fa-solid fa-user-tie text-sm"></i>
                            </div>
                            <span class="font-bold text-slate-700 text-sm uppercase">Profil Organisasi</span>
                        </div>
                        <i class="fa-solid fa-chevron-down text-[10px] text-slate-400 transition-transform duration-300" id="mobileAboutChevron"></i>
                    </button>
                    <div id="mobileAboutMenu" class="hidden ml-14 space-y-1 pr-4 border-l-2 border-orange-50">
                        <a href="<?= base_url('/tentang-kami') ?>" class="block p-3 text-sm text-slate-500 hover:text-[#ea7e13] font-medium">Tentang Kami</a>
                        <a href="<?= base_url('/visi-misi') ?>" class="block p-3 text-sm text-slate-500 hover:text-[#ea7e13] font-medium">Visi & Misi</a>
                        <a href="<?= base_url('/struktur-organisasi') ?>" class="block p-3 text-sm text-slate-500 hover:text-[#ea7e13] font-medium">Struktur Organisasi</a>
                    </div>
                </div>

                <a href="<?= base_url('/kegiatan') ?>" class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-orange-50 transition-colors group">
                    <div class="w-10 h-10 rounded-xl bg-orange-100 flex items-center justify-center text-orange-600 group-hover:bg-[#ea7e13] group-hover:text-white transition-all">
                        <i class="fa-solid fa-calendar-check text-sm"></i>
                    </div>
                    <span class="font-bold text-slate-700 text-sm uppercase">Kegiatan Lasmura</span>
                </a>

                <div class="space-y-1">
                    <button onclick="toggleMobileinfolik()" class="w-full flex items-center justify-between p-4 rounded-2xl hover:bg-orange-50 transition-all group">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 rounded-xl bg-orange-100 flex items-center justify-center text-orange-600 group-hover:bg-[#ea7e13] group-hover:text-white transition-all">
                                <i class="fa-solid fa-circle-info text-sm"></i>
                            </div>
                            <span class="font-bold text-slate-700 text-sm uppercase">Informasi Publik</span>
                        </div>
                        <i class="fa-solid fa-chevron-down text-[10px] text-slate-400 transition-transform duration-300" id="mobileinfolikChevron"></i>
                    </button>
                    <div id="mobileinfolikMenu" class="hidden ml-14 space-y-1 pr-4 border-l-2 border-orange-50">
                        <a href="<?= base_url('/tentang-kami') ?>" class="block p-3 text-sm text-slate-500 hover:text-[#ea7e13] font-medium">Anggota Terdaftar</a>
                        <a href="<?= base_url('/struktur-organisasi') ?>" class="block p-3 text-sm text-slate-500 hover:text-[#ea7e13] font-medium">Alur Pendaftaran</a>
                        <a href="<?= base_url('') ?>" class="block p-3 text-sm text-slate-500 hover:text-[#ea7e13] font-medium font-bold">Mendaftar Anggota</a>
                    </div>
                </div>

                <a href="<?= base_url('/berita') ?>" class="flex items-center space-x-4 p-4 rounded-2xl hover:bg-orange-50 transition-colors group">
                    <div class="w-10 h-10 rounded-xl bg-orange-100 flex items-center justify-center text-orange-600 group-hover:bg-[#ea7e13] group-hover:text-white transition-all">
                        <i class="fa-solid fa-newspaper text-sm"></i>
                    </div>
                    <span class="font-bold text-slate-700 text-sm uppercase">Berita Organisasi</span>
                </a>
            </nav>
        </div>

        <div class="absolute bottom-0 left-0 w-full p-6 bg-white/80 backdrop-blur-md border-t border-slate-100 shadow-[0_-10px_30px_rgba(0,0,0,0.05)]">
            <?php if (!session()->get('logged_in')): ?>
                <div class="grid grid-cols-2 gap-4">
                    <a href="<?= base_url('/login') ?>" class="flex items-center justify-center py-4 rounded-2xl border border-slate-200 text-slate-600 font-bold text-xs uppercase tracking-widest active:scale-95 transition-all">Login</a>
                    <a href="<?= base_url('/daftar') ?>" class="flex items-center justify-center py-4 rounded-2xl bg-gradient-lasmura text-white font-bold text-xs uppercase tracking-widest shadow-lg shadow-orange-500/20 active:scale-95 transition-all">Daftar</a>
                </div>
            <?php else: ?>
                <div class="flex items-center justify-between">
                    <div class="flex flex-col">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">Sesi Aktif</p>
                        <p id="session-timer" class="text-[11px] font-black text-orange-600 font-mono tracking-tighter">00:00:00</p>
                    </div>
                    <a href="<?= base_url('/logout') ?>" onclick="return confirm('Anda yakin ingin mengakhiri sesi?')" class="flex items-center space-x-2 px-4 py-2 rounded-xl bg-red-50 text-red-600 font-bold text-xs active:scale-95 transition-all">
                        <i class="fa-solid fa-power-off text-[10px]"></i>
                        <span>LOGOUT</span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if (ENVIRONMENT === 'development' && session()->get('logged_in')): ?>
        <div class="fixed bottom-4 right-4 z-[999]">
            <span class="bg-slate-900/80 backdrop-blur text-white text-[10px] px-3 py-1.5 rounded-full shadow-2xl border border-white/10">
                <i class="fa-solid fa-code mr-1 opacity-50"></i> ROLE: <?= session()->get('role') ?>
        </div>
    <?php endif; ?>

    <script>
        // 1. VARIABEL UTAMA
        const menuBtn = document.getElementById('menu-btn');
        const closeBtn = document.getElementById('close-menu-btn');
        const mobileMenu = document.getElementById('menu');

        // 2. LOGIKA DROPDOWN DESKTOP (LAPTOP)
        // Kita pake event delegation biar nggak ribet pasang onclick satu-satu
        document.addEventListener('click', function(e) {
            // Toggle About Menu
            if (e.target.closest('#aboutBtn')) {
                document.getElementById('aboutMenu').classList.toggle('hidden');
                document.getElementById('infolikMenu').classList.add('hidden');
                if (document.getElementById('profileMenu')) document.getElementById('profileMenu').classList.add('hidden');
            }
            // Toggle Infolik Menu
            else if (e.target.closest('#infolikBtn')) {
                document.getElementById('infolikMenu').classList.toggle('hidden');
                document.getElementById('aboutMenu').classList.add('hidden');
                if (document.getElementById('profileMenu')) document.getElementById('profileMenu').classList.add('hidden');
            }
            // Toggle Profile Menu
            else if (e.target.closest('#profileBtn')) {
                document.getElementById('profileMenu').classList.toggle('hidden');
                document.getElementById('aboutMenu').classList.add('hidden');
                document.getElementById('infolikMenu').classList.add('hidden');
            }
            // Klik di mana saja selain tombol di atas, tutup semua dropdown desktop
            else {
                const menus = ['aboutMenu', 'infolikMenu', 'profileMenu'];
                menus.forEach(id => {
                    const el = document.getElementById(id);
                    if (el && !e.target.closest(`#${id}`)) el.classList.add('hidden');
                });
            }
        });

        // 3. FUNGSI BUKA/TUTUP MENU MOBILE
        if (menuBtn) {
            menuBtn.addEventListener('click', () => {
                mobileMenu.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
                document.body.style.overflow = 'auto';
            });
        }

        // 4. LOGIKA DROPDOWN DI DALAM MOBILE MENU
        function toggleMobileMenu(menuId, chevronId) {
            const menus = ['mobileAboutMenu', 'mobileinfolikMenu'];
            const chevrons = ['mobileAboutChevron', 'mobileinfolikChevron'];

            menus.forEach((id, index) => {
                const el = document.getElementById(id);
                const chev = document.getElementById(chevrons[index]);
                if (id === menuId) {
                    el.classList.toggle('hidden');
                    if (chev) chev.classList.toggle('rotate-180');
                } else {
                    el.classList.add('hidden');
                    if (chev) chev.classList.remove('rotate-180');
                }
            });
        }

        function toggleMobileAbout() {
            toggleMobileMenu('mobileAboutMenu', 'mobileAboutChevron');
        }

        function toggleMobileinfolik() {
            toggleMobileMenu('mobileinfolikMenu', 'mobileinfolikChevron');
        }

        // 5. EFEK SCROLL HEADER
        window.addEventListener('scroll', function() {
            const header = document.getElementById('mainHeader');
            if (header) {
                if (window.scrollY > 50) {
                    header.classList.add('header-active', 'backdrop-blur-md');
                } else {
                    header.classList.remove('header-active', 'backdrop-blur-md');
                }
            }
        });

        // 6. TIMER SESI AKTIF
        function startSessionTimer() {
            const loginTime = parseInt("<?= session()->get('login_at') ?? time() ?>");

            const timerMobile = document.getElementById('session-timer');
            const timerDesktop = document.getElementById('session-timer-desktop');

            console.log("Timer Init - Mobile:", !!timerMobile, "Desktop:", !!timerDesktop);

            if (!timerMobile && !timerDesktop) return;

            setInterval(() => {
                const now = Math.floor(Date.now() / 1000);
                const diff = now - loginTime;

                const secondsElapsed = diff < 0 ? 0 : diff;

                const hours = Math.floor(secondsElapsed / 3600);
                const minutes = Math.floor((secondsElapsed % 3600) / 60);
                const seconds = secondsElapsed % 60;

                const timeStr = [
                    hours.toString().padStart(2, '0'),
                    minutes.toString().padStart(2, '0'),
                    seconds.toString().padStart(2, '0')
                ].join(':');

                if (timerMobile) timerMobile.textContent = timeStr;
                if (timerDesktop) timerDesktop.textContent = timeStr;
            }, 1000);
        }

        document.addEventListener('DOMContentLoaded', startSessionTimer);
    </script>