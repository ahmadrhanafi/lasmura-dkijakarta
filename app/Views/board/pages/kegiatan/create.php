<?= $this->include('board/layout/header') ?>

<div class="min-h-screen bg-[#f8f9fa] pb-20">
    <main class="p-4 md:p-8 max-w-6xl mx-auto">

        <!-- Breadcrumb & Title -->
        <div class="mb-10">
            <h1 class="text-2xl font-bold text-gray-800">Buat Kegiatan Baru</h1>
            <p class="text-sm text-gray-500 mt-1">Publikasikan agenda dan dokumentasi kegiatan organisasi Anda.</p>
        </div>

        <form action="<?= base_url('admin/kegiatan/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Main Content (Left) -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 md:p-10">
                        <div class="space-y-8">

                            <!-- Judul -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Judul Kegiatan</label>
                                <input type="text" name="judul" required
                                    class="w-full px-6 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#ea7e13]/20 focus:border-[#ea7e13] transition-all font-bold text-gray-800 placeholder:font-normal outline-none"
                                    placeholder="Masukkan judul kegiatan yang menarik...">
                            </div>

                            <!-- Deskripsi Singkat -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Singkat (Ringkasan)</label>
                                <textarea name="deskripsi" rows="3"
                                    class="w-full px-6 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#ea7e13]/20 focus:border-[#ea7e13] transition-all text-gray-700 leading-relaxed outline-none"
                                    placeholder="Gambarkan kegiatan ini dalam 1-2 kalimat singkat..."></textarea>
                            </div>

                            <!-- Konten Lengkap -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Isi Konten Kegiatan</label>
                                <textarea id="editor" name="konten"
                                    class="w-full px-6 py-4 rounded-2xl border-gray-100 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#ea7e13]/20 focus:border-[#ea7e13] transition-all text-gray-700 outline-none">
                                </textarea>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Sidebar (Right) -->
                <div class="space-y-6">

                    <!-- Publishing Card -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Penerbitan</label>

                        <div class="space-y-5">
                            <div>
                                <label class="text-[12px] font-bold text-gray-400 ml-1">Status Publikasi</label>
                                <select name="status" class="w-full mt-1.5 px-4 py-3.5 rounded-xl border-gray-100 bg-gray-50 font-bold text-gray-700 focus:ring-2 focus:ring-[#ea7e13]/20 focus:border-[#ea7e13] outline-none cursor-pointer">
                                    <option value="draft">Draft</option>
                                    <option value="publish">Publish</option>
                                </select>
                            </div>

                            <button type="submit" class="w-full bg-[#ea7e13] text-white py-4 rounded-2xl font-black text-ml shadow-lg shadow-orange-100 hover:bg-orange-600 hover:-translate-y-1 transition-all active:scale-95">
                                Simpan Kegiatan
                            </button>

                            <a href="<?= base_url('admin/kegiatan') ?>" class="block text-center text-[15px] font-bold text-gray-400 hover:text-red-500 transition-colors">
                                Batalkan Perubahan
                            </a>
                        </div>
                    </div>

                    <!-- Event Details Card -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Informasi Acara</label>

                        <div class="space-y-5">
                            <div>
                                <label class="text-[12px] font-bold text-gray-400 ml-1">Tanggal Pelaksanaan</label>
                                <input type="date" name="tanggal_kegiatan" required
                                    class="w-full mt-1.5 px-4 py-3.5 rounded-xl border-gray-100 bg-gray-50 font-bold text-gray-700 focus:ring-2 focus:ring-[#ea7e13]/20 outline-none">
                            </div>

                            <div>
                                <label class="text-[12px] font-bold text-gray-400 ml-1">Lokasi Kegiatan</label>
                                <div class="relative mt-1.5">
                                    <i class="fa-solid fa-location-dot absolute left-4 top-1/2 -translate-y-1/2 text-[#ea7e13] text-xs"></i>
                                    <input type="text" name="lokasi"
                                        class="w-full pl-10 pr-4 py-3.5 rounded-xl border-gray-100 bg-gray-50 font-bold text-gray-700 text-sm focus:ring-2 focus:ring-[#ea7e13]/20 outline-none transition-all placeholder:font-normal placeholder:text-gray-400"
                                        placeholder="Nama gedung atau kota...">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Image Upload Card -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar Utama</label>

                        <div class="relative group">
                            <input type="file" name="thumbnail" id="thumbnail" class="hidden" accept="image/*">
                            <label for="thumbnail" id="imagePreview" class="relative flex flex-col items-center justify-center w-full aspect-video border-2 border-dashed border-gray-100 rounded-3xl cursor-pointer bg-gray-50 hover:bg-orange-50 hover:border-[#ea7e13]/30 transition-all overflow-hidden">
                                <div id="uploadPlaceholder" class="flex flex-col items-center">
                                    <div class="w-12 h-12 rounded-full bg-white shadow-sm flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                        <i class="fa-solid fa-cloud-arrow-up text-[#ea7e13]"></i>
                                    </div>
                                    <span class="text-[12px] font-black text-gray-400 ">Pilih Gambar</span>
                                </div>
                            </label>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </main>
</div>

<!-- Scripts untuk Konsistensi & Fitur -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<script>
    // Inisialisasi Rich Text Editor
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

    // Preview Gambar Saat Upload
    const thumbnailInput = document.getElementById('thumbnail');
    const imagePreview = document.getElementById('imagePreview');
    const uploadPlaceholder = document.getElementById('uploadPlaceholder');

    thumbnailInput.onchange = evt => {
        const [file] = thumbnailInput.files;
        if (file) {
            uploadPlaceholder.style.display = 'none';
            let img = imagePreview.querySelector('img');
            if (!img) {
                img = document.createElement('img');
                img.className = 'absolute inset-0 w-full h-full object-cover';
                imagePreview.appendChild(img);
            }
            img.src = URL.createObjectURL(file);
        }
    }
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