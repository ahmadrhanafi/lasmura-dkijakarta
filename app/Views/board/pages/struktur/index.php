<?= $this->include('board/layout/header') ?>

<div class="max-w-full overflow-x-hidden p-4 md:p-6 space-y-6">
    <!-- Header Page -->
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Manajemen Struktur</h1>
            <p class="text-sm text-slate-500">Konfigurasi hierarki, jabatan, dan penempatan anggota organisasi.</p>
        </div>
        <a href="<?= base_url('admin/struktur/create') ?>"
            class="inline-flex items-center justify-center bg-[#ea7e13] hover:bg-[#d46d0e] text-white px-6 py-2.5 rounded-xl font-semibold transition-all shadow-md shadow-indigo-100 gap-2 active:scale-95 text-sm">
            <i class="fa-solid fa-user-plus text-xs"></i>
            Tambah Anggota
        </a>
    </div>

    <!-- Alert System -->
    <?php if (session()->getFlashdata('error') || session()->getFlashdata('success')): ?>
        <div class="js-flash-alert mb-6 overflow-hidden rounded-xl border shadow-sm transition-all duration-500">
            <?php if ($msg = session()->getFlashdata('error')): ?>
                <div class="flex items-center bg-red-50 border-l-4 border-red-500 p-4">
                    <i class="fa-solid fa-triangle-exclamation text-red-500 mr-3"></i>
                    <span class="text-red-800 text-sm font-medium"><?= $msg ?></span>
                </div>
            <?php endif; ?>
            <?php if ($msg = session()->getFlashdata('success')): ?>
                <div class="flex items-center bg-emerald-50 border-l-4 border-emerald-500 p-4">
                    <i class="fa-solid fa-circle-check text-emerald-500 mr-3"></i>
                    <span class="text-emerald-800 text-sm font-medium"><?= $msg ?></span>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        <!-- Kiri: Pengaturan Hierarki & Jabatan -->
        <div class="lg:col-span-5 space-y-8">

            <!-- SECTION HIERARKI LEVEL -->
            <section class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 overflow-hidden">
                <div class="flex items-center gap-2 mb-6">
                    <div class="p-2 bg-indigo-50 rounded-lg text-indigo-600">
                        <i class="fa-solid fa-layer-group text-sm"></i>
                    </div>
                    <h2 class="text-lg font-bold text-slate-800">Hierarki Level</h2>
                </div>

                <form action="<?= base_url('admin/struktur/level/simpan') ?>" method="post" class="mb-6">
                    <div class="flex gap-2 p-1.5 bg-slate-50 rounded-xl border border-slate-200 focus-within:border-indigo-300 focus-within:ring-4 focus-within:ring-indigo-500/5 transition-all">
                        <input type="text" name="nama_level" class="flex-1 bg-transparent border-none focus:ring-0 text-sm px-2 text-slate-700" placeholder="Level baru (cth: Pimpinan)..." required>
                        <input type="number" name="urutan" class="w-14 bg-white border border-slate-200 rounded-lg text-sm px-1 text-center font-bold text-slate-600" placeholder="Urut">
                        <button class="bg-slate-800 hover:bg-slate-900 text-white px-4 py-2 rounded-lg text-xs font-bold transition-colors">
                            SIMPAN
                        </button>
                    </div>
                </form>

                <ul id="sortable-level" class="space-y-2">
                    <?php foreach ($level as $l): ?>
                        <li data-id="<?= $l['id_level'] ?>" class="group flex justify-between items-center p-3 bg-white border border-slate-100 hover:border-indigo-200 rounded-xl transition-all cursor-grab active:cursor-grabbing shadow-sm">
                            <div class="flex items-center gap-3">
                                <span class="drag-handle text-slate-300 group-hover:text-indigo-400 transition-colors">
                                    <i class="fa-solid fa-grip-vertical"></i>
                                </span>
                                <span class="font-semibold text-slate-700 text-sm"><?= $l['nama_level'] ?></span>
                            </div>
                            <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="<?= base_url('admin/struktur/level/edit/' . $l['id_level']) ?>" class="p-2 text-slate-400 hover:text-blue-600">
                                    <i class="fa-solid fa-pen text-xs"></i>
                                </a>
                                <a href="<?= base_url('admin/struktur/level/hapus/' . $l['id_level']) ?>" class="p-2 text-slate-400 hover:text-red-600" onclick="return confirm('Hapus level ini?')">
                                    <i class="fa-solid fa-trash-can text-xs"></i>
                                </a>
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
            </section>

            <!-- SECTION JABATAN -->
            <section class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                <div class="flex items-center gap-2 mb-6">
                    <div class="p-2 bg-amber-50 rounded-lg text-amber-600">
                        <i class="fa-solid fa-id-badge text-sm"></i>
                    </div>
                    <h2 class="text-lg font-bold text-slate-800">Jabatan</h2>
                </div>

                <form action="<?= base_url('admin/struktur/jabatan/simpan') ?>" method="post" class="space-y-3 mb-8 bg-slate-50 p-4 rounded-xl border border-slate-100">
                    <div>
                        <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block mb-1">Parent Level</label>
                        <select name="id_level" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none" required>
                            <option value="">-- Pilih Level --</option>
                            <?php foreach ($level as $l): ?>
                                <option value="<?= $l['id_level'] ?>"><?= $l['nama_level'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="flex gap-2">
                        <div class="flex-1">
                            <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block mb-1">Nama Jabatan</label>
                            <input type="text" name="nama_jabatan" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none" placeholder="Cth: Ketua Umum..." required>
                        </div>
                        <div class="w-16">
                            <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block mb-1">Urutan</label>
                            <input type="number" name="urutan" class="w-full border border-slate-200 rounded-lg px-2 py-2 text-sm text-center font-bold" placeholder="0">
                        </div>
                    </div>
                    <button class="w-full bg-indigo-600 text-white hover:bg-indigo-700 px-4 py-2.5 rounded-lg text-xs font-bold transition-all text-center shadow-md shadow-indigo-100">
                        TAMBAH JABATAN
                    </button>
                </form>

                <div class="space-y-6">
                    <?php foreach ($level as $l): ?>
                        <div class="relative">
                            <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3 flex items-center gap-2">
                                <span><?= $l['nama_level'] ?></span>
                                <div class="h-px bg-slate-100 flex-1"></div>
                            </h3>
                            <ul class="sortable-jabatan space-y-2 min-h-[20px]" data-level="<?= $l['id_level'] ?>">
                                <?php foreach ($jabatan as $j): ?>
                                    <?php if ($j['id_level'] == $l['id_level']): ?>
                                        <li data-id="<?= $j['id_jabatan'] ?>" class="p-3 text-xs bg-slate-50/50 border border-slate-200 rounded-xl hover:bg-white hover:border-indigo-200 hover:shadow-sm cursor-move transition-all flex items-center justify-between group">
                                            <span class="text-slate-700 font-semibold"><?= $j['nama_jabatan'] ?></span>
                                            <div class="flex items-center gap-2">
                                                <a href="<?= base_url('admin/struktur/jabatan/edit/' . $j['id_jabatan']) ?>" class="opacity-0 group-hover:opacity-100 text-blue-500 hover:text-blue-700 transition-opacity">
                                                    <i class="fa-solid fa-pen-to-square text-[10px]"></i>
                                                </a>
                                                <i class="fa-solid fa-grip-lines text-[10px] text-slate-300"></i>
                                            </div>
                                        </li>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endforeach ?>
                </div>
            </section>
        </div>

        <!-- Kanan: Tabel Anggota -->
        <div class="lg:col-span-7">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-white">
                    <h2 class="text-lg font-bold text-slate-800">Daftar Anggota</h2>
                    <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider"><?= count($anggota) ?> Total Anggota</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-slate-100">
                                <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest w-16">No</th>
                                <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Informasi Anggota</th>
                                <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-center">Status</th>
                                <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <?php foreach ($anggota as $i => $a): ?>
                                <tr class="hover:bg-slate-50/80 transition-colors group">
                                    <td class="px-6 py-4 text-xs text-slate-400 font-mono">
                                        <?= (method_exists($pager, 'getCurrentPage') && $pager->getCurrentPage('anggota') > 1)
                                            ? (($pager->getCurrentPage('anggota') - 1) * 10) + $i + 1
                                            : $i + 1 ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex flex-col">
                                            <?php if (!$a['nama_lengkap']): ?>
                                                <span class="italic text-red-400 text-xs">Data user tidak valid/dihapus</span>
                                            <?php else: ?>
                                                <div class="flex items-center gap-2">
                                                    <span class="font-bold text-slate-700 text-sm"><?= $a['nama_lengkap'] ?></span>
                                                    <?php if ($a['gelar']): ?>
                                                        <span class="text-[10px] bg-slate-100 text-slate-500 px-1.5 py-0.5 rounded font-medium"><?= $a['gelar'] ?></span>
                                                    <?php endif; ?>
                                                </div>
                                                <span class="text-[11px] font-bold text-indigo-500 uppercase tracking-tight mt-0.5"><?= $a['nama_jabatan'] ?></span>
                                            <?php endif ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <?php if ($a['status'] === 'aktif'): ?>
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-black uppercase bg-emerald-50 text-emerald-600 border border-emerald-100">Aktif</span>
                                        <?php else: ?>
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-black uppercase bg-red-50 text-red-600 border border-red-100">Nonaktif</span>
                                        <?php endif ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="<?= base_url('admin/struktur/edit/' . $a['id_anggota']) ?>"
                                                class="w-8 h-8 flex items-center justify-center rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all shadow-sm" title="Edit Data">
                                                <i class="fa-solid fa-user-pen text-xs"></i>
                                            </a>
                                            <a href="<?= base_url('admin/struktur/anggota/hapus/' . $a['id_anggota']) ?>"
                                                class="w-8 h-8 flex items-center justify-center rounded-lg bg-red-50 text-red-500 hover:bg-red-600 hover:text-white transition-all shadow-sm"
                                                onclick="return confirm('Hapus anggota ini dari struktur?')" title="Hapus Anggota">
                                                <i class="fa-solid fa-user-minus text-xs"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                            <?php if (empty($anggota)): ?>
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center text-slate-400">
                                            <i class="fa-solid fa-folder-open text-3xl mb-3 opacity-20"></i>
                                            <p class="text-xs italic">Belum ada data anggota struktur organisasi.</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-6 flex justify-center">
                <?= $pager->links('anggota', 'admin_pagination') ?>
            </div>
        </div>
    </div>
</div>

<!-- Scripts Section -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

<script>
    const sortOptions = {
        animation: 200,
        ghostClass: 'bg-indigo-50',
        chosenClass: 'shadow-lg',
        dragClass: 'opacity-50'
    };

    // 1. Inisialisasi Sortable untuk Levels
    const levelEl = document.getElementById('sortable-level');
    if (levelEl) {
        new Sortable(levelEl, {
            ...sortOptions,
            handle: '.drag-handle',
            onEnd: function() {
                const data = Array.from(levelEl.querySelectorAll('li')).map((el, i) => ({
                    id: el.dataset.id,
                    urutan: i + 1
                }));
                updateUrutan('<?= base_url('admin/struktur/level/update-urutan') ?>', data);
            }
        });
    }

    // 2. Inisialisasi Sortable untuk Jabatan (Multiple Lists)
    document.querySelectorAll('.sortable-jabatan').forEach(el => {
        new Sortable(el, {
            ...sortOptions,
            onEnd: function() {
                const data = Array.from(el.querySelectorAll('li')).map((li, i) => ({
                    id: li.dataset.id,
                    urutan: i + 1
                }));
                updateUrutan('<?= base_url('admin/struktur/jabatan/update-urutan') ?>', data);
            }
        });
    });

    // 3. Fungsi Global Update ke Server via AJAX
    async function updateUrutan(url, data) {
        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify(data)
            });

            if (!response.ok) throw new Error('Network response was not ok');

            // Opsional: Beri feedback visual sukses yang halus (toast)
            console.log('Urutan berhasil diperbarui');

        } catch (error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menyimpan urutan baru.');
            // Reload jika gagal agar urutan di UI kembali ke posisi database
            window.location.reload();
        }
    }
</script>

<?= $this->include('board/layout/footer') ?>