<?= $this->include('board/layout/header') ?>

<div class="min-h-screen bg-[#f8f9fa] pb-20">

    <main class="p-4 md:p-8 max-w-5xl mx-auto">

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <nav class="flex items-center gap-2 text-[10px] uppercase tracking-widest text-gray-400 mb-2">
                    <a href="<?= base_url('admin/kegiatan') ?>" class="hover:text-[#ea7e13] transition-colors">Kegiatan</a>
                    <span>/</span>
                    <span class="text-gray-600">Preview Detail</span>
                </nav>
                <h1 class="text-3xl font-black text-gray-900 tracking-tighter uppercase italic">
                    Preview <span class="text-[#ea7e13]">Kegiatan</span>
                </h1>
            </div>

            <div class="flex items-center gap-3">
                <a href="<?= base_url('admin/kegiatan') ?>"
                    class="group flex items-center gap-2 px-5 py-2.5 rounded-xl bg-white border border-gray-200 text-gray-600 text-sm font-bold hover:bg-gray-50 transition-all shadow-sm">
                    <i class="fa-solid fa-arrow-left text-xs group-hover:-translate-x-1 transition-transform"></i>
                    Kembali
                </a>
                <a href="<?= base_url('admin/kegiatan/edit/' . $kegiatan['id_kegiatan']) ?>"
                    class="flex items-center gap-2 px-6 py-2.5 rounded-xl bg-gray-900 text-white text-sm font-bold hover:bg-[#ea7e13] transition-all shadow-lg shadow-gray-200">
                    <i class="fa-regular fa-pen-to-square text-xs"></i>
                    Edit Data
                </a>
            </div>
        </div>

        <article class="bg-white rounded-[2.5rem] shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden">

            <?php if (!empty($kegiatan['thumbnail'])): ?>
                <div class="relative h-[300px] md:h-[450px] w-full overflow-hidden">
                    <img src="<?= base_url('uploads/kegiatan/' . $kegiatan['thumbnail']) ?>"
                        class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

                    <div class="absolute bottom-6 left-8">
                        <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-[0.2em] shadow-lg
                            <?= $kegiatan['status'] === 'publish'
                                ? 'bg-green-500 text-white'
                                : 'bg-yellow-500 text-white' ?>">
                            <i class="fa-solid <?= $kegiatan['status'] === 'publish' ? 'fa-check-circle' : 'fa-clock' ?> mr-1"></i>
                            <?= esc($kegiatan['status']) ?>
                        </span>
                    </div>
                </div>
            <?php endif ?>

            <div class="p-8 md:p-12">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10 pb-8 border-b border-gray-100">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-orange-50 flex items-center justify-center text-[#ea7e13]">
                            <i class="fa-regular fa-calendar-days"></i>
                        </div>
                        <div>
                            <p class="text-[9px] uppercase font-bold text-gray-400 tracking-wider">Tanggal</p>
                            <p class="text-sm font-bold text-gray-800"><?= date('d F Y', strtotime($kegiatan['tanggal_kegiatan'])) ?></p>
                        </div>
                    </div>

                    <?php if (!empty($kegiatan['lokasi'])): ?>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-blue-500">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <p class="text-[9px] uppercase font-bold text-gray-400 tracking-wider">Lokasi</p>
                                <p class="text-sm font-bold text-gray-800"><?= esc($kegiatan['lokasi']) ?></p>
                            </div>
                        </div>
                    <?php endif ?>

                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center text-purple-500">
                            <i class="fa-regular fa-user"></i>
                        </div>
                        <div>
                            <p class="text-[9px] uppercase font-bold text-gray-400 tracking-wider">Penulis</p>
                            <p class="text-sm font-bold text-gray-800"><?= esc($kegiatan['nama_user'] ?? 'Admin') ?></p>
                        </div>
                    </div>
                </div>

                <div class="max-w-3xl mb-10">
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 leading-tight mb-4 uppercase italic tracking-tighter">
                        <?= esc($kegiatan['judul']) ?>
                    </h2>
                    <?php if (!empty($kegiatan['deskripsi'])): ?>
                        <p class="text-lg text-gray-500 leading-relaxed font-medium italic border-l-4 border-gray-200 pl-4">
                            "<?= esc($kegiatan['deskripsi']) ?>"
                        </p>
                    <?php endif ?>
                </div>

                <div class="prose prose-lg max-w-none prose-orange prose-img:rounded-3xl prose-headings:text-gray-900 prose-headings:font-black prose-p:text-gray-600 prose-p:leading-loose">
                    <?= $kegiatan['konten'] ?>
                </div>

            </div>
        </article>

        <div class="mt-8 text-center text-gray-400 text-xs tracking-widest uppercase">
            Terakhir diupdate: <?= date('d/m/Y H:i') ?> WIB
        </div>

    </main>
</div>

<?= $this->include('board/layout/footer') ?>