<?= $this->include('board/layout/header') ?>

<div class="min-h-screen bg-slate-50 pb-20">
    <main class="p-4 md:p-8 max-w-6xl mx-auto">

        <!-- Header Section -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Edit Kegiatan</h1>
                <p class="text-sm text-slate-500">Perbarui informasi detail dan status publikasi kegiatan</p>
            </div>
            <a href="<?= base_url('admin/kegiatan') ?>"
                class="hidden md:flex items-center gap-2 text-sm font-semibold text-slate-400 hover:text-slate-700 transition-colors">
                <i class="fa-solid fa-arrow-left text-xs"></i> Kembali ke Daftar
            </a>
        </div>

        <form action="<?= base_url('admin/kegiatan/update/' . $kegiatan['id_kegiatan']) ?>"
            method="post" enctype="multipart/form-data"
            class="space-y-6">

            <?= csrf_field() ?>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Left Column: Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 md:p-8">
                        <div class="space-y-6">
                            <!-- Input Judul -->
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Judul Kegiatan</label>
                                <input type="text" name="judul" required
                                    value="<?= esc($kegiatan['judul']) ?>"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-blue-500/10 focus:border-blue-500 transition-all font-semibold text-slate-800"
                                    placeholder="Masukkan judul kegiatan...">
                            </div>

                            <!-- Input Deskripsi -->
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Ringkasan Singkat</label>
                                <textarea name="deskripsi" rows="2"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-blue-500/10 focus:border-blue-500 transition-all text-slate-700 leading-relaxed resize-none"
                                    placeholder="Tulis ringkasan singkat kegiatan..."><?= esc($kegiatan['deskripsi']) ?></textarea>
                            </div>

                            <!-- Input Konten -->
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Isi Konten Lengkap</label>
                                <textarea name="konten" rows="15"
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-blue-500/10 focus:border-blue-500 transition-all text-slate-700"
                                    placeholder="Tuliskan detail kegiatan di sini..."><?= esc($kegiatan['konten']) ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Settings & Media -->
                <div class="space-y-6">

                    <!-- Media Box -->
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                        <h3 class="text-sm font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-image text-indigo-500"></i> Media Utama
                        </h3>

                        <div class="space-y-4">
                            <?php if ($kegiatan['thumbnail']): ?>
                                <div class="relative group rounded-xl overflow-hidden border border-slate-100 shadow-inner bg-slate-50">
                                    <img src="<?= base_url('uploads/kegiatan/' . $kegiatan['thumbnail']) ?>"
                                        class="w-full h-32 object-cover opacity-90 group-hover:opacity-100 transition-opacity">
                                    <div class="absolute inset-0 flex items-center justify-center bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <span class="text-white text-[9px] font-bold uppercase tracking-widest">Ganti Thumbnail</span>
                                    </div>
                                </div>
                            <?php endif ?>

                            <div class="relative">
                                <input type="file" name="thumbnail" id="thumbnail" class="hidden">
                                <label for="thumbnail" class="flex flex-col items-center justify-center w-full py-4 border-2 border-dashed border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 transition-colors text-slate-400 hover:text-slate-600 hover:border-blue-400">
                                    <i class="fa-solid fa-camera text-lg mb-1"></i>
                                    <span class="text-[9px] font-bold uppercase tracking-wider">Pilih File Baru</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Publication Box -->
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                        <h3 class="text-sm font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-sliders text-blue-500"></i> Pengaturan
                        </h3>

                        <div class="space-y-4">
                            <div>
                                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Status Publikasi</label>
                                <select name="status" class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-200 bg-slate-50 font-semibold text-slate-700 focus:ring-2 focus:ring-blue-500/10 focus:border-blue-500">
                                    <option value="draft" <?= $kegiatan['status'] === 'draft' ? 'selected' : '' ?>>Draft</option>
                                    <option value="publish" <?= $kegiatan['status'] === 'publish' ? 'selected' : '' ?>>Publish</option>
                                </select>
                            </div>

                            <div>
                                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Tanggal Pelaksanaan</label>
                                <input type="date" name="tanggal_kegiatan"
                                    value="<?= $kegiatan['tanggal_kegiatan'] ?>"
                                    class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-200 bg-slate-50 font-semibold text-slate-700">
                            </div>

                            <div>
                                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Lokasi Acara</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </span>
                                    <input type="text" name="lokasi"
                                        value="<?= esc($kegiatan['lokasi']) ?>"
                                        class="w-full mt-1 pl-10 pr-4 py-2.5 rounded-lg border border-slate-200 bg-slate-50 font-semibold text-slate-700 shadow-sm"
                                        placeholder="Nama tempat/lokasi...">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="w-full mt-6 bg-blue-600 text-white py-3 rounded-xl font-bold text-[12px] shadow-lg shadow-blue-100 hover:bg-blue-700 transition-all active:scale-[0.98]">
                            <i class="fa-solid fa-save mr-2"></i> Update Data
                        </button>
                    </div>

                </div>
            </div>

            <!-- Mobile Only Back Button -->
            <div class="md:hidden text-center pt-4">
                <a href="<?= base_url('admin/kegiatan') ?>" class="text-xs font-bold text-slate-400 uppercase tracking-widest hover:text-slate-600">
                    ← Kembali ke List
                </a>
            </div>

        </form>
    </main>
</div>

<?= $this->include('board/layout/footer') ?>