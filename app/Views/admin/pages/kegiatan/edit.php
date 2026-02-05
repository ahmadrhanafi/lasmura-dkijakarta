<?= $this->include('admin/layout/header') ?>

<div class="min-h-screen bg-[#f8f9fa] pb-20">
    <main class="p-4 md:p-8 max-w-5xl mx-auto">

        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-black text-gray-900 tracking-tighter uppercase italic">
                    Edit <span class="text-[#ea7e13]">Kegiatan</span>
                </h1>
                <p class="text-sm text-gray-500 font-medium">Perbarui informasi detail kegiatan organisasi</p>
            </div>
            <a href="<?= base_url('admin/kegiatan') ?>"
                class="hidden md:flex items-center gap-2 text-sm font-bold text-gray-400 hover:text-gray-600 transition-colors">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke List
            </a>
        </div>

        <form action="<?= base_url('admin/kegiatan/update/' . $kegiatan['id_kegiatan']) ?>"
            method="post" enctype="multipart/form-data"
            class="space-y-6">

            <?= csrf_field() ?>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-8">
                        <div class="space-y-6">
                            <div>
                                <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Judul Kegiatan</label>
                                <input type="text" name="judul" required
                                    value="<?= esc($kegiatan['judul']) ?>"
                                    class="w-full px-5 py-3.5 rounded-2xl border-gray-100 bg-gray-50 focus:bg-white focus:ring-[#ea7e13] focus:border-[#ea7e13] transition-all font-bold text-gray-800"
                                    placeholder="Masukkan judul kegiatan...">
                            </div>

                            <div>
                                <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Deskripsi Singkat</label>
                                <textarea name="deskripsi" rows="2"
                                    class="w-full px-5 py-3.5 rounded-2xl border-gray-100 bg-gray-50 focus:bg-white focus:ring-[#ea7e13] focus:border-[#ea7e13] transition-all text-gray-700 leading-relaxed"
                                    placeholder="Ringkasan singkat kegiatan..."><?= esc($kegiatan['deskripsi']) ?></textarea>
                            </div>

                            <div>
                                <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-2">Konten Lengkap</label>
                                <textarea name="konten" rows="18"
                                    class="w-full px-5 py-3.5 rounded-2xl border-gray-100 bg-gray-50 focus:bg-white focus:ring-[#ea7e13] focus:border-[#ea7e13] transition-all text-gray-700"
                                    placeholder="Tuliskan detail kegiatan di sini..."><?= esc($kegiatan['konten']) ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">

                    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-6">
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-4">Pengaturan Publikasi</label>

                        <div class="space-y-4">
                            <div>
                                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter">Status</label>
                                <select name="status" class="w-full mt-1 px-4 py-3 rounded-xl border-gray-100 bg-gray-50 font-bold text-gray-700 focus:ring-[#ea7e13]">
                                    <option value="draft" <?= $kegiatan['status'] === 'draft' ? 'selected' : '' ?>>📁 Draft</option>
                                    <option value="publish" <?= $kegiatan['status'] === 'publish' ? 'selected' : '' ?>>🚀 Publish</option>
                                </select>
                            </div>

                            <div>
                                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter">Tanggal Kegiatan</label>
                                <input type="date" name="tanggal_kegiatan"
                                    value="<?= $kegiatan['tanggal_kegiatan'] ?>"
                                    class="w-full mt-1 px-4 py-3 rounded-xl border-gray-100 bg-gray-50 font-bold text-gray-700 focus:ring-[#ea7e13]">
                            </div>

                            <div>
                                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter">Lokasi</label>
                                <div class="relative">
                                    <i class="fa-solid fa-location-dot absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 text-xs"></i>
                                    <input type="text" name="lokasi"
                                        value="<?= esc($kegiatan['lokasi']) ?>"
                                        class="w-full mt-1 pl-10 pr-4 py-3 rounded-xl border-gray-100 bg-gray-50 font-bold text-gray-700 focus:ring-[#ea7e13]"
                                        placeholder="Lokasi acara...">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="w-full mt-6 bg-[#ea7e13] text-white py-4 rounded-2xl font-black uppercase tracking-widest text-xs shadow-lg shadow-orange-100 hover:bg-orange-600 transition-all active:scale-95">
                            Update Data
                        </button>
                    </div>

                    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-6">
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-4">Thumbnail</label>

                        <div class="space-y-4">
                            <?php if ($kegiatan['thumbnail']): ?>
                                <div class="relative group rounded-2xl overflow-hidden border border-gray-100 shadow-inner bg-gray-50">
                                    <img src="<?= base_url('uploads/kegiatan/' . $kegiatan['thumbnail']) ?>"
                                        class="w-full h-40 object-cover opacity-80 group-hover:opacity-100 transition-opacity">
                                    <div class="absolute inset-0 flex items-center justify-center bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <span class="text-white text-[10px] font-bold uppercase tracking-widest">Gambar Saat Ini</span>
                                    </div>
                                </div>
                            <?php endif ?>

                            <div class="relative">
                                <input type="file" name="thumbnail" id="thumbnail" class="hidden">
                                <label for="thumbnail" class="flex flex-col items-center justify-center w-full p-4 border-2 border-dashed border-gray-200 rounded-2xl cursor-pointer hover:bg-gray-50 transition-colors">
                                    <i class="fa-solid fa-cloud-arrow-up text-gray-300 text-xl mb-2"></i>
                                    <span class="text-[10px] font-bold text-gray-500 uppercase">Ganti Gambar</span>
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="md:hidden text-center pt-4">
                <a href="<?= base_url('admin/kegiatan') ?>" class="text-xs font-bold text-gray-400 uppercase tracking-widest">
                    ← Kembali ke List
                </a>
            </div>

        </form>
    </main>
</div>

<?= $this->include('admin/layout/footer') ?>