<?= $this->include('board/layout/header') ?>

<main class="p-4 md:p-8 space-y-8 bg-[#f8fafc] min-h-screen">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Dashboard Overview</h1>
            <p class="text-gray-500 text-sm">Ringkasan data LASMURA DKI Jakarta hari ini.</p>
        </div>
        <div class="flex items-center space-x-2 bg-white px-4 py-2 rounded-lg shadow-sm border border-gray-100">
            <span class="relative flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
            </span>
            <span class="text-sm font-medium text-gray-700">Sistem Online</span>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="relative overflow-hidden bg-white p-6 rounded-2xl border border-gray-100 shadow-sm group">
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Anggota Aktif</p>
                    <h3 class="text-4xl font-black text-gray-800 mt-2"><?= number_format($stats['total_anggota']) ?></h3>
                </div>
                <div class="h-14 w-14 flex items-center justify-center bg-red-50 text-red-600 rounded-2xl group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-id-card text-2xl"></i>
                </div>
            </div>
            <p class="mt-4 text-xs text-gray-500">Total pengguna dengan role anggota</p>
            <div class="absolute -right-4 -bottom-4 text-gray-50 opacity-[0.03] rotate-12">
                <i class="fa-solid fa-id-card text-8xl"></i>
            </div>
        </div>

        <div class="relative overflow-hidden bg-white p-6 rounded-2xl border border-gray-100 shadow-sm group">
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Pendaftar Baru</p>
                    <h3 class="text-4xl font-black text-gray-800 mt-2"><?= number_format($stats['total_pendaftar']) ?></h3>
                </div>
                <div class="h-14 w-14 flex items-center justify-center bg-amber-50 text-amber-600 rounded-2xl group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-user-clock text-2xl"></i>
                </div>
            </div>
            <p class="mt-4 text-xs text-amber-600 font-medium italic">Menunggu verifikasi admin</p>
            <div class="absolute -right-4 -bottom-4 text-gray-50 opacity-[0.03] rotate-12">
                <i class="fa-solid fa-user-clock text-8xl"></i>
            </div>
        </div>

        <div class="relative overflow-hidden bg-white p-6 rounded-2xl border border-gray-100 shadow-sm group">
            <div class="flex items-center justify-between relative z-10">
                <div>
                    <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Berita Terbit</p>
                    <h3 class="text-4xl font-black text-gray-800 mt-2"><?= number_format($stats['total_berita']) ?></h3>
                </div>
                <div class="h-14 w-14 flex items-center justify-center bg-blue-50 text-blue-600 rounded-2xl group-hover:scale-110 transition-transform duration-300">
                    <i class="fa-solid fa-globe text-2xl"></i>
                </div>
            </div>
            <p class="mt-4 text-xs text-gray-500">Artikel tayang di portal publik</p>
            <div class="absolute -right-4 -bottom-4 text-gray-50 opacity-[0.03] rotate-12">
                <i class="fa-solid fa-globe text-8xl"></i>
            </div>
        </div>

    </div>

    <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm flex flex-col md:flex-row items-center gap-8">
        <div class="hidden md:block w-48 text-red-600">
            <i class="fa-solid fa-shield-halved text-7xl opacity-20"></i>
        </div>
        <div>
            <h2 class="text-xl font-bold text-gray-800 mb-3">Manajemen Kontrol Sistem</h2>
            <p class="text-gray-600 text-sm leading-relaxed mb-6">
                Dashboard ini menampilkan data real-time berdasarkan aktivitas database. Pastikan untuk secara rutin memeriksa <span class="text-amber-600 font-bold underline">Pendaftar Baru</span> untuk menjaga aliran data anggota tetap mutakhir. Setiap berita yang Anda terbitkan akan langsung berdampak pada statistik di atas.
            </p>
            <div class="flex gap-3">
                <a href="<?= base_url('admin/pendaftaran') ?>" class="px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white text-xs font-bold rounded-xl transition-all shadow-lg shadow-red-200 uppercase tracking-widest">
                    Proses Pendaftaran
                </a>
            </div>
        </div>
    </div>

</main>

<?= $this->include('board/layout/footer') ?>