<?= $this->include('home/pages/layout/header') ?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-16">

    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2 text-[10px] sm:text-xs text-gray-400 uppercase tracking-[0.15em] font-bold">
            <li>
                <a href="<?= base_url('/') ?>" class="hover:text-[#ea7e13] transition-colors">Beranda</a>
            </li>
            <li>
                <i class="fa-solid fa-chevron-right text-[8px] opacity-50"></i>
            </li>
            <li class="text-[#ea7e13]">Aktivitas</li>
        </ol>
    </nav>

    <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">Aktivitas & Kegiatan</h2>
            <p class="text-gray-500 mt-2 text-sm md:text-base">Update aktivitas dan kegiatan LASMURA DKI Jakarta.</p>
            <div class="h-1.5 w-24 bg-gradient-to-r from-[#ea7e13] to-[#ec1309] mt-5 rounded-full shadow-sm"></div>
        </div>

        <!-- <form action="<?= base_url('kegiatan/cari') ?>" method="get" class="relative w-full md:w-80 group">
            <input type="text" name="q" value="<?= esc($keyword ?? '') ?>" placeholder="Cari kegiatan..."
                class="w-full pl-12 pr-4 py-3 bg-white border border-gray-200 rounded-2xl focus:ring-4 focus:ring-orange-500/10 focus:border-[#ea7e13] outline-none transition-all text-sm shadow-sm">
            <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
        </form> -->
    </div>

    <div class="grid md:grid-cols-3 gap-10">
        <?php if (!empty($kegiatan)): ?>
            <?php foreach ($kegiatan as $k): ?>
                <article>
                    <img src="<?= base_url('uploads/kegiatan/' . $k['thumbnail']) ?>"
                        class="h-56 w-full object-cover rounded-xl mb-4">

                    <span class="text-xs text-orange-600 font-bold">
                        <?= date('d M Y', strtotime($k['tanggal_kegiatan'])) ?>
                    </span>

                    <h3 class="font-bold text-lg mt-2">
                        <a href="<?= base_url('kegiatan/' . $k['slug']) ?>">
                            <?= esc($k['judul']) ?>
                        </a>
                    </h3>

                    <p class="text-gray-500 text-sm mt-2 line-clamp-2">
                        <?= esc($k['deskripsi']) ?>
                    </p>
                </article>
            <?php endforeach ?>
        <?php else: ?>
            <div class="col-span-3 text-center py-16">
                <i class="fa-solid fa-calendar-xmark text-gray-300 text-6xl mb-4"></i>
                <h3 class="text-xl font-bold text-gray-900">Belum ada kegiatan yang tersedia.</h3>
                <p class="text-gray-500 mt-2">Kegiatan akan muncul di sini ketika sudah ditambahkan oleh admin.</p>
            </div>
        <?php endif ?>
    </div>

    <div class="mt-16 flex justify-center">
        <?= $pager->links('kegiatan', 'homepage_pagination') ?>
    </div>
</main>

<?= $this->include('home/pages/layout/footer') ?>