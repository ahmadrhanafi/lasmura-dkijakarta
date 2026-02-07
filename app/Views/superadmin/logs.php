<?= $this->include('admin/layout/header') ?>

<div class="p-6">
    <h1 class="text-2xl font-bold mb-6">Log Aktivitas Sistem</h1>

    <div class="overflow-x-auto bg-white rounded-xl shadow-sm border">
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
