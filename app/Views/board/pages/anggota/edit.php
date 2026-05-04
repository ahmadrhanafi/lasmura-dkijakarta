<?= $this->include('board/layout/header') ?>

<main class="p-4 md:p-8">
    <div class="max-w-3xl mx-auto">

        <!-- Header Section -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-xl font-bold text-slate-800">Edit Status Anggota</h1>
                <p class="text-sm text-slate-500">Perbarui informasi akun dan status keanggotaan</p>
            </div>
            <a href="<?= base_url('admin/anggota/detail/' . $anggota['id_user']) ?>" class="gap-2 bg-red-50 text-red-600 border border-red-200 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-red-100 transition shadow-sm">
                <i class="fa-solid fa-xmark mr-1"></i> Tutup
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">
            <form method="post" action="<?= base_url('admin/anggota/update/' . $anggota['id_user']) ?>">

                <div class="p-6 md:p-8 space-y-6">

                    <!-- Section: Informasi Utama -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap</label>
                            <input type="text"
                                name="nama_lengkap"
                                value="<?= esc($anggota['nama_lengkap']) ?>"
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 outline-none transition-all text-slate-800"
                                required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Status Akun</label>
                            <select name="status"
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 outline-none cursor-pointer text-slate-800">
                                <option value="aktif" <?= $anggota['status'] == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                                <option value="nonaktif" <?= $anggota['status'] == 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">ID Anggota (Read Only)</label>
                            <input type="text"
                                value="<?= esc($anggota['nomor_anggota']) ?>"
                                class="w-full px-4 py-2.5 bg-slate-100 border border-slate-200 rounded-lg text-slate-500 cursor-not-allowed"
                                readonly>
                        </div>
                    </div>

                    <!-- Alert Info -->
                    <div class="flex gap-3 p-4 bg-amber-50 border border-amber-100 rounded-lg">
                        <i class="fa-solid fa-circle-exclamation text-amber-500 mt-1"></i>
                        <p class="text-xs text-amber-700 leading-relaxed">
                            Pastikan perubahan status sudah sesuai dengan kebijakan organisasi. Anggota dengan status <strong>Nonaktif</strong> tidak akan bisa mengakses fitur portal anggota.
                        </p>
                    </div>

                </div>

                <!-- Footer Action: Responsive -->
                <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex flex-col-reverse md:flex-row md:justify-end gap-3">
                    <a href="<?= base_url('admin/anggota/detail/' . $anggota['id_user']) ?>"
                        class="px-6 py-2.5 text-sm font-semibold text-slate-600 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 transition-colors text-center">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 shadow-sm hover:shadow transition-all">
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>
</main>

<?= $this->include('board/layout/footer') ?>