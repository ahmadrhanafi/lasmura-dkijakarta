<?= $this->include('board/layout/header') ?>

<div class="p-6 space-y-6">

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Manajemen Admin</h1>
            <span class="text-sm text-slate-500">Kelola hak akses dan tingkatan pengguna Lasmura.</span>
        </div>
        <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-lg border shadow-sm">
            <span class="text-sm font-medium text-slate-600">Total Pengguna:</span>
            <span class="bg-[#d66a0c] text-white text-xs font-bold px-2 py-1 rounded-full"><?= $total_user ?></span>
        </div>
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

    <div class="bg-white rounded-xl border shadow-sm overflow-hidden">

        <div class="p-4 border-b bg-slate-50">
            <form action="" method="get" class="flex flex-wrap items-center gap-3">
                <select name="role" onchange="this.form.submit()"
                    class="text-sm border rounded-lg px-3 py-2 bg-white outline-none focus:ring-2 focus:ring-[#d66a0c] shadow-sm min-w-[140px]">
                    <option value="">Semua Role</option>
                    <option value="super_admin" <?= $selected_role == 'super_admin' ? 'selected' : '' ?>>Super Admin</option>
                    <option value="admin" <?= $selected_role == 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="anggota" <?= $selected_role == 'anggota' ? 'selected' : '' ?>>Anggota</option>
                </select>

                <div class="relative flex-grow md:flex-grow-0 md:w-80">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                        <i class="fa-solid fa-magnifying-glass text-xs"></i>
                    </span>
                    <input type="text" name="keyword" value="<?= esc($keyword) ?>" placeholder="Cari nama atau username..."
                        class="w-full pl-10 pr-4 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-[#d66a0c] outline-none shadow-sm">
                </div>

                <button type="submit" class="bg-slate-800 text-white px-5 py-2 rounded-lg text-sm font-semibold hover:bg-slate-900 transition">
                    Cari
                </button>

                <?php if ($keyword || $selected_role): ?>
                    <a href="<?= base_url('admin/manajemen-admin') ?>" class="bg-red-300 px-5 py-2 rounded-lg text-sm text-red-600 hover:text-red-700 font-medium ml-2">
                        <i class="fa-solid fa-circle-xmark"></i> Reset
                    </a>
                <?php endif; ?>
            </form>
        </div>

        <?php if (empty($users)): ?>
            <div class="p-20 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 text-slate-400 mb-4">
                    <i class="fa-solid fa-magnifying-glass text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-700">Data tidak ditemukan</h3>
                <p class="text-slate-500">Coba gunakan kata kunci lain atau ubah filter role.</p>
            </div>
        <?php else: ?>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="bg-white border-b text-slate-600 uppercase text-[11px] font-bold tracking-wider">
                        <tr>
                            <th class="px-6 py-4">Pengguna</th>
                            <th class="px-6 py-4">Username</th>
                            <th class="px-6 py-4 text-center">Role</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php foreach ($users as $u): ?>
                            <tr class="hover:bg-slate-50/80 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center font-bold text-xs border border-indigo-200 shadow-sm">
                                            <?= strtoupper(substr($u['nama_lengkap'], 0, 1)) ?>
                                        </div>
                                        <div>
                                            <span class="block font-semibold text-slate-700 uppercase"><?= esc($u['nama_lengkap']) ?></span>
                                            <span class="text-[10px] text-slate-400 uppercase">ID: #<?= $u['id_user'] ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-slate-600 font-mono text-xs">
                                    @<?= esc($u['username']) ?>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <?php
                                    $roleStyle = match ($u['role']) {
                                        'super_admin' => 'bg-gray-200 text-gray-500 border-gray-300',
                                        'admin'       => 'bg-blue-200 text-blue-500 border-blue-300',
                                        default       => 'bg-emerald-100 text-emerald-700 border-emerald-200',
                                    };
                                    ?>
                                    <span class="px-3 py-1 rounded-full text-[10px] font-bold border <?= $roleStyle ?>">
                                        <?= strtoupper(str_replace('_', ' ', $u['role'])) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <?php if ($u['role'] === 'anggota'): ?>
                                        <a href="<?= base_url('super-admin/admin/promote/' . $u['id_user']) ?>"
                                            class="text-emerald-600 hover:text-emerald-700 font-bold flex items-center justify-end gap-1 group">
                                            <span>Promosikan</span>
                                            <i class="fa-solid fa-chevron-up text-[10px] group-hover:-translate-y-1 transition-transform"></i>
                                        </a>
                                    <?php elseif ($u['role'] === 'admin'): ?>
                                        <a href="<?= base_url('super-admin/admin/demote/' . $u['id_user']) ?>"
                                            class="text-red-500 hover:text-red-600 font-bold flex items-center justify-end gap-1 group">
                                            <span>Turunkan</span>
                                            <i class="fa-solid fa-chevron-down text-[10px] group-hover:translate-y-1 transition-transform"></i>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-slate-300 italic text-xs">Owner</span>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

            <div class="px-6 py-4 bg-slate-50 border-t flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="text-[11px] text-slate-500 font-semibold uppercase tracking-wide">
                    Halaman <?= $pager->getCurrentPage('user') ?> dari <?= $pager->getPageCount('user') ?>
                </div>
                <div class="pagination-custom">
                    <?= $pager->links('user', 'admin_pagination') ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->include('board/layout/footer') ?>