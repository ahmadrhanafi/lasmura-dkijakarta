<?= $this->include('admin/layout/header') ?>

<div class="container mx-auto px-4 py-12 max-w-xl">
    <div class="flex items-center gap-2 text-sm text-slate-500 mb-6">
        <a href="<?= base_url('admin/struktur') ?>" class="hover:text-indigo-600 transition-colors uppercase tracking-wider font-bold text-[10px]">Struktur</a>
        <i class="fa-solid fa-chevron-right text-[8px]"></i>
        <span class="text-slate-800 font-bold uppercase tracking-wider text-[10px]">Edit Jabatan</span>
    </div>

    <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
        <div class="p-8 bg-slate-900 text-white">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center backdrop-blur-md">
                    <i class="fa-solid fa-briefcase text-xl text-indigo-300"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold">Ubah Jabatan</h2>
                    <p class="text-slate-400 text-xs">Sesuaikan detail dan posisi jabatan dalam organisasi.</p>
                </div>
            </div>
        </div>

        <div class="p-8">
            <form action="<?= base_url('admin/struktur/jabatan/update/' . $jabatan['id_jabatan']) ?>" method="post" class="space-y-6">
                
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 ml-1 flex items-center gap-2">
                        <i class="fa-solid fa-sitemap text-indigo-500 text-xs"></i>
                        Pilih Level Parent
                    </label>
                    <div class="relative group">
                        <select name="id_level" 
                            class="w-full appearance-none bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 text-slate-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all cursor-pointer font-medium"
                            required>
                            <?php foreach ($level as $l): ?>
                                <option value="<?= $l['id_level'] ?>" <?= $l['id_level'] == $jabatan['id_level'] ? 'selected' : '' ?>>
                                    <?= $l['nama_level'] ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-5 text-slate-400">
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 ml-1">Nama Jabatan</label>
                    <input type="text" name="nama_jabatan"
                        value="<?= $jabatan['nama_jabatan'] ?>"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 text-slate-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white transition-all font-medium"
                        placeholder="Contoh: Kepala Departemen IT" required>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 ml-1">Urutan (Internal Level)</label>
                    <input type="number" name="urutan"
                        value="<?= $jabatan['urutan'] ?>"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-3.5 text-slate-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white transition-all font-medium"
                        placeholder="0">
                </div>

                <div class="pt-6 border-t border-slate-50 flex items-center gap-4">
                    <button type="submit" 
                        class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-2xl shadow-lg shadow-indigo-100 transition-all active:scale-[0.97] flex items-center justify-center gap-2">
                        <i class="fa-solid fa-save text-sm"></i>
                        Update Jabatan
                    </button>
                    <a href="<?= base_url('admin/struktur') ?>" 
                        class="px-6 py-4 text-sm font-bold text-slate-400 hover:text-slate-600 transition-colors">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->include('admin/layout/footer') ?>