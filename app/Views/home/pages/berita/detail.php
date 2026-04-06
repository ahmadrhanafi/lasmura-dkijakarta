<?= $this->include('home/pages/layout/header') ?>

<main class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-6">

        <header class="max-w-4xl mb-12">
            <div class="flex items-center gap-3 mb-6">
                <span class="w-12 h-[2px] bg-[#ea7e13]"></span>
                <span class="text-[11px] font-black uppercase tracking-[0.3em] text-[#ea7e13]">Isi Berita</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-black text-slate-900 leading-[1.1] tracking-tighter mb-8">
                <?= esc($berita['judul']) ?>
            </h1>

            <div class="flex flex-wrap items-center gap-6 text-sm text-slate-500 font-medium">
                <div class="flex items-center gap-2">
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($berita['nama_lengkap']) ?>&background=0D0D0D&color=fff" class="w-6 h-6 rounded-full">
                    <span class="text-slate-900 font-bold"><?= esc($berita['nama_lengkap']) ?></span>
                </div>
                <time class="bg-slate-200 px-3 py-2 rounded">
                    <i class="fa-regular fa-calendar mr-2"></i>
                    <?= date('d M Y', strtotime($berita['created_at'])) ?>
                </time>
            </div>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">

            <div class="lg:col-span-8">
                <?php if ($berita['thumbnail']): ?>
                    <div class="relative mb-12 group">
                        <div class="absolute -inset-4 bg-slate-100 rounded-[3rem] -z-10 scale-95 group-hover:scale-100 transition-transform duration-700"></div>
                        <img src="<?= base_url('uploads/berita/' . $berita['thumbnail']) ?>"
                            class="w-full aspect-[16/10] object-cover rounded-[2.5rem] shadow-2xl transition-all duration-700">
                    </div>
                <?php endif; ?>

                <?php if ($berita['ringkasan']): ?>
                    <div class="mb-12">
                        <p class="text-2xl font-bold text-slate-800 leading-relaxed tracking-tight">
                            <?= esc($berita['ringkasan']) ?>
                        </p>
                    </div>
                <?php endif; ?>

                <article class="prose prose-slate prose-xl max-w-none 
                    prose-p:text-slate-600 prose-p:leading-[1.9] prose-p:text-justify
                    prose-headings:text-slate-900 prose-headings:font-black
                    prose-strong:text-slate-900 prose-blockquote:border-[#ea7e13]
                    prose-img:rounded-3xl prose-a:text-[#ea7e13] font-serif-reading">
                    <?= $berita['konten'] ?>
                </article>

                <div class="mt-16 p-8 bg-slate-50 rounded-[2rem] flex flex-col md:flex-row items-center justify-between gap-6 border border-slate-100">
                    <h4 class="font-black text-slate-900 uppercase text-xs tracking-widest">Bagikan Berita Ini:</h4>
                    <div class="flex items-center gap-3">
                        <a href="#" class="w-12 h-12 rounded-2xl bg-white flex items-center justify-center shadow-sm hover:bg-green-500 hover:text-white transition-all"><i class="fa-brands fa-whatsapp"></i></a>
                        <a href="#" class="w-12 h-12 rounded-2xl bg-white flex items-center justify-center shadow-sm hover:bg-black hover:text-white transition-all"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="#" class="w-12 h-12 rounded-2xl bg-white flex items-center justify-center shadow-sm hover:bg-blue-600 hover:text-white transition-all"><i class="fa-brands fa-facebook-f"></i></a>
                    </div>
                </div>
            </div>

            <aside class="lg:col-span-4">
                <div class="sticky top-32 space-y-12">

                    <div class="p-8 rounded-[2.5rem] border-2 border-slate-900 relative overflow-hidden group">
                        <div class="relative z-10">
                            <h3 class="text-xl font-black text-slate-900 mb-4">Langkah Perubahan Dimulai Dari Sini.</h3>
                            <p class="text-sm text-slate-500 mb-6 leading-relaxed">Jadilah bagian dari barisan pemuda yang bergerak nyata untuk Jakarta.</p>
                            <a href="<?= base_url('/daftar') ?>" class="inline-flex items-center gap-2 bg-[#ea7e13] text-white px-6 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-black transition-colors">
                                Bergabung Sekarang <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                        <i class="fa-solid fa-hand-fist absolute -bottom-6 -right-6 text-slate-100 text-8xl group-hover:text-orange-50 transition-colors"></i>
                    </div>

                    <?php if (!empty($related)): ?>
                        <div>
                            <h4 class="text-xs font-black uppercase tracking-[0.2em] text-slate-400 mb-8 flex items-center gap-4">
                                Baca Lainnya <span class="h-px flex-1 bg-slate-100"></span>
                            </h4>
                            <div class="space-y-8">
                                <?php foreach (array_slice($related, 0, 3) as $r): ?>
                                    <a href="<?= base_url('/berita/' . $r['slug']) ?>" class="group block">
                                        <div class="flex gap-4">
                                            <div class="w-20 h-20 rounded-2xl overflow-hidden flex-shrink-0 bg-slate-100">
                                                <img src="<?= base_url('uploads/berita/' . $r['thumbnail']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                            </div>
                                            <div class="flex flex-col justify-center">
                                                <span class="text-[9px] font-black text-[#ea7e13] uppercase mb-1"><?= date('d M Y', strtotime($r['created_at'])) ?></span>
                                                <h5 class="text-sm font-bold text-slate-800 leading-tight group-hover:underline decoration-2 underline-offset-4 decoration-[#ea7e13]">
                                                    <?= esc($r['judul']) ?>
                                                </h5>
                                                <div class="flex items-center gap-2 mt-3">
                                                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($berita['nama_lengkap']) ?>&background=0D0D0D&color=fff" class="w-4 h-4 rounded-full">
                                                    <span class="text-slate-800 text-[10px]"><?= esc($berita['nama_lengkap']) ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </aside>

        </div>
    </div>
</main>

<?= $this->include('home/pages/layout/footer') ?>