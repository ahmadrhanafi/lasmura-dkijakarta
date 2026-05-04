<?= $this->include('board/layout/header') ?>

<div class="container mx-auto px-6 py-8 max-w-7xl">
    <!-- Header Page -->
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Verifikasi Pendaftaran</h1>
            <p class="text-sm text-slate-500">Tinjau dan proses permohonan keanggotaan baru.</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="<?= base_url('admin/pendaftaran/export') ?>"
                class="inline-flex items-center justify-center bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-xl font-semibold transition-all shadow-sm shadow-emerald-50 gap-2 active:scale-95 text-sm">
                <i class="fa-solid fa-file-export text-xs"></i>
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
        <form method="get" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
            <div class="md:col-span-5 space-y-1.5">
                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Cari Calon Anggota</label>
                <div class="relative group">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-[#ea7e13] transition-colors text-sm"></i>
                    <input type="text" name="q" value="<?= esc($keyword) ?>"
                        placeholder="Nama / Nomor Anggota / Email / Alamat ..."
                        class="w-full pl-11 pr-4 py-2.5 rounded-xl bg-slate-50 border border-slate-100 focus:border-orange-200 focus:ring-4 focus:ring-orange-50 text-sm transition-all outline-none">
                </div>
            </div>

            <div class="md:col-span-3 space-y-1.5">
                <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Status Verifikasi</label>
                <select name="status" class="w-full px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-100 focus:border-orange-200 focus:ring-4 focus:ring-orange-50 text-sm transition-all outline-none appearance-none cursor-pointer">
                    <option value="">Semua Status</option>
                    <option value="menunggu" <?= $status === 'menunggu' ? 'selected' : '' ?>>Menunggu</option>
                    <option value="diterima" <?= $status === 'diterima' ? 'selected' : '' ?>>Diterima</option>
                    <option value="ditolak" <?= $status === 'ditolak' ? 'selected' : '' ?>>Ditolak</option>
                </select>
            </div>

            <div class="md:col-span-4 flex gap-2">
                <button type="submit" class="flex-1 bg-slate-800 text-white px-6 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-black transition-all h-[42px]">
                    <i class="fa-solid fa-filter mr-2"></i> Filter
                </button>
                <?php if ($keyword || $status): ?>
                    <a href="<?= base_url('/admin/anggota') ?>" class="bg-slate-100 text-slate-500 px-6 py-2.5 rounded-xl text-xs font-bold uppercase tracking-wider hover:bg-slate-200 flex items-center justify-center h-[42px]">
                        Reset
                    </a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <!-- Main Table Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Informasi Calon</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Kontak</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Domisili</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-center">Status</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php if (empty($pendaftaran)): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center justify-center text-slate-300">
                                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                                        <i class="fa-solid fa-inbox text-2xl opacity-20"></i>
                                    </div>
                                    <p class="text-xs font-medium text-slate-400">Belum ada data pendaftaran yang masuk.</p>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($pendaftaran as $p): ?>
                            <tr class="hover:bg-slate-50/80 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-slate-700 leading-none group-hover:text-orange-600 transition-colors uppercase tracking-tight">
                                            <?= esc($p['nama_lengkap']) ?>
                                        </span>
                                        <span class="text-[10px] text-slate-400 font-medium mt-1.5 uppercase">
                                            Daftar: <?= \CodeIgniter\I18n\Time::parse($p['created_at'])->format('d M Y') ?>
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col gap-1 text-[11px] font-medium text-slate-600">
                                        <span class="flex items-center"><i class="fa-solid fa-phone text-slate-300 mr-2 w-3"></i> <?= esc($p['no_hp']) ?></span>
                                        <span class="flex items-center text-slate-400"><i class="fa-regular fa-envelope text-slate-300 mr-2 w-3"></i> <?= esc($p['email'] ?? '-') ?></span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="max-w-[180px]">
                                        <p class="text-[11px] text-slate-500 leading-relaxed line-clamp-2 italic"><?= esc($p['alamat']) ?></p>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[9px] font-black uppercase border
                                        <?= $p['status'] === 'menunggu' ? 'bg-amber-50 text-amber-600 border-amber-100 shadow-sm shadow-amber-50' : ($p['status'] === 'diterima' ? 'bg-emerald-50 text-emerald-600 border-emerald-100' :
                                            'bg-red-50 text-red-600 border-red-100') ?>">
                                        <?php if ($p['status'] === 'menunggu'): ?>
                                            <span class="w-1.5 h-1.5 bg-amber-400 rounded-full mr-1.5 animate-pulse"></span>
                                        <?php endif; ?>
                                        <?= $p['status'] ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <?php if ($p['status'] === 'menunggu'): ?>
                                        <div class="flex items-center justify-center gap-2">
                                            <form action="<?= base_url('admin/pendaftaran/terima/' . $p['id_pendaftaran']) ?>" method="post">
                                                <?= csrf_field() ?>
                                                <button class="bg-emerald-600 hover:bg-emerald-700 text-white text-[10px] font-bold uppercase px-3 py-1.5 rounded-lg transition-all active:scale-95 shadow-sm shadow-emerald-100">
                                                    Terima
                                                </button>
                                            </form>
                                            <form action="<?= base_url('admin/pendaftaran/tolak/' . $p['id_pendaftaran']) ?>" method="post" onsubmit="return confirm('Tolak pendaftaran ini?')">
                                                <?= csrf_field() ?>
                                                <button class="bg-white border border-red-100 text-red-500 hover:bg-red-50 text-[10px] font-bold uppercase px-3 py-1.5 rounded-lg transition-all">
                                                    Tolak
                                                </button>
                                            </form>
                                        </div>
                                    <?php else: ?>
                                        <div class="flex justify-center italic text-slate-300 text-[10px] font-bold uppercase tracking-widest">
                                            Processed
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination Footer -->
        <div class="px-6 py-4 bg-slate-50/50 border-t border-slate-100 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">LASMURA &copy; 2026 Verification Portal</p>
            <div class="admin-pagination">
                <?= $pager->links('pendaftaran', 'admin_pagination') ?>
            </div>
        </div>
    </div>
</div>

<?= $this->include('board/layout/footer') ?>