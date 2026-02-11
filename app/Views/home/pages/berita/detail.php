<?= $this->include('home/pages/layout/header') ?>

<main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 pb-16">

    <!-- Breadcrumb -->
    <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2 text-[10px] sm:text-xs text-gray-400 uppercase tracking-[0.15em] font-bold">
            <li>
                <a href="<?= base_url('/') ?>" class="hover:text-[#ea7e13]">Beranda</a>
            </li>
            <li><i class="fa-solid fa-chevron-right text-[8px] opacity-50"></i></li>
            <li>
                <a href="<?= base_url('/berita') ?>" class="hover:text-[#ea7e13]">Kabar Terkini</a>
            </li>
            <li><i class="fa-solid fa-chevron-right text-[8px] opacity-50"></i></li>
            <li class="text-[#ea7e13] line-clamp-1"><?= esc($berita['judul']) ?></li>
        </ol>
    </nav>

    <!-- Thumbnail -->
    <?php if ($berita['thumbnail']): ?>
        <div class="relative w-full h-[320px] md:h-[420px] rounded-[2.5rem] overflow-hidden mb-10 shadow-xl">
            <img src="<?= base_url('uploads/berita/' . $berita['thumbnail']) ?>"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
        </div>
    <?php endif; ?>

    <!-- Meta -->
    <div class="flex flex-wrap items-center gap-4 mb-6 text-[11px] font-bold text-gray-400 uppercase tracking-[0.15em]">
        <span class="text-[#ea7e13]">
            <i class="fa-solid fa-user mr-2"></i><?= esc($berita['nama_lengkap']) ?>
        </span>
        <span class="w-1.5 h-1.5 bg-gray-300 rounded-full"></span>
        <span>
            <i class="fa-regular fa-calendar mr-2"></i>
            <?= date('d F Y', strtotime($berita['created_at'])) ?>
        </span>
    </div>

    <!-- Judul -->
    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 leading-tight mb-6">
        <?= esc($berita['judul']) ?>
    </h1>

    <!-- Ringkasan -->
    <?php if ($berita['ringkasan']): ?>
        <p class="text-lg text-gray-600 font-medium mb-10 border-l-4 border-[#ea7e13] pl-6">
            <?= esc($berita['ringkasan']) ?>
        </p>
    <?php endif; ?>

    <!-- Konten -->
    <article class="prose prose-lg max-w-none prose-img:rounded-xl prose-a:text-[#ea7e13]">
        <?= $berita['konten'] ?>
    </article>

    <!-- Back -->
    <div class="mt-16">
        <a href="<?= base_url('/berita') ?>"
            class="inline-flex items-center gap-3 bg-gray-100 hover:bg-[#ea7e13] hover:text-white transition-all px-6 py-3 rounded-xl font-bold text-sm">
            <i class="fa-solid fa-arrow-left"></i>
            Kembali ke Daftar Berita
        </a>
    </div>

    <?php if (!empty($related)): ?>
        <section class="mt-20">
            <h3 class="text-2xl font-extrabold text-gray-900 mb-8">
                Berita Terkait
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($related as $r): ?>
                    <article class="group">
                        <div class="relative h-48 rounded-[1.5rem] overflow-hidden mb-4 bg-gray-100 shadow">
                            <img src="<?= base_url('uploads/berita/' . $r['thumbnail']) ?>"
                                class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-700">
                        </div>

                        <div>
                            <div class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-2">
                                <?= date('d M Y', strtotime($r['created_at'])) ?>
                            </div>

                            <h4 class="font-bold text-gray-800 leading-snug line-clamp-2 group-hover:text-[#ea7e13] transition-colors">
                                <a href="<?= base_url('/berita/' . $r['slug']) ?>">
                                    <?= esc($r['judul']) ?>
                                </a>
                            </h4>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

</main>

<?= $this->include('home/pages/layout/footer') ?>