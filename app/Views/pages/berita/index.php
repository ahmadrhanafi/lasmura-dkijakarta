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
            <li class="text-[#ea7e13]">Berita</li>
        </ol>
    </nav>

    <div class="mb-10 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-tight">Berita Terkini</h2>
            <p class="text-gray-500 mt-2 text-sm md:text-base">Update informasi dan berita seputar LASMURA DKI Jakarta.</p>
            <div class="h-1.5 w-24 bg-gradient-to-r from-[#ea7e13] to-[#ec1309] mt-5 rounded-full shadow-sm"></div>
        </div>

        <form action="<?= base_url('berita/cari') ?>" method="get" class="relative w-full md:w-80 group">
            <input type="text" name="q" value="<?= esc($keyword ?? '') ?>" placeholder="Cari berita..."
                class="w-full pl-12 pr-4 py-3 bg-white border border-gray-200 rounded-2xl focus:ring-4 focus:ring-orange-500/10 focus:border-[#ea7e13] outline-none transition-all text-sm shadow-sm">
            <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
        </form>
    </div>

    <?php if ($headline): ?>
        <div class="group relative w-full h-[450px] md:h-[550px] rounded-[3rem] overflow-hidden mb-16 shadow-2xl border border-gray-100">
            <img src="<?= base_url('uploads/berita/' . $headline['thumbnail']) ?>"
                class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-1000 ease-in-out">

            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-90"></div>

            <div class="absolute bottom-0 left-0 p-8 md:p-16 w-full lg:w-3/4">
                <div class="flex items-center gap-4 mb-6">
                    <span class="bg-[#ea7e13] text-white text-[10px] font-black px-4 py-1.5 rounded-full uppercase tracking-[0.2em]">
                        Headline
                    </span>
                    <span class="text-gray-300 text-xs font-bold tracking-wider">
                        <i class="fa-regular fa-calendar-check mr-2 text-[#ea7e13]"></i>
                        <?= date('d F Y', strtotime($headline['created_at'])) ?>
                    </span>
                </div>

                <h3 class="text-2xl md:text-5xl font-black text-white mb-6 leading-tight">
                    <?= esc($headline['judul']) ?>
                </h3>

                <p class="text-gray-300 text-sm md:text-lg line-clamp-2 mb-8 opacity-80 font-medium max-w-2xl">
                    <?= esc($headline['ringkasan']) ?>
                </p>

                <a href="<?= base_url('/berita/' . $headline['slug']) ?>"
                    class="inline-flex items-center gap-3 bg-white text-black px-8 py-4 rounded-2xl font-black text-sm uppercase">
                    Baca Selengkapnya <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>
        </div>
    <?php else: ?>
        <div class="w-full h-[300px] flex items-center justify-center rounded-[2rem] bg-gray-100 border border-dashed border-gray-300 mb-16">
            <div class="text-center text-gray-500">
                <i class="fa-regular fa-newspaper text-4xl text-gray-300 mb-4 block"></i>
                <p class="font-semibold text-gray-400">Belum ada berita headline</p>
                <p class="text-sm mt-1 text-gray-400">Belum ada berita headline yang ditampilkan.</p>
            </div>
        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 md:gap-12">

        <?php if (empty($berita)): ?>
            <div class="col-span-3 flex justify-center">
                <div class="text-center text-gray-500 py-20">
                    <i class="fa-regular fa-folder-open text-4xl text-gray-300 mb-4 block"></i>
                    <p class="font-semibold text-gray-400">Belum ada berita</p>
                    <p class="text-sm mt-1 text-gray-400">Berita akan tampil setelah dipublikasikan oleh admin.</p>
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($berita as $b): ?>
                <article class="group">
                    <div class="relative h-64 rounded-[2.5rem] overflow-hidden mb-6 shadow-lg bg-gray-100">
                        <img src="<?= base_url('uploads/berita/' . $b['thumbnail']) ?>"
                            class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700">
                    </div>

                    <div class="px-2">
                        <div class="flex items-center gap-3 mb-4 text-[11px] font-bold text-gray-400 uppercase tracking-[0.15em]">
                            <span class="text-[#ea7e13]"><?= esc($b['nama_lengkap']) ?></span>
                            <span class="w-1.5 h-1.5 bg-gray-200 rounded-full"></span>
                            <span><?= date('d M Y', strtotime($b['created_at'])) ?></span>
                        </div>

                        <h4 class="text-xl font-bold text-gray-800 leading-snug line-clamp-2 mb-3">
                            <?= esc($b['judul']) ?>
                        </h4>

                        <p class="text-gray-500 text-sm line-clamp-2">
                            <?= esc($b['ringkasan']) ?>
                        </p>

                        <a href="<?= base_url('/berita/' . $b['slug']) ?>"
                            class="inline-block mt-4 text-sm font-bold text-[#ea7e13] hover:underline">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>


    <div class="mt-20 flex justify-center">
        <?= $pager->links('berita', 'homepage_pagination') ?>
    </div>

</main>

<?= $this->include('pages/layout/footer') ?>