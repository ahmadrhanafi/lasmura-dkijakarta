<?= $this->include('home/layout/header') ?>

<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-slate-900">
    <div class="absolute inset-0 z-0">
        <img src="<?= base_url('assets/wallpaper/wall.png') ?>"
            class="w-full h-full object-cover opacity-50" alt="Background">
        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-transparent to-slate-900/90"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 pt-20 pb-20 text-center relative z-10">

        <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 tracking-tight leading-[1.1]">
            Muda, Cerdas, <br>
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-orange-400 to-red-500">
                Berintegritas
            </span>
        </h1>

        <p class="text-sm md:text-xl text-gray-300 mb-10 max-w-2xl mx-auto leading-relaxed">
            Bergabunglah bersama Laskar Muda Hanura DKI Jakarta. Wadah perjuangan pemuda untuk membawa perubahan nyata melalui hati nurani.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?= base_url('/daftar') ?>"
                class="bg-gradient-lasmura text-white 
              px-3 py-3 text-sm        /* Ukuran Mobile */
              sm:px-8 sm:py-4 sm:text-lg /* Ukuran Desktop (sm ke atas) */
              rounded-full font-bold shadow-2xl shadow-orange-600/20 hover:scale-105 transition-all duration-300 text-center">
                Gabung Sekarang
            </a>

            <a href="<?= base_url('/tentang') ?>"
                class="bg-white/10 backdrop-blur-md border border-white/20 text-white 
              px-3 py-3 text-sm        /* Ukuran Mobile */
              sm:px-8 sm:py-4 sm:text-lg /* Ukuran Desktop (sm ke atas) */
              rounded-full font-bold hover:bg-white/20 transition-all text-center">
                Pelajari Selanjutnya
            </a>
        </div>
    </div>

    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 text-white/50 animate-bounce">
        <i class="fa-solid fa-chevron-down text-xl"></i>
    </div>
</section>

<section id="tentang" class="py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row items-center gap-16">
            <div class="md:w-1/2">
                <div class="inline-block px-4 py-1.5 mb-4 rounded-full bg-orange-100 text-[#ea7e13] font-bold text-xs uppercase tracking-widest">
                    Tentang Kami
                </div>
                <h2 class="text-2xl md:text-4xl font-bold text-gray-900 mb-6 leading-snug">
                    Gerakan Pemuda Pelopor <br> <span class="text-[#ec1309]">Hati Nurani Rakyat</span>
                </h2>
                <p class="text-gray-600 leading-relaxed text-md mb-6 text-justify">
                    Laskar Muda Hanura (LASMURA) merupakan organisasi sayap pemuda Partai Hanura
                    yang berperan strategis dalam kaderisasi dan pengembangan kepemimpinan generasi muda.
                </p>
                <p class="text-gray-600 leading-relaxed text-md text-justify">
                    Kami hadir di DKI Jakarta sebagai garda terdepan untuk menghimpun potensi kaum muda,
                    membekali mereka dengan integritas, serta mempersiapkan pemimpin yang responsif terhadap dinamika sosial politik.
                </p>
            </div>
            <div class="md:w-1/2 relative">
                <div class="bg-gradient-to-tr from-gray-200 to-gray-100 h-80 w-full rounded-3xl shadow-inner flex items-center justify-center border-4 border-white overflow-hidden">
                    <i class="fa-solid fa-users text-gray-300 text-8xl"></i>
                </div>
                <div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-2xl shadow-2xl hidden md:block">
                    <div class="text-[#ec1309] font-bold text-2xl tracking-tighter">100+</div>
                    <div class="text-gray-400 text-xs uppercase font-bold tracking-widest">Anggota Aktif</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Visi & Misi Strategis</h2>
            <div class="h-1.5 w-24 bg-gradient-to-r from-[#ea7e13] to-[#ec1309] mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group">
                <div class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center text-[#ea7e13] mb-6 group-hover:bg-[#ea7e13] group-hover:text-white transition-colors">
                    <i class="fa-solid fa-shield-halved text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Integritas Tinggi</h3>
                <p class="text-gray-500 leading-relaxed">Membangun karakter kader muda yang jujur, disiplin, dan setia pada nilai-nilai Hati Nurani Rakyat.</p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group">
                <div class="w-14 h-14 bg-red-50 rounded-2xl flex items-center justify-center text-[#ec1309] mb-6 group-hover:bg-[#ec1309] group-hover:text-white transition-colors">
                    <i class="fa-solid fa-bolt text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Partisipasi Politik</h3>
                <p class="text-gray-500 leading-relaxed">Meningkatkan kesadaran dan partisipasi aktif generasi muda dalam menentukan arah kebijakan politik nasional.</p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 group">
                <div class="w-14 h-14 bg-gray-50 rounded-2xl flex items-center justify-center text-gray-700 mb-6 group-hover:bg-gray-800 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-flag text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Garda Terdepan</h3>
                <p class="text-gray-500 leading-relaxed">Menjadi pilar utama perjuangan Partai Hanura dalam memenangkan aspirasi rakyat di wilayah DKI Jakarta.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-16 bg-gradient-lasmura">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="space-y-2">
                <div class="text-4xl md:text-5xl font-extrabold text-white">5+</div>
                <div class="text-white/80 text-xs md:text-sm uppercase tracking-widest font-medium">Wilayah Kerja</div>
            </div>
            <div class="space-y-2">
                <div class="text-4xl md:text-5xl font-extrabold text-white">100+</div>
                <div class="text-white/80 text-xs md:text-sm uppercase tracking-widest font-medium">Anggota Aktif</div>
            </div>
            <div class="space-y-2">
                <div class="text-4xl md:text-5xl font-extrabold text-white">50+</div>
                <div class="text-white/80 text-xs md:text-sm uppercase tracking-widest font-medium">Program Kerja</div>
            </div>
            <div class="space-y-2">
                <div class="text-4xl md:text-5xl font-extrabold text-white">10+</div>
                <div class="text-white/80 text-xs md:text-sm uppercase tracking-widest font-medium">Aksi Sosial</div>
            </div>
        </div>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
            <div class="max-w-xl">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Kegiatan Utama</h2>
                <p class="text-gray-500">Ikuti berbagai agenda dan aksi nyata Laskar Muda Hanura dalam membangun Jakarta.</p>
            </div>
            <a href="<?= base_url('/kegiatan') ?>" class="text-[#ea7e13] font-bold flex items-center gap-2 hover:gap-4 transition-all">
                Lihat Semua Kegiatan <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (!empty($kegiatan)): ?>
                <?php foreach ($kegiatan as $item): ?>
                    <div class="relative group overflow-hidden rounded-3xl h-80 shadow-lg">
                        <img src="<?= base_url('uploads/kegiatan/' . $item['thumbnail']) ?>"
                            class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                            alt="<?= esc($item['judul']) ?>">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>

                        <div class="absolute bottom-0 p-8 w-full">
                            <div class="mb-3">
                                <span class="bg-white/20 backdrop-blur-md text-white text-[10px] px-3 py-1 rounded-full border border-white/30 uppercase tracking-widest font-semibold">
                                    <i class="fa-regular fa-calendar-check mr-1"></i>
                                    <?= date('d M Y', strtotime($item['tanggal_kegiatan'])) ?>
                                </span>
                            </div>

                            <h4 class="text-xl font-bold text-white mb-2 leading-tight">
                                <a href="<?= base_url('kegiatan/' . $item['slug']) ?>" class="hover:text-[#ea7e13] transition-colors">
                                    <?= esc($item['judul']) ?>
                                </a>
                            </h4>

                            <p class="text-white/70 text-sm line-clamp-2">
                                <?= esc($item['deskripsi']) ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full py-10 text-center text-gray-400">
                    <p>Belum ada kegiatan saat ini.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="py-20 bg-white border-y border-slate-100">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-12">
            <h2 class="text-sm uppercase tracking-[0.2em] font-bold text-slate-400 mb-2">Partners</h2>
            <div class="h-1 w-12 bg-[#ea7e13] mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-8 md:gap-12 items-center justify-items-center opacity-60">

            <div class="group">
                <img src="<?= base_url('assets/partners/hanura.png') ?>"
                    alt="Logo Hanura"
                    class="h-12 md:h-16 w-auto grayscale group-hover:grayscale-0 transition-all duration-500 transform group-hover:scale-110">
            </div>

            <div class="group">
                <img src="<?= base_url('assets/partners/logo-pemprov.png') ?>"
                    alt="Logo Pemprov DKI"
                    class="h-12 md:h-16 w-auto grayscale group-hover:grayscale-0 transition-all duration-500 transform group-hover:scale-110">
            </div>

            <div class="group">
                <img src="<?= base_url('assets/partners/knpi.png') ?>"
                    alt="Logo KNPI"
                    class="h-12 md:h-16 w-auto grayscale group-hover:grayscale-0 transition-all duration-500 transform group-hover:scale-110">
            </div>

            <div class="group">
                <img src="<?= base_url('assets/partners/kpu.png') ?>"
                    alt="Logo KPU"
                    class="h-12 md:h-16 w-auto grayscale group-hover:grayscale-0 transition-all duration-500 transform group-hover:scale-110">
            </div>

            <div class="group">
                <img src="<?= base_url('assets/partners/bawaslu.png') ?>"
                    alt="Logo Bawaslu"
                    class="h-12 md:h-16 w-auto grayscale group-hover:grayscale-0 transition-all duration-500 transform group-hover:scale-110">
            </div>

        </div>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between mb-12">
            <h2 class="text-3xl font-bold text-slate-900">Berita Terbaru</h2>
            <a href="<?= base_url('/berita') ?>" class="text-[#ea7e13] font-bold flex items-center gap-2 hover:gap-4 transition-all">
                Lihat Semua Berita <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <?php foreach ($berita as $item): ?>
                <a href="<?= base_url('berita/' . $item['slug']) ?>" class="group flex gap-6 items-center">
                    <div class="flex-shrink-0 w-32 h-32 md:w-40 md:h-40 rounded-2xl overflow-hidden">
                        <img src="<?= base_url('uploads/berita/' . $item['thumbnail']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                    </div>
                    <div>
                        <span class="text-slate-500 text-[10px] font-bold bg-slate-200 px-4 py-1 rounded text-center uppercase tracking-widest"><?= date('d M Y', strtotime($item['created_at'])) ?></span>
                        <h3 class="text-md md:text-lg font-bold text-slate-800 group-hover:text-[#ea7e13] transition-colors line-clamp-2 mt-1">
                            <?= esc($item['judul']) ?>
                        </h3>
                        <p class="text-slate-500 text-sm mt-2 line-clamp-2 hidden md:block">
                            <?= strip_tags($item['ringkasan'] ?? $item['konten']) ?>
                        </p>

                        <div class="flex items-center gap-3 mt-5">
                            <div class="w-8 h-8 rounded-full bg-[#ea7e13]/10 flex items-center justify-center text-[#ea7e13]">
                                <i class="fa-solid fa-user text-[10px]"></i>
                            </div>
                            <span class="text-xs font-bold text-slate-700"><?= esc($item['nama_lengkap'] ?? 'Admin') ?></span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-20">
    <div class="max-w-5xl mx-auto px-6">
        <div class="bg-slate-900 rounded-[3rem] p-12 text-center relative overflow-hidden shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-[#ea7e13] opacity-10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-[#ec1309] opacity-10 rounded-full -ml-32 -mb-32"></div>

            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6 relative z-10">Siap Menjadi Bagian dari Perubahan?</h2>
            <p class="text-gray-400 mb-10 max-w-lg mx-auto relative z-10 text-lg">Jakarta membutuhkan anak muda yang berani bergerak dengan hati nurani. Mari bergabung!</p>
            <div class="relative z-10">
                <a href="<?= base_url('/daftar') ?>" class="bg-gradient-lasmura text-white px-10 py-4 rounded-full font-bold text-lg hover:shadow-orange-500/40 hover:shadow-2xl transition-all inline-block">
                    Daftar Sebagai Kader
                </a>
            </div>
        </div>
    </div>
</section>

<?= $this->include('home/layout/footer') ?>