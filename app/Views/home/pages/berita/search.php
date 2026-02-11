<?= $this->include('pages/layout/header') ?>

<main class="max-w-7xl mx-auto px-4 pt-8 pb-20">

    <h2 class="text-3xl font-extrabold mb-3">
        Hasil pencarian:
        <span class="text-[#ea7e13]">"<?= esc($keyword) ?>"</span>
    </h2>

    <p class="text-gray-500 mb-10">
        Ditemukan <?= count($berita) ?> berita terkait
    </p>

    <?php if (empty($berita)): ?>
        <div class="text-center py-20 text-gray-300">
            <i class="fa-regular fa-newspaper text-5xl mb-4"></i>
            <p class="text-lg font-semibold">Berita tidak ditemukan</p>
            <a href="<?= base_url('/berita') ?>"
                class="inline-block mt-6 px-6 py-3 rounded-xl bg-[#ea7e13] text-white font-bold text-sm">
                Kembali ke Berita
            </a>
        </div>
    <?php else: ?>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <?php foreach ($berita as $b): ?>
                <article class="group">
                    <div class="relative h-64 rounded-[2rem] overflow-hidden shadow-lg bg-gray-100 mb-5">
                        <img src="<?= base_url('uploads/berita/' . $b['thumbnail']) ?>"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    </div>

                    <div class="px-2">
                        <div class="flex items-center gap-3 mb-3 text-[11px] font-bold text-gray-400 uppercase">
                            <span class="text-[#ea7e13]"><?= esc($b['nama_lengkap']) ?></span>
                            <span>•</span>
                            <span><?= date('d M Y', strtotime($b['created_at'])) ?></span>
                        </div>

                        <h3 class="text-lg font-bold mb-2 line-clamp-2 group-hover:text-[#ea7e13]">
                            <a href="<?= base_url('berita/' . $b['slug']) ?>">
                                <?= highlight($b['judul'], $keyword) ?>
                            </a>
                        </h3>


                        <p class="text-gray-500 text-sm line-clamp-2">
                            <?= esc($b['ringkasan']) ?>
                        </p>
                    </div>
                </article>
            <?php endforeach ?>
        </div>

        <div class="mt-16 flex justify-center">
            <?= $pager->links('berita', 'homepage_pagination') ?>
        </div>

    <?php endif ?>

</main>

<?= $this->include('pages/layout/footer') ?>