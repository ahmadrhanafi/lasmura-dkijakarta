<?= $this->include('admin/layout/header') ?>

<!-- Content -->
<main class="p-6 flex-1">

    <?php if (session()->getFlashdata('success')): ?>
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form method="get" class="flex flex-wrap gap-2 mb-4">
        <input type="text"
            name="q"
            value="<?= esc($keyword) ?>"
            placeholder="Cari nama atau NIK anggota..."
            class="border rounded px-4 py-2 text-sm mt-1 h-9 w-50">

        <select name="status"
            class="border rounded px-4 py-1 text-sm mt-1 h-9 w-50">
            <option value="">Semua Status</option>
            <option value="aktif" <?= $status === 'aktif' ? 'selected' : '' ?>>Aktif</option>
            <option value="nonaktif" <?= $status === 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
        </select>

        <button class="bg-[#ea7e13] text-white px-4 py-2 mb-1 mt-1 rounded text-sm">
            Filter
        </button>

        <a href="<?= base_url('/admin/anggota') ?>"
            class="bg-gray-300 px-4 py-2 mb-1 mt-1 rounded text-sm">
            Reset
        </a>

        <a href="<?= base_url('/anggota/export') ?>"
            class="bg-green-600 text-white px-3 py-2 mb-1 mt-1 rounded text-sm ml-auto">
            Export CSV
        </a>
    </form>
    
    <div class="bg-white rounded shadow overflow-x-auto">

        <!-- Header Card -->
        <div class="flex justify-between items-center px-6 py-4 border-b rounded">
            <h2 class="font-semibold text-gray-700">
                Daftar Calon Anggota
            </h2>
        </div>

        <table class="w-full text-sm text-left text-gray-500">
            <thead class="bg-gray-300 text-gray-600">
                <tr>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">No HP</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                <?php if (empty($pendaftaran)): ?>
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                            <i class="fa-solid fa-user-slash text-3xl mb-2 block"></i>
                            Belum ada user yang mendaftar.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php $no = 1 + (10 * (($pager->getCurrentPage('pendaftaran')) - 1));
                    foreach ($pendaftaran as $p): ?>
                        <tr>
                            <td class="px-4 py-3"><?= esc($p['nama_lengkap']) ?></td>
                            <td class="px-4 py-3"><?= esc($p['no_hp']) ?></td>
                            <td class="px-4 py-3"><?= esc($p['email'] ?? '-') ?></td>

                            <td class="px-4 py-3">
                                <?php if ($p['status'] === 'menunggu'): ?>
                                    <span class="px-3 py-1 text-xs rounded bg-yellow-100 text-yellow-700">
                                        Menunggu
                                    </span>
                                <?php elseif ($p['status'] === 'diterima'): ?>
                                    <span class="px-3 py-1 text-xs rounded bg-green-100 text-green-700">
                                        Diterima
                                    </span>
                                <?php else: ?>
                                    <span class="px-3 py-1 text-xs rounded bg-red-100 text-red-700">
                                        Ditolak
                                    </span>
                                <?php endif; ?>
                            </td>

                            <td class="px-4 py-3 text-center space-x-2">
                                <?php if ($p['status'] === 'menunggu'): ?>
                                    <form action="<?= base_url('admin/pendaftaran/terima/' . $p['id_pendaftaran']) ?>"
                                        method="post" class="inline">
                                        <button class="px-3 py-1 bg-green-600 text-white rounded text-xs hover:bg-green-700">
                                            Terima
                                        </button>
                                    </form>

                                    <form action="<?= base_url('admin/pendaftaran/tolak/' . $p['id_pendaftaran']) ?>"
                                        method="post" class="inline">
                                        <button class="px-3 py-1 bg-red-600 text-white rounded text-xs hover:bg-red-700">
                                            Tolak
                                        </button>
                                    </form>
                                <?php else: ?>
                                    <span class="text-xs text-gray-400">—</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <?= $pager->links('pendaftaran', 'admin_pagination') ?>
    </div>
</main>

<?= $this->include('admin/layout/footer') ?>