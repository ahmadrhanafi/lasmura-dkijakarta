<?= $this->include('admin/layout/header') ?>

<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Log Aktivitas Sistem</h1>

    <div class="overflow-x-auto bg-white rounded-xl shadow-sm border">
        <form method="get" class="mb-4 grid grid-cols-1 md:grid-cols-4 gap-3">
            <input type="date" name="from"
                value="<?= esc($filter['from'] ?? '') ?>"
                class="border rounded px-3 py-2">

            <input type="date" name="to"
                value="<?= esc($filter['to'] ?? '') ?>"
                class="border rounded px-3 py-2">

            <select name="modul" class="border rounded px-3 py-2">
                <option value="">-- Semua Modul --</option>
                <option value="dashboard" <?= ($filter['modul'] ?? '') == 'dashboard' ? 'selected' : '' ?>>Dashboard</option>
                <option value="penerimaan anggota" <?= ($filter['modul'] ?? '') == 'penerimaan anggota' ? 'selected' : '' ?>>Penerimaan Anggota</option>
                <option value="anggota lasmura" <?= ($filter['modul'] ?? '') == 'anggota lasmura' ? 'selected' : '' ?>>Anggota Lasmura</option>
                <option value="pengelolaan berita" <?= ($filter['modul'] ?? '') == 'pengelolaan berita' ? 'selected' : '' ?>>Pengelolaan Berita</option>
                <option value="kegiatan lasmura" <?= ($filter['modul'] ?? '') == 'kegiatan lasmura' ? 'selected' : '' ?>>Kegiatan Lasmura</option>
                <option value="struktur organisasi" <?= ($filter['modul'] ?? '') == 'struktur organisasi' ? 'selected' : '' ?>>Struktur Organisasi</option>
                <option value="manajemen admin" <?= ($filter['modul'] ?? '') == 'manajemen admin' ? 'selected' : '' ?>>Manajemen Admin</option>
            </select>

            <button class="bg-slate-800 text-white rounded px-4 py-2">
                Filter
            </button>
        </form>

        <table class="w-full text-sm">
            <thead class="bg-slate-100">
                <tr>
                    <th class="px-4 py-3 text-left">Waktu</th>
                    <th class="px-4 py-3 text-left">User</th>
                    <th class="px-4 py-3 text-left">Role</th>
                    <th class="px-4 py-3 text-left">Modul</th>
                    <th class="px-4 py-3 text-left">Aktivitas</th>
                    <th class="px-4 py-3 text-left">IP</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($logs as $log): ?>
                    <tr class="border-t hover:bg-slate-50">
                        <td class="px-4 py-2 whitespace-nowrap">
                            <?= date('d M Y H:i', strtotime($log['created_at'])) ?>
                        </td>
                        <td class="px-4 py-2"><?= esc($log['nama_lengkap']) ?? '-' ?></td>
                        <td class="px-4 py-2"><?= esc($log['role']) ?></td>
                        <td class="px-4 py-2 font-semibold text-indigo-600">
                            <?= esc($log['modul']) ?>
                        </td>
                        <td class="px-4 py-2"><?= esc($log['aksi']) ?></td>
                        <td class="px-4 py-2 text-slate-500"><?= $log['ip_address'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <?= $pager->links('logs', 'admin_pagination') ?>
    </div>
</div>

<?= $this->include('admin/layout/footer') ?>