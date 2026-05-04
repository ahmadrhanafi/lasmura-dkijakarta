<?= $this->include('board/layout/header') ?>

<div class="min-h-screen bg-slate-50 pb-20">
    <main class="p-4 md:p-8 max-w-5xl mx-auto">

        <!-- Navigation & Actions -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
            <div>
                <?php if (isset($breadcrumb)): ?>
                    <?= $this->include('board/layout/breadcrumb') ?>
                <?php endif; ?>
                <h1 class="text-2xl font-bold text-slate-800 mt-2">Detail Kegiatan</h1>
            </div>

            <div class="flex items-center gap-3">
                <a href="<?= base_url('admin/kegiatan') ?>"
                    class="px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-slate-600 text-sm font-semibold hover:bg-slate-50 transition-all shadow-sm">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
                </a>
                <a href="<?= base_url('admin/kegiatan/edit/' . $kegiatan['id_kegiatan']) ?>"
                    class="px-5 py-2.5 rounded-xl bg-blue-600 text-white text-sm font-semibold hover:bg-blue-700 transition-all shadow-md shadow-blue-100">
                    <i class="fa-regular fa-pen-to-square mr-2"></i> Edit Kegiatan
                </a>
            </div>
        </div>

        <!-- Main Article Card -->
        <article class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">

            <!-- Featured Image -->
            <?php if (!empty($kegiatan['thumbnail'])): ?>
                <div class="relative h-[350px] md:h-[500px] w-full">
                    <img src="<?= base_url('uploads/kegiatan/' . $kegiatan['thumbnail']) ?>"
                        class="w-full h-full object-cover">
                    <!-- Status Badge -->
                    <div class="absolute top-6 right-6">
                        <span class="px-4 py-2 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-xl border
                            <?= $kegiatan['status'] === 'publish'
                                ? 'bg-emerald-500 text-white border-emerald-400'
                                : 'bg-amber-500 text-white border-amber-400' ?>">
                            <i class="fa-solid <?= $kegiatan['status'] === 'publish' ? 'fa-check-circle' : 'fa-clock' ?> mr-1.5"></i>
                            <?= esc($kegiatan['status']) ?>
                        </span>
                    </div>
                </div>
            <?php endif ?>

            <div class="p-6 md:p-12">
                <!-- Info Badges -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-12 p-6 bg-slate-50 rounded-2xl border border-slate-100">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600">
                            <i class="fa-regular fa-calendar-check"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Waktu Pelaksanaan</p>
                            <p class="text-sm font-bold text-slate-700"><?= date('d M Y', strtotime($kegiatan['tanggal_kegiatan'])) ?></p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-lg bg-rose-100 flex items-center justify-center text-rose-600">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Lokasi</p>
                            <p class="text-sm font-bold text-slate-700"><?= esc($kegiatan['lokasi'] ?: 'Lokasi belum diatur') ?></p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-lg bg-indigo-100 flex items-center justify-center text-indigo-600">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Penanggung Jawab</p>
                            <p class="text-sm font-bold text-slate-700"><?= esc($kegiatan['nama_user'] ?? 'Administrator') ?></p>
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="max-w-4xl mx-auto">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 leading-tight mb-6">
                        <?= esc($kegiatan['judul']) ?>
                    </h2>

                    <?php if (!empty($kegiatan['deskripsi'])): ?>
                        <div class="mb-10 p-5 border-l-4 border-blue-500 bg-blue-50/50 rounded-r-xl">
                            <p class="text-slate-600 leading-relaxed font-medium">
                                <?= esc($kegiatan['deskripsi']) ?>
                            </p>
                        </div>
                    <?php endif ?>

                    <div class="prose prose-slate prose-lg max-w-none 
                                prose-p:text-slate-600 prose-p:leading-relaxed 
                                prose-headings:text-slate-800 prose-headings:font-bold
                                prose-img:rounded-2xl prose-strong:text-slate-900">
                        <?= $kegiatan['konten'] ?>
                    </div>
                </div>

            </div>
        </article>

        <div class="mt-8 text-center text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em]">
            Sistem Informasi Manajemen • Terakhir diupdate: <?= date('d/m/Y H:i') ?> WIB
        </div>

    </main>
</div>

<?= $this->include('board/layout/footer') ?>