<?= $this->include('admin/layout/header') ?>

<!-- Content -->
<main class="p-6 space-y-6">

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

    <!-- Card -->
    <div class="bg-white rounded shadow">

        <!-- Header Card -->
        <div class="flex justify-between items-center px-6 py-4 border-b rounded">
            <h2 class="font-semibold text-gray-700">
                Daftar Anggota
            </h2>
        </div>

        <!-- Table -->
        <div class="w-full overflow-x-auto shadow-md sm:rounded-sm">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="bg-gray-300 text-gray-600">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">NIK</th>
                        <!-- <th class="px-4 py-3 text-left">Jenis Kelamin</th> -->
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    <?php if (empty($anggota)): ?>
                        <tr>
                            <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                <i class="fa-solid fa-users-slash text-3xl mb-2 block"></i>
                                Belum ada anggota yang bergabung.
                            </td>
                        </tr>
                    <?php else: ?>

                        <?php $no = 1 + (10 * (($pager->getCurrentPage('anggota')) - 1));
                        foreach ($anggota as $row): ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3"><?= $no++ ?></td>
                                <td class="px-4 py-3 font-medium">
                                    <?= esc($row['nama_lengkap']) ?>
                                </td>
                                <td class="px-4 py-3"><?= esc($row['nik']) ?></td>

                                <td class="px-4 py-3">
                                    <?php if ($row['status'] === 'aktif'): ?>
                                        <span class="px-2 py-1 rounded text-xs bg-green-100 text-green-700">
                                            Aktif
                                        </span>
                                    <?php else: ?>
                                        <span class="px-2 py-1 rounded text-xs bg-gray-200 text-gray-600">
                                            Nonaktif
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-4 py-3 text-center space-x-2">
                                    <a href="<?= base_url('/anggota/detail/' . $row['id_user']) ?>"
                                        class="text-blue-600 hover:underline">
                                        Detail
                                    </a>

                                    <?php if (session()->get('role') === 'super_admin'): ?>
                                        <a href="<?= base_url('/anggota/hapus/' . $row['id_user']) ?>"
                                            class="text-red-600 hover:underline"
                                            onclick="return confirm('Yakin hapus anggota ini?')">
                                            Hapus
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                </tbody>
            <?php endif; ?>
            </table>
        </div>
    </div>

    <div class="mt-4">
        <?= $pager->links('anggota', 'admin_pagination') ?>
    </div>

</main>

<?= $this->include('admin/layout/footer') ?>