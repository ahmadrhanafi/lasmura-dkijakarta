<?= $this->include('board/layout/header') ?>

<main class="p-4 md:p-8 space-y-6">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Buat Berita Baru</h1>
            <p class="text-sm text-gray-500 mt-1">Publikasikan artikel dan berita organisasi Anda.</p>
        </div>
        <a href="<?= base_url('admin/berita') ?>"
            class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-red-700 transition-colors">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>
    </div>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-lg shadow-sm animate-pulse">
            <div class="flex items-center">
                <i class="fa-solid fa-circle-exclamation mr-3"></i>
                <span class="text-sm font-medium"><?= session()->getFlashdata('error') ?></span>
            </div>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/berita/simpan') ?>"
        method="post"
        enctype="multipart/form-data"
        class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Kiri: Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <div class="space-y-4">
                    <!-- Judul -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Berita</label>
                        <input type="text" name="judul" required autofocus
                            placeholder="Masukkan judul berita yang menarik..."
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-4 focus:ring-red-50 focus:border-red-700 transition-all outline-none">
                    </div>

                    <!-- Ringkasan -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Ringkasan Singkat</label>
                        <textarea name="ringkasan" rows="3"
                            placeholder="Tuliskan sedikit cuplikan isi berita..."
                            class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-4 focus:ring-red-50 focus:border-red-700 transition-all outline-none resize-none"></textarea>
                    </div>

                    <!-- Konten -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Isi Konten Berita</label>
                        <textarea id="editor" name="konten"
                            class="w-full px-6 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#ea7e13]/20 focus:border-[#ea7e13] transition-all text-gray-700 outline-none">
                                </textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kanan: Sidebar Settings -->
        <div class="space-y-6">
            <!-- Thumbnail Card -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="block text-sm font-semibold text-gray-700 mb-2">Pengaturan Publikasi</h3>

                <div class="space-y-4">
                    <!-- Status -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 mb-2">Status</label>
                        <select name="status"
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg focus:ring-2 focus:ring-red-500 outline-none appearance-none cursor-pointer">
                            <option value="draft">Draft</option>
                            <option value="publish">Publish</option>
                        </select>
                    </div>

                    <!-- File Upload -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 mb-2">Thumbnail Gambar</label>
                        <div class="relative group border-2 border-dashed border-gray-200 hover:border-red-400 rounded-xl p-4 transition-all text-center">
                            <input type="file" name="thumbnail" accept="image/*"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                            <div class="space-y-2">
                                <i class="fa-solid fa-cloud-arrow-up text-3xl text-gray-300 group-hover:text-red-500 transition-colors"></i>
                                <div class="text-xs text-gray-600">
                                    <span class="font-bold text-red-600">Klik untuk upload</span> atau seret file
                                </div>
                                <p class="text-[10px] text-gray-400 uppercase font-medium">JPG, PNG (Max 2MB)</p>
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-100">

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-red-700 hover:bg-red-800 text-white font-bold py-3 rounded-xl shadow-lg shadow-red-100 transition-all active:scale-[0.98] flex items-center justify-center gap-2">
                        Simpan Berita
                    </button>
                </div>
            </div>

            <!-- Info Card -->
            <div class="bg-blue-50 p-4 rounded-xl border border-blue-100">
                <div class="flex gap-3">
                    <i class="fa-solid fa-lightbulb text-blue-500 mt-1"></i>
                    <p class="text-xs text-blue-700 leading-relaxed">
                        Pastikan judul berita mengandung kata kunci yang relevan agar mudah dicari oleh pembaca.
                    </p>
                </div>
            </div>
        </div>
    </form>
</main>

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<script>
    // Inisialisasi Rich Text Editor
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>

<style>
    .ck-editor__editable {
        min-height: 300px;
        border-bottom-left-radius: 1.5rem !important;
        border-bottom-right-radius: 1.5rem !important;
        background-color: #f9fafb !important;
        border: none !important;
    }

    .ck-toolbar {
        border-top-left-radius: 1.5rem !important;
        border-top-right-radius: 1.5rem !important;
        background-color: #f9fafb !important;
        border: none !important;
        border-bottom: 1px solid #f3f4f6 !important;
    }

    .ck-focused {
        background-color: white !important;
        outline: none !important;
    }
</style>

<?= $this->include('board/layout/footer') ?>