<?= $this->include('board/layout/header') ?>

<div class="container mx-auto px-4 py-8 max-w-7xl">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Manajemen Struktur</h1>
            <p class="text-sm text-slate-500">Konfigurasi hierarki, jabatan, dan penempatan anggota.</p>
        </div>
        <a href="<?= base_url('admin/struktur/create') ?>"
            class="inline-flex items-center justify-center bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-xl font-semibold transition-all shadow-md shadow-indigo-100 gap-2 active:scale-95">
            <i class="fa-solid fa-user-plus text-xs"></i>
            Tambah Anggota
        </a>
    </div>

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

        <div class="lg:col-span-5 space-y-8">
            <section class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 overflow-hidden">
                <div class="flex items-center gap-2 mb-4">
                    <div class="p-2 bg-indigo-50 rounded-lg text-indigo-600">
                        <i class="fa-solid fa-layer-group text-sm"></i>
                    </div>
                    <h2 class="text-lg font-bold text-slate-800">Hierarki Level</h2>
                </div>

                <form action="<?= base_url('admin/struktur/level/simpan') ?>" method="post" class="mb-8">
                    <div class="flex gap-2 p-1.5 bg-slate-50 rounded-xl border border-slate-200 focus-within:border-indigo-300 focus-within:ring-4 focus-within:ring-indigo-500/5 transition-all">
                        <input type="text" name="nama_level" class="flex-1 bg-transparent border-none focus:ring-0 text-sm px-2" placeholder="Level baru..." required>
                        <input type="number" name="urutan" class="w-14 bg-white border border-slate-200 rounded-lg text-sm px-1 text-center" placeholder="No">
                        <button class="bg-slate-800 hover:bg-slate-900 text-white px-4 py-2 rounded-lg text-sm font-bold transition-colors">
                            Simpan
                        </button>
                    </div>
                </form>

                <ul id="sortable-level" class="space-y-2">
                    <?php foreach ($level as $l): ?>
                        <li data-id="<?= $l['id_level'] ?>" class="group flex justify-between items-center p-3 bg-white border border-slate-100 hover:border-indigo-200 rounded-xl transition-all cursor-grab active:cursor-grabbing">
                            <div class="flex items-center gap-3">
                                <span class="drag-handle text-slate-300 group-hover:text-indigo-400">
                                    <i class="fa-solid fa-grip-vertical"></i>
                                </span>
                                <span class="font-semibold text-slate-700 text-sm"><?= $l['nama_level'] ?></span>
                            </div>
                            <div class="flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="<?= base_url('admin/struktur/level/edit/' . $l['id_level']) ?>" class="p-2 text-slate-400 hover:text-blue-600">
                                    <i class="fa-solid fa-pen text-xs"></i>
                                </a>
                                <a href="<?= base_url('admin/struktur/level/hapus/' . $l['id_level']) ?>" class="p-2 text-slate-400 hover:text-red-600" onclick="return confirm('Hapus level?')">
                                    <i class="fa-solid fa-trash-can text-xs"></i>
                                </a>
                            </div>
                        </li>
                    <?php endforeach ?>
                </ul>
            </section>

            <section class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
                <div class="flex items-center gap-2 mb-4">
                    <div class="p-2 bg-amber-50 rounded-lg text-amber-600">
                        <i class="fa-solid fa-id-badge text-sm"></i>
                    </div>
                    <h2 class="text-lg font-bold text-slate-800">Jabatan</h2>
                </div>

                <form action="<?= base_url('admin/struktur/jabatan/simpan') ?>" method="post" class="space-y-3 mb-8 bg-slate-50 p-4 rounded-xl border border-slate-100">
                    <select name="id_level" class="w-full border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        <option value="">Pilih Level Parent</option>
                        <?php foreach ($level as $l): ?>
                            <option value="<?= $l['id_level'] ?>"><?= $l['nama_level'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="flex gap-2">
                        <input type="text" name="nama_jabatan" class="flex-1 border border-slate-200 rounded-lg px-3 py-2 text-sm" placeholder="Nama jabatan..." required>
                        <input type="number" name="urutan" class="w-14 border border-slate-200 rounded-lg px-2 py-2 text-sm text-center" placeholder="No">
                    </div>
                    <button class="w-full bg-indigo-50 text-indigo-700 hover:bg-indigo-100 px-4 py-2 rounded-lg text-sm font-bold transition-colors text-center">
                        Tambah Jabatan
                    </button>
                </form>

                <?php foreach ($level as $l): ?>
                    <div class="mb-6 last:mb-0">
                        <h3 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 border-b border-slate-50 pb-1"><?= $l['nama_level'] ?></h3>
                        <ul class="sortable-jabatan space-y-2" data-level="<?= $l['id_level'] ?>">
                            <?php foreach ($jabatan as $j): ?>
                                <?php if ($j['id_level'] == $l['id_level']): ?>
                                    <li data-id="<?= $j['id_jabatan'] ?>" class="p-2.5 text-xs bg-slate-50/50 border border-slate-200 rounded-lg hover:bg-white hover:border-indigo-200 cursor-move transition-all flex items-center justify-between group">
                                        <span class="text-slate-700 font-medium"><?= $j['nama_jabatan'] ?></span>
                                        <div class="flex items-center gap-2">
                                            <a href="<?= base_url('admin/struktur/jabatan/edit/' . $j['id_jabatan']) ?>" class="opacity-0 group-hover:opacity-100 text-blue-500 transition-opacity">
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
            </section>
        </div>

        <div class="lg:col-span-7">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-white sticky top-0 z-10">
                    <h2 class="text-lg font-bold text-slate-800">Daftar Anggota</h2>
                    <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-full text-xs font-bold"><?= count($anggota) ?> Total</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/50 border-b border-slate-100">
                                <th class="px-4 py-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider">No</th>
                                <th class="px-4 py-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Nama Anggota</th>
                                <th class="px-4 py-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Jabatan</th>
                                <th class="px-4 py-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider">Status</th>
                                <th class="px-4 py-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <?php foreach ($anggota as $i => $a): ?>
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="px-4 py-4 text-xs text-slate-400 font-medium">
                                        <?= $pager->getCurrentPage('anggota') > 1
                                            ? (($pager->getCurrentPage('anggota') - 1) * 10) + $i + 1
                                            : $i + 1 ?>
                                    </td>
                                    <td class="px-4 py-4">
                                        <?php if (!$a['nama_lengkap']): ?>
                                            <span class="italic text-gray-400">User tidak ditemukan</span>
                                        <?php elseif ($a['status'] !== 'aktif'): ?>
                                            <span class="text-red-600 font-semibold">
                                                <?= $a['nama_lengkap'] ?> (Nonaktif)
                                            </span>
                                        <?php else: ?>
                                            <span class="font-bold text-slate-500 text-sm leading-tight"><?= $a['nama_lengkap'] ?></span>
                                            <span class="text-[11px] text-slate-400"><?= $a['gelar'] ?: '' ?></span>
                                        <?php endif ?>
                                    </td>
                                    <td class="px-4 py-4">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-indigo-50 text-indigo-700 border border-indigo-100">
                                            <?= $a['nama_jabatan'] ?>
                                        </span>
                                    </td>
                                    <td class="px-4 py-4">
                                        <?php if ($a['status'] === 'aktif'): ?>
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-green-50 text-green-700 border border-green-100">Aktif</span>
                                        <?php else: ?>
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-red-50 text-red-700 border border-red-100">Nonaktif</span>
                                        <?php endif ?>
                                    </td>

                                    <td class="px-4 py-4">
                                        <div class="flex items-center justify-center gap-3">
                                            <?php if ($a['status'] === 'aktif'): ?>
                                                <a href="<?= base_url('admin/struktur/edit/' . $a['id_anggota']) ?>" class="text-blue-500 hover:text-blue-700 transition-colors" title="Edit">
                                                    <i class="fa-solid fa-user-pen"></i>
                                                </a>
                                            <?php else: ?>
                                                <i class="fa-solid fa-user-pen text-gray-400"></i>
                                            <?php endif ?>

                                            <a href="<?= base_url('admin/struktur/anggota/hapus/' . $a['id_anggota']) ?>" class="text-red-400 hover:text-red-600 transition-colors" onclick="return confirm('Hapus anggota?')" title="Hapus">
                                                <i class="fa-solid fa-user-minus"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            <?php if (empty($anggota)): ?>
                                <tr>
                                    <td colspan="4" class="px-4 py-8 text-center text-slate-400 text-xs italic">Belum ada data anggota.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6 flex justify-center">
                <?= $pager->links('anggota', 'admin_pagination') ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

<script>
    const sortOptions = {
        animation: 150,
        ghostClass: 'bg-indigo-50',
        chosenClass: 'scale-[1.01]',
        dragClass: 'shadow-xl'
    };

    // Initialize Sortable for Levels
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

    // Initialize Sortable for Jabatan
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

    async function updateUrutan(url, data) {
        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });
            if (!response.ok) throw new Error('Update failed');
        } catch (error) {
            console.error('Error:', error);
            0
            alert('Gagal memperbarui urutan');
        }
    }
</script>

<?= $this->include('board/layout/footer') ?>