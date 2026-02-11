<?= $this->include('board/layout/header') ?>

<div class="container mx-auto px-4 py-12">
    <nav class="flex items-center gap-2 text-sm text-slate-500 mb-6 max-w-lg mx-auto">
        <a href="<?= base_url('admin/struktur') ?>" class="hover:text-indigo-600 transition-colors flex items-center gap-1">
            <i class="fa-solid fa-house-chimney text-[10px]"></i> Struktur
        </a>
        <i class="fa-solid fa-chevron-right text-[10px] opacity-50"></i>
        <span class="text-slate-800 font-semibold">Edit Level</span>
    </nav>

    <div class="max-w-lg mx-auto bg-white rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-100 overflow-hidden">

        <div class="px-8 py-6 bg-gradient-to-r from-slate-50 to-white border-b border-slate-100">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center shadow-inner">
                    <i class="fa-solid fa-layer-group"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-slate-800">Ubah Level</h2>
                    <p class="text-xs text-slate-500">Sesuaikan nama dan urutan hierarki level.</p>
                </div>
            </div>
        </div>

        <div class="p-8">
            <form action="<?= base_url('admin/struktur/level/update/' . $level['id_level']) ?>" method="post" class="space-y-6">

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 ml-1">Nama Level</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-indigo-500 transition-colors">
                            <i class="fa-solid fa-tag text-xs"></i>
                        </div>
                        <input type="text" name="nama_level"
                            value="<?= $level['nama_level'] ?>"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl pl-10 pr-4 py-3 text-slate-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white transition-all font-medium"
                            placeholder="Contoh: Top Management" required>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-slate-700 ml-1">Nomor Urut</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-indigo-500 transition-colors">
                            <i class="fa-solid fa-arrow-down-1-9 text-xs"></i>
                        </div>
                        <input type="number" name="urutan"
                            value="<?= $level['urutan'] ?>"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl pl-10 pr-4 py-3 text-slate-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 focus:bg-white transition-all font-medium"
                            placeholder="Masukkan angka">
                    </div>
                    <p class="text-[10px] text-slate-400 ml-1 italic">* Angka lebih kecil akan tampil lebih atas.</p>
                </div>

                <div class="pt-4 flex flex-col gap-3">
                    <button type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3.5 rounded-2xl shadow-lg shadow-indigo-200 transition-all active:scale-[0.98] flex items-center justify-center gap-2">
                        <i class="fa-solid fa-check-to-slot text-sm"></i>
                        Perbarui Level
                    </button>

                    <a href="<?= base_url('admin/struktur') ?>"
                        class="w-full py-3 text-center text-sm font-semibold text-slate-500 hover:text-slate-800 transition-colors">
                        Kembali ke Dashboard
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->include('board/layout/footer') ?>