<?= $this->include('admin/layout/header') ?>

<!-- Content -->
<main class="p-6 flex-1">

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

    <form method="get" class="flex flex-wrap items-end gap-3 mb-6">
        <div>
            <label class="text-xs text-gray-500 ml-1">Cari Anggota</label>
            <input type="text" name="q" value="<?= esc($keyword) ?>"
                placeholder="Nama / NIK / Email..."
                class="block border rounded-lg px-4 py-2 text-sm h-10 w-64 focus:ring-2 focus:ring-orange-500 outline-none">
        </div>

        <div>
            <label class="text-xs text-gray-500 ml-1">Status</label>
            <select name="status" class="block border rounded-lg px-4 py-2 text-sm h-10 w-40 focus:ring-2 focus:ring-orange-500 outline-none">
                <option value="">Semua Status</option>
                <option value="menunggu" <?= $status === 'menunggu' ? 'selected' : '' ?>>Menunggu</option>
                <option value="diterima" <?= $status === 'diterima' ? 'selected' : '' ?>>Diterima</option>
                <option value="ditolak" <?= $status === 'ditolak' ? 'selected' : '' ?>>Ditolak</option>
            </select>
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-[#ea7e13] hover:bg-[#d66f0f] text-white px-5 h-10 rounded-lg text-sm font-medium transition-all">
                <i class="fa-solid fa-filter mr-1"></i> Filter
            </button>

            <a href="<?= base_url('/admin/anggota') ?>" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 h-10 flex items-center rounded-lg text-sm transition-all">
                Reset
            </a>
        </div>

        <a href="<?= base_url('/anggota/export') ?>" class="bg-green-600 hover:bg-green-700 text-white px-4 h-10 flex items-center rounded-lg text-sm ml-auto font-medium transition-all shadow-sm">
            <i class="fa-solid fa-file-export mr-2"></i> Export CSV
        </a>
    </form>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 border-b border-gray-100 text-gray-600">
                <tr>
                    <th class="px-6 py-4 font-semibold uppercase tracking-wider">Info Anggota</th>
                    <th class="px-6 py-4 font-semibold uppercase tracking-wider">Kontak</th>
                    <th class="px-6 py-4 font-semibold uppercase tracking-wider">Alamat</th>
                    <th class="px-6 py-4 font-semibold uppercase tracking-wider text-center">Status</th>
                    <th class="px-6 py-4 font-semibold uppercase tracking-wider text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-50">
                <?php if (empty($pendaftaran)): ?>
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-400">
                            <i class="fa-solid fa-user-slash text-4xl mb-3 block opacity-20"></i>
                            Data tidak ditemukan.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($pendaftaran as $p): ?>
                        <tr class="hover:bg-gray-50/50 transition-all">
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-800"><?= esc($p['nama_lengkap']) ?></div>
                                <div class="text-xs text-gray-400">NIK: <?= $p['nik'] ?></div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col gap-1">
                                    <span class="flex items-center text-gray-600"><i class="fa-solid fa-phone text-[10px] mr-2 w-3"></i> <?= esc($p['no_hp']) ?></span>
                                    <span class="flex items-center text-gray-500"><i class="fa-regular fa-envelope text-[10px] mr-2 w-3"></i> <?= esc($p['email'] ?? '-') ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center
                                rounded-full text-xs font-medium text-gray-500">
                                    <?= esc($p['alamat']) ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                <?= $p['status'] === 'menunggu' ? 'bg-yellow-50 text-yellow-700 border border-yellow-100' : ($p['status'] === 'diterima' ? 'bg-green-50 text-green-700 border border-green-100' : 'bg-red-50 text-red-700 border border-red-100') ?>">
                                    <?= ucfirst($p['status']) ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <?php if ($p['status'] === 'menunggu'): ?>
                                    <div class="flex justify-center gap-2">
                                        <form action="<?= base_url('admin/pendaftaran/terima/' . $p['id_pendaftaran']) ?>" method="post">
                                            <?= csrf_field() ?>
                                            <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1.5 rounded-md text-xs transition-colors shadow-sm">
                                                Terima
                                            </button>
                                        </form>
                                        <form action="<?= base_url('admin/pendaftaran/tolak/' . $p['id_pendaftaran']) ?>" method="post">
                                            <?= csrf_field() ?>
                                            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-md text-xs transition-colors shadow-sm"
                                                onclick="return confirm('Tolak pendaftaran ini?')">
                                                Tolak
                                            </button>
                                        </form>
                                    </div>
                                <?php else: ?>
                                    <span class="text-gray-300 text-xs italic">Selesai</span>
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