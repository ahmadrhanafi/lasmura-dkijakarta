<?= $this->include('pages/layout/header') ?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-16">

    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2 text-[10px] sm:text-xs text-gray-400 uppercase tracking-[0.15em] font-bold">
            <li>
                <a href="<?= base_url('/') ?>" class="hover:text-[#ea7e13] transition-colors">Beranda</a>
            </li>
            <li>
                <i class="fa-solid fa-chevron-right text-[8px] opacity-50"></i>
            </li>
            <li class="text-[#ea7e13]">Profil Saya</li>
        </ol>
    </nav>

    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8">
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Profil Anggota</h1>

        <div class="flex gap-3">
            <a href="<?= base_url('anggota/profil/edit') ?>"
                class="flex-1 md:flex-none inline-flex items-center justify-center gap-2 px-6 py-3 bg-white border border-gray-200 text-gray-700 font-bold rounded-2xl hover:bg-gray-50 transition-all shadow-sm">
                <i class="fa-solid fa-user-gear text-gray-400"></i>
                Edit Profil
            </a>
            <a href="<?= base_url('anggota/kta') ?>"
                class="flex-1 md:flex-none inline-flex items-center justify-center gap-2 px-6 py-3 bg-[#ea7e13] text-white font-bold rounded-2xl hover:bg-[#d66d0f] transition-all shadow-lg shadow-orange-200">
                <i class="fa-solid fa-id-card"></i>
                Cetak KTA
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-[2.5rem] border border-gray-100 p-8 text-center shadow-sm">
                <div class="relative w-32 h-32 mx-auto mb-4">
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($user['nama_lengkap']) ?>&background=ea7e13&color=fff&size=128"
                        class="rounded-full border-4 border-orange-50 shadow-inner">
                    <div class="absolute bottom-1 right-1 w-6 h-6 bg-green-500 border-4 border-white rounded-full"></div>
                </div>
                <h2 class="text-xl font-bold text-gray-900 leading-tight"><?= esc($user['nama_lengkap']) ?></h2>
                <p class="text-gray-400 text-sm mb-4 font-mono"><?= esc($user['nomor_anggota'] ?? 'Belum Ada No. Anggota') ?></p>

                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-widest bg-green-50 text-green-600 border border-green-100">
                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                    Aktif
                </span>
            </div>
        </div>

        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-[2.5rem] border border-gray-100 p-8 shadow-sm">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 bg-orange-50 text-[#ea7e13] rounded-xl flex items-center justify-center">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Keamanan & Akun</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="group">
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.15em] mb-1">Username</label>
                        <p class="text-gray-700 font-semibold leading-relaxed"><?= esc($user['username']) ?></p>
                    </div>
                    <div class="group">
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.15em] mb-1">Alamat Email</label>
                        <p class="text-gray-700 font-semibold leading-relaxed"><?= esc($user['email'] ?? '-') ?></p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] border border-gray-100 p-8 shadow-sm">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 bg-blue-50 text-blue-500 rounded-xl flex items-center justify-center">
                        <i class="fa-solid fa-address-card"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Biodata Lengkap</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-10">
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.15em] mb-1">Nomor Induk Kependudukan (NIK)</label>
                        <p class="text-gray-700 font-semibold leading-relaxed"><?= esc($user['nik'] ?? '-') ?></p>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.15em] mb-1">Jenis Kelamin</label>
                        <p class="text-gray-700 font-semibold leading-relaxed"><?= esc($user['jenis_kelamin'] ?? '-') ?></p>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.15em] mb-1">Tanggal Lahir</label>
                        <p class="text-gray-700 font-semibold leading-relaxed"><?= esc($user['tanggal_lahir'] ?? '-') ?></p>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-400 uppercase tracking-[0.15em] mb-1">Domisili / Alamat</label>
                        <p class="text-gray-700 font-semibold leading-relaxed italic"><?= esc($user['alamat'] ?? '-') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?= $this->include('pages/layout/footer') ?>