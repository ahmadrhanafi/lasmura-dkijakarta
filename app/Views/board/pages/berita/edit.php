<?= $this->include('board/layout/header') ?>

<main class="p-4 md:p-8">
    <div class="max-w-4xl mx-auto">

        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <div>
                <h1 class="text-xl font-bold text-slate-800">Edit Publikasi</h1>
                <p class="text-sm text-slate-500">Perbarui konten dan pengaturan berita</p>
            </div>
        </div>

        <!-- Alert Error -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl flex items-center gap-3">
                <i class="fa-solid fa-circle-exclamation text-sm"></i>
                <p class="text-sm font-medium"><?= session()->getFlashdata('error') ?></p>
            </div>
        <?php endif; ?>

        <!-- Form Card -->
        <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
            <form action="<?= base_url('/admin/berita/update/' . $berita['id_berita']) ?>"
                method="post"
                enctype="multipart/form-data">

                <div class="p-6 md:p-8 space-y-6">

                    <!-- Judul Berita -->
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Publikasi</label>
                        <input type="text" name="judul" required
                            value="<?= esc($berita['judul']) ?>"
                            placeholder="Masukkan judul berita..."
                            class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 outline-none transition-all">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Thumbnail & Status (Sidebar) -->
                        <div class="space-y-6">
                            <!-- Thumbnail -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Thumbnail</label>
                                <div class="bg-slate-50 border border-slate-300 rounded-lg p-4">
                                    <?php if ($berita['thumbnail']): ?>
                                        <div class="relative group mb-3">
                                            <img src="<?= base_url('uploads/berita/' . $berita['thumbnail']) ?>"
                                                class="w-full h-32 object-cover rounded-md border border-slate-200 shadow-sm">
                                            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center rounded-md">
                                                <span class="text-[10px] text-white font-bold uppercase tracking-wider">Preview Saat Ini</span>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <input type="file" name="thumbnail" accept="image/*"
                                        class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                                </div>
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Status Publikasi</label>
                                <select name="status" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 outline-none cursor-pointer">
                                    <option value="draft" <?= $berita['status'] === 'draft' ? 'selected' : '' ?>>Draft</option>
                                    <option value="publish" <?= $berita['status'] === 'publish' ? 'selected' : '' ?>>Publish</option>
                                </select>
                            </div>
                        </div>

                        <!-- Ringkasan & Konten (Main) -->
                        <div class="md:col-span-2 space-y-6">
                            <!-- Ringkasan -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Ringkasan Singkat</label>
                                <textarea name="ringkasan" rows="3"
                                    placeholder="Tulis deskripsi singkat berita..."
                                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 outline-none transition-all resize-none"><?= esc($berita['ringkasan']) ?></textarea>
                            </div>

                            <!-- Konten -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Isi Konten Berita</label>
                                <textarea name="konten" rows="12" required
                                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 outline-none transition-all"><?= esc($berita['konten']) ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons Footer -->
                <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex flex-col-reverse md:flex-row md:justify-end gap-3">
                    <a href="<?= base_url('/admin/berita') ?>"
                        class="px-6 py-2.5 text-sm font-semibold text-slate-600 bg-white border border-slate-300 rounded-lg hover:bg-slate-100 transition-colors text-center">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2.5 text-sm font-semibold text-white bg-slate-800 rounded-lg hover:bg-blue-600 shadow-sm transition-all text-center">
                        <i class="fa-solid fa-cloud-arrow-up mr-2 text-xs"></i> Perbarui Publikasi
                    </button>
                </div>

            </form>
        </div>
    </div>
</main>

<?= $this->include('board/layout/footer') ?>