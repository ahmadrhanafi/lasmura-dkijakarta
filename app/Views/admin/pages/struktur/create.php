<?= $this->include('admin/layout/header') ?>

<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <a href="<?= base_url('admin/struktur') ?>" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium flex items-center gap-1 mb-2">
            <i class="fa-solid fa-arrow-left text-xs"></i> Kembali ke Daftar
        </a>
        <h1 class="text-2xl font-bold text-slate-800">Tambah Anggota Baru</h1>
    </div>

    <div class="max-w-2xl bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-8">
            <form action="<?= base_url('admin/struktur/anggota/simpan') ?>" method="post" class="space-y-6">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="level" class="block text-sm font-semibold text-slate-700">Hierarki Level</label>
                        <div class="relative">
                            <select id="level" 
                                class="w-full appearance-none bg-slate-50 border border-slate-200 text-slate-700 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all cursor-pointer"
                                required>
                                <option value="">-- Pilih Level --</option>
                                <?php foreach ($level as $l): ?>
                                    <option value="<?= $l['id_level'] ?>"><?= $l['nama_level'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="jabatan" class="block text-sm font-semibold text-slate-700">Jabatan</label>
                        <div class="relative">
                            <select name="id_jabatan" id="jabatan" 
                                class="w-full appearance-none bg-slate-50 border border-slate-200 text-slate-700 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all cursor-pointer"
                                required>
                                <option value="">-- Pilih Jabatan --</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="border-slate-100">

                <div class="space-y-4">
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-slate-700">Nama Lengkap</label>
                        <input type="text" name="nama" 
                            class="w-full bg-white border border-slate-200 text-slate-700 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all placeholder:text-slate-300"
                            placeholder="Contoh: Budi Santoso" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Gelar (Opsional)</label>
                            <input type="text" name="gelar" 
                                class="w-full bg-white border border-slate-200 text-slate-700 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all placeholder:text-slate-300"
                                placeholder="Contoh: S.Kom, M.T.">
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-slate-700">Nomor Urut Tampilan</label>
                            <input type="number" name="urutan" 
                                class="w-full bg-white border border-slate-200 text-slate-700 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all placeholder:text-slate-300"
                                placeholder="Contoh: 1">
                        </div>
                    </div>
                </div>

                <div class="pt-4 flex items-center justify-end gap-3">
                    <button type="reset" class="px-6 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-50 rounded-xl transition-colors">
                        Reset
                    </button>
                    <button type="submit" 
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-2.5 rounded-xl font-bold transition-all shadow-md shadow-indigo-100 active:scale-95">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('level').addEventListener('change', function() {
        const levelId = this.value;
        const jabatanSelect = document.getElementById('jabatan');

        // State loading yang lebih manis
        jabatanSelect.innerHTML = '<option value="">⏳ Mengambil data...</option>';
        jabatanSelect.classList.add('animate-pulse');

        if (!levelId) {
            jabatanSelect.innerHTML = '<option value="">-- Pilih Jabatan --</option>';
            jabatanSelect.classList.remove('animate-pulse');
            return;
        }

        fetch(`<?= base_url('admin/struktur/jabatan-by-level') ?>/${levelId}`)
            .then(res => res.json())
            .then(data => {
                let option = '<option value="">-- Pilih Jabatan --</option>';
                data.forEach(j => {
                    option += `<option value="${j.id_jabatan}">${j.nama_jabatan}</option>`;
                });
                jabatanSelect.innerHTML = option;
                jabatanSelect.classList.remove('animate-pulse');
            })
            .catch(err => {
                jabatanSelect.innerHTML = '<option value="">Gagal memuat data</option>';
                jabatanSelect.classList.remove('animate-pulse');
            });
    });
</script>

<?= $this->include('admin/layout/footer') ?>