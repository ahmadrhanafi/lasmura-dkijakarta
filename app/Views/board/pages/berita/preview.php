<?= $this->include('board/layout/header') ?>

<main class="p-4 md:p-8">
    <div class="max-w-4xl mx-auto">

        <!-- Navigation & Actions -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="text-xl font-bold text-slate-800 mt-2">Detail Publikasi</h1>
            </div>

            <div class="flex items-center gap-3">
                <a href="<?= base_url('/admin/berita') ?>"
                    class="px-4 py-2 text-sm font-medium text-slate-600 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 transition-colors">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
                </a>
                <a href="<?= base_url('/admin/berita/export-pdf/' . $berita['slug']) ?>"
                    class="px-4 py-2 text-sm font-medium text-white bg-rose-600 rounded-lg hover:bg-rose-700 shadow-sm transition-all">
                    <i class="fa-solid fa-file-pdf mr-2"></i> Export PDF
                </a>
            </div>
        </div>

        <!-- Article Card -->
        <article class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

            <!-- Thumbnail Section -->
            <?php if ($berita['thumbnail']): ?>
                <div class="w-full h-[300px] md:h-[450px] overflow-hidden">
                    <img src="<?= base_url('uploads/berita/' . $berita['thumbnail']) ?>"
                        class="w-full h-full object-cover"
                        alt="<?= esc($berita['judul']) ?>">
                </div>
            <?php endif; ?>

            <div class="p-6 md:p-12">
                <!-- Meta Info -->
                <div class="flex items-center gap-3 text-slate-500 mb-6">
                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 font-bold text-xs border border-slate-200">
                        <?= substr($berita['nama_lengkap'], 0, 1) ?>
                    </div>
                    <div class="text-xs">
                        <p class="font-bold text-slate-700"><?= esc($berita['nama_lengkap']) ?></p>
                        <p><?= date('d F Y', strtotime($berita['created_at'])) ?> • <span class="text-blue-600">Administrator</span></p>
                    </div>
                </div>

                <!-- Title -->
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 leading-tight mb-8">
                    <?= esc($berita['judul']) ?>
                </h2>

                <!-- Content Area -->
                <div class="prose prose-slate max-w-none 
                            prose-headings:font-bold prose-headings:text-slate-800 
                            prose-p:text-slate-600 prose-p:leading-relaxed prose-p:text-lg
                            prose-img:rounded-xl prose-strong:text-slate-800">
                    <?= $berita['konten'] ?>
                </div>
            </div>

            <!-- Footer Article -->
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Dokumen Resmi Organisasi</span>
                <div class="flex gap-2">
                    <span class="w-2 h-2 rounded-full bg-slate-200"></span>
                    <span class="w-2 h-2 rounded-full bg-slate-200"></span>
                    <span class="w-2 h-2 rounded-full bg-slate-200"></span>
                </div>
            </div>
        </article>

    </div>
</main>

<?= $this->include('board/layout/footer') ?>