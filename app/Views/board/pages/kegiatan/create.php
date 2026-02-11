<?= $this->include('board/layout/header') ?>

<div class="min-h-screen bg-[#f8f9fa] pb-20">
    <main class="p-4 md:p-8 max-w-6xl mx-auto">

        <div class="mb-10">
            <nav class="flex items-center gap-2 text-[10px] uppercase tracking-widest text-gray-400 mb-2">
                <a href="<?= base_url('admin/kegiatan') ?>" class="hover:text-[#ea7e13]">Kegiatan</a>
                <span>/</span>
                <span class="text-gray-600 font-bold">Tambah Baru</span>
            </nav>
            <h1 class="text-3xl font-black text-gray-900 tracking-tighter uppercase italic">
                Buat <span class="text-[#ea7e13]">Kegiatan Baru</span>
            </h1>
            <p class="text-sm text-gray-500">Lengkapi formulir di bawah untuk mempublikasikan kegiatan organisasi.</p>
        </div>

        <form action="<?= base_url('admin/kegiatan/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 p-8 md:p-10">
                        <div class="space-y-8">

                            <div class="group">
                                <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-3 group-focus-within:text-[#ea7e13] transition-colors">Judul Kegiatan</label>
                                <input type="text" name="judul" required
                                    class="w-full px-6 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#ea7e13]/20 focus:border-[#ea7e13] transition-all font-bold text-gray-800 placeholder:font-normal"
                                    placeholder="Contoh: Musyawarah Daerah DPD Lasmura DKI Jakarta">
                            </div>

                            <div>
                                <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-3">Deskripsi Singkat</label>
                                <textarea name="deskripsi" rows="3"
                                    class="w-full px-6 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#ea7e13]/20 focus:border-[#ea7e13] transition-all text-gray-700 leading-relaxed"
                                    placeholder="Tuliskan ringkasan satu atau dua kalimat..."></textarea>
                            </div>

                            <div>
                                <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-3">Konten Lengkap</label>
                                <textarea name="konten" rows="16"
                                    class="w-full px-6 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#ea7e13]/20 focus:border-[#ea7e13] transition-all text-gray-700"
                                    placeholder="Tuliskan detail lengkap kegiatan di sini..."></textarea>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="space-y-6">

                    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-6">
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-6">Penerbitan</label>

                        <div class="space-y-5">
                            <div>
                                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter ml-1">Status Publikasi</label>
                                <select name="status" class="w-full mt-1.5 px-4 py-3.5 rounded-xl border-gray-100 bg-gray-50 font-bold text-gray-700 focus:ring-[#ea7e13]">
                                    <option value="draft">Draft</option>
                                    <option value="publish">Publish</option>
                                </select>
                            </div>

                            <button type="submit" class="w-full bg-[#ea7e13] text-white py-4 rounded-2xl font-black uppercase tracking-widest text-xs shadow-lg shadow-orange-200 hover:bg-orange-600 hover:-translate-y-1 transition-all active:scale-95">
                                Simpan Kegiatan
                            </button>

                            <a href="<?= base_url('admin/kegiatan') ?>" class="block text-center text-xs font-bold text-gray-400 hover:text-gray-600 transition-colors uppercase tracking-widest">
                                Batal & Kembali
                            </a>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-6">
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-6">Detail Acara</label>

                        <div class="space-y-5">
                            <div>
                                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter ml-1">Tanggal Kegiatan</label>
                                <input type="date" name="tanggal_kegiatan" required
                                    class="w-full mt-1.5 px-4 py-3.5 rounded-xl border-gray-100 bg-gray-50 font-bold text-gray-700 focus:ring-[#ea7e13]">
                            </div>

                            <div>
                                <label class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter ml-1">Lokasi</label>
                                <div class="relative">
                                    <i class="fa-solid fa-location-dot absolute left-4 top-1/2 -translate-y-1/2 text-gray-300 text-xs"></i>
                                    <input type="text" name="lokasi"
                                        class="w-full mt-1.5 pl-10 pr-4 py-3.5 rounded-xl border-gray-100 bg-gray-50 font-bold text-gray-700 focus:ring-[#ea7e13]"
                                        placeholder="Gedung/Kota...">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2rem] shadow-sm border border-gray-100 p-6">
                        <label class="block text-xs font-black uppercase tracking-widest text-gray-400 mb-4">Gambar Sampul</label>

                        <div class="relative group">
                            <input type="file" name="thumbnail" id="thumbnail" class="hidden" accept="image/*">
                            <label for="thumbnail" class="flex flex-col items-center justify-center w-full aspect-video border-2 border-dashed border-gray-100 rounded-3xl cursor-pointer bg-gray-50 hover:bg-orange-50 hover:border-[#ea7e13]/30 transition-all">
                                <div class="w-12 h-12 rounded-full bg-white shadow-sm flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                    <i class="fa-solid fa-image text-[#ea7e13]"></i>
                                </div>
                                <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Klik untuk Upload</span>
                                <span class="text-[8px] text-gray-300 mt-1 uppercase">Format: JPG, PNG (Max 2MB)</span>
                            </label>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </main>
</div>

<?= $this->include('board/layout/footer') ?>