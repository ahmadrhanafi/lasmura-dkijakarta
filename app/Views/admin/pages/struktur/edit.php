<?= $this->include('admin/layout/header') ?>

<div class="container mx-auto px-4 py-8 max-w-5xl">
    <nav class="flex items-center gap-2 text-sm text-slate-500 mb-4">
        <a href="<?= base_url('admin/struktur') ?>" class="hover:text-indigo-600 transition-colors">Struktur</a>
        <i class="fa-solid fa-chevron-right text-[10px]"></i>
        <span class="text-slate-800 font-medium">Edit Anggota</span>
    </nav>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="p-6 border-b border-slate-100 bg-slate-50/50 flex items-center gap-4">
            <div class="w-12 h-12 bg-indigo-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-indigo-200">
                <i class="fa-solid fa-user-pen text-xl"></i>
            </div>
            <div>
                <h2 class="text-xl font-bold text-slate-800">Edit Profil Anggota</h2>
                <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">ID Anggota: #<?= $anggota['id_anggota'] ?></p>
            </div>
        </div>

        <div class="p-8">
            <form action="<?= base_url('admin/struktur/anggota/update/' . $anggota['id_anggota']) ?>" method="post" class="space-y-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="group">
                        <label for="level" class="block text-sm font-bold text-slate-700 mb-2 group-focus-within:text-indigo-600 transition-colors">
                            Hierarki Level
                        </label>
                        <div class="relative">
                            <select id="level" class="w-full border rounded-xl px-4 py-2.5" required>
                                <option value="">-- Pilih Level --</option>
                                <?php foreach ($level as $l): ?>
                                    <option value="<?= $l['id_level'] ?>"
                                        <?= $l['id_level'] == $anggota['id_level'] ? 'selected' : '' ?>>
                                        <?= $l['nama_level'] ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                                <i class="fa-solid fa-angles-up-down text-xs"></i>
                            </div>
                        </div>
                    </div>

                    <div class="group">
                        <label for="jabatan" class="block text-sm font-bold text-slate-700 mb-2 group-focus-within:text-indigo-600 transition-colors">
                            Jabatan Spesifik
                        </label>
                        <div class="relative">
                            <select name="id_jabatan" id="jabatan"
                                class="w-full appearance-none bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all cursor-pointer shadow-sm"
                                required>
                                <option value="">Loading ...</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                                <i class="fa-solid fa-chevron-down text-xs"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="h-px bg-slate-100 my-2"></div>

                <div class="group">
                    <label class="block text-sm font-bold text-slate-700 mb-2 group-focus-within:text-indigo-600 transition-colors">Nama Lengkap</label>
                    <select name="id_user"
                        class="w-full border rounded-xl px-4 py-2.5" required>
                        <option value="">-- Pilih Anggota --</option>
                        <?php foreach ($users as $u): ?>
                            <option value="<?= $u['id_user'] ?>"
                                <?= $u['id_user'] == $anggota['id_user'] ? 'selected' : '' ?>>
                                <?= $u['nama_lengkap'] ?> (<?= $u['nik'] ?>)
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="group">
                        <label class="block text-sm font-bold text-slate-700 mb-2 group-focus-within:text-indigo-600 transition-colors">Gelar</label>
                        <input type="text" name="gelar"
                            class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all shadow-sm"
                            value="<?= $anggota['gelar'] ?>" placeholder="Contoh: S.T., M.Cs">
                    </div>

                    <div class="group">
                        <label class="block text-sm font-bold text-slate-700 mb-2 group-focus-within:text-indigo-600 transition-colors">Urutan Tampilan</label>
                        <input type="number" name="urutan"
                            class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all shadow-sm"
                            value="<?= $anggota['urutan'] ?>" placeholder="1">
                    </div>
                </div>

                <div class="pt-6 flex flex-col md:flex-row items-center justify-end gap-3 border-t border-slate-50 mt-4">
                    <a href="<?= base_url('admin/struktur') ?>"
                        class="w-full md:w-auto text-center px-6 py-3 text-sm font-bold text-slate-500 hover:text-slate-800 hover:bg-slate-100 rounded-xl transition-all">
                        Batal
                    </a>
                    <button type="submit"
                        class="w-full md:w-auto bg-slate-900 hover:bg-black text-white px-10 py-3 rounded-xl font-bold transition-all shadow-lg active:scale-95 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-floppy-disk text-xs"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const selectedJabatan = <?= $anggota['id_jabatan'] ?>;

    function loadJabatan(levelId) {
        fetch(`<?= base_url('admin/struktur/jabatan-by-level') ?>/${levelId}`)
            .then(res => res.json())
            .then(data => {
                let option = '';
                data.forEach(j => {
                    const selected = j.id_jabatan == selectedJabatan ? 'selected' : '';
                    option += `<option value="${j.id_jabatan}" ${selected}>
                        ${j.nama_jabatan}
                    </option>`;
                });
                document.getElementById('jabatan').innerHTML = option;
            });
    }

    document.getElementById('level').addEventListener('change', function() {
        loadJabatan(this.value);
    });

    // AUTO LOAD saat pertama buka
    loadJabatan(<?= $anggota['id_level'] ?>);
</script>


<?= $this->include('admin/layout/footer') ?>