<?= $this->include('board/layout/header') ?>

<div class="container mx-auto px-6 py-8 max-w-7xl">
    <!-- Header Page -->
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Manajemen Anggota</h1>
            <p class="text-sm text-slate-500">Kelola database keanggotaan dan status verifikasi.</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="<?= base_url('admin/anggota/export') ?>"
                class="inline-flex items-center justify-center bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-xl font-semibold transition-all shadow-sm shadow-emerald-50 gap-2 active:scale-95 text-sm">
                <i class="fa-solid fa-file-csv"></i>
                Export CSV
            </a>
        </div>
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

    <!-- Search & Filter Bar -->
    <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200 mb-8">
        <form method="get" class="grid grid-cols-1 md:grid-cols-12 gap-4">
            <!-- Search Input -->
            <div class="md:col-span-6 relative group">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-blue-500 transition-colors text-sm"></i>
                <input type="text" name="q" value="<?= esc($keyword) ?>"
                    placeholder="Cari nama, alamat atau nomor anggota..."
                    class="w-full pl-11 pr-4 py-2.5 rounded-xl bg-slate-50 border border-slate-100 focus:border-blue-200 focus:ring-4 focus:ring-blue-50 text-sm transition-all outline-none">
            </div>

            <!-- Status Filter -->
            <div class="md:col-span-3">
                <select name="status" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-100 focus:border-blue-200 focus:ring-4 focus:ring-blue-50 text-sm transition-all outline-none appearance-none cursor-pointer">
                    <option value="">Semua Status</option>
                    <option value="aktif" <?= $status === 'aktif' ? 'selected' : '' ?>>Aktif</option>
                    <option value="nonaktif" <?= $status === 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                </select>
            </div>

            <!-- Actions -->
            <div class="md:col-span-3 flex gap-2">
                <button type="submit" class="flex-1 bg-slate-800 text-white px-4 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-black transition-all">
                    <i class="fa-solid fa-filter mr-2"></i> Filter
                </button>
                <?php if ($keyword || $status): ?>
                    <a href="<?= base_url('/admin/anggota') ?>" class="bg-slate-100 text-slate-500 px-4 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-slate-200 flex items-center justify-center">
                        <i class="fa-solid fa-rotate-left"></i>
                    </a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <!-- Main Table Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b border-slate-100 bg-slate-50/50">
            <h2 class="text-lg font-bold text-slate-800">Database Anggota</h2>
            <span class="bg-slate-100 text-slate-400 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider border border-slate-200">
                Total: <?= count($anggota) ?> Anggota
            </span>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Info Profil</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Kontak</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Alamat / Domisili</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-center">Status</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php foreach ($anggota as $row): ?>
                            <tr class="hover:bg-slate-50/80 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 bg-slate-100 rounded-full flex items-center justify-center text-slate-400 font-bold text-xs border border-slate-200">
                                            <?= substr($row['nama_lengkap'], 0, 1) ?>
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="font-bold text-slate-700 leading-none uppercase tracking-tight group-hover:text-blue-600 transition-colors">
                                                <?= esc($row['nama_lengkap']) ?>
                                            </span>
                                            <span class="text-[10px] text-slate-400 font-mono mt-1">ID: <?= esc($row['nomor_anggota']) ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-[11px]">
                                    <div class="flex flex-col gap-1">
                                        <span class="text-slate-600 font-medium"><i class="fa-solid fa-phone text-[9px] mr-2 w-3 text-slate-300"></i><?= esc($row['no_hp'] ?? '-') ?></span>
                                        <span class="text-slate-400">
                                            <i class="fa-regular fa-envelope text-[9px] mr-2 w-3 text-slate-300"></i>
                                            <?= esc($row['email'] ?? '-') ?>
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-[11px] text-slate-500 italic line-clamp-1 max-w-[200px]"><?= esc($row['alamat'] ?? 'Alamat belum diatur') ?></p>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[9px] font-black uppercase border <?= $row['status'] === 'aktif' ? 'bg-emerald-50 text-emerald-600 border-emerald-100' : 'bg-slate-100 text-slate-500 border-slate-200' ?>">
                                        <?= $row['status'] ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center gap-2">
                                        <a href="<?= base_url('admin/anggota/detail/' . $row['id_user']) ?>" class="w-8 h-8 flex items-center justify-center rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all">
                                            <i class="fa-solid fa-user-gear text-xs"></i>
                                        </a>
                                        <!-- Tombol lainnya... -->
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination Footer -->
        <div class="px-6 py-4 bg-slate-50/50 border-t border-slate-100 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-[10px] font-bold text-slate-300 uppercase tracking-widest">&copy; Lasmura Membership Database</p>
            <div class="admin-pagination">
                <?= $pager->links('anggota', 'admin_pagination') ?>
            </div>
        </div>
    </div>
</div>

<?= $this->include('board/layout/footer') ?>