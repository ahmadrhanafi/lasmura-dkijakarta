<?= $this->include('board/layout/header') ?>

<div class="container mx-auto px-6 py-8 max-w-7xl">
    <!-- Header Page -->
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Manajemen Kegiatan</h1>
            <p class="text-sm text-slate-500">Monitoring dan pengelolaan publikasi event LASMURA.</p>
        </div>
        <a href="<?= base_url('admin/kegiatan/tambah') ?>"
            class="inline-flex items-center justify-center bg-[#ea7e13] hover:bg-[#d46d0e] text-white px-6 py-2.5 rounded-xl font-semibold transition-all shadow-md shadow-orange-100 gap-2 active:scale-95 text-sm">
            <i class="fa-solid fa-plus text-xs"></i>
            Tambah Kegiatan
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

    <!-- Statistik Ringkas -->
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-200">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total Kegiatan</p>
            <p class="text-2xl font-bold text-slate-800"><?= count($kegiatan) ?></p>
        </div>
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-200">
            <p class="text-[10px] font-bold text-emerald-500 uppercase tracking-widest">Published</p>
            <p class="text-2xl font-bold text-slate-800">
                <?php
                $pub = array_filter($kegiatan, fn($k) => $k['status'] === 'publish');
                echo count($pub);
                ?>
            </p>
        </div>
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-200">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Draft / Archived</p>
            <p class="text-2xl font-bold text-slate-800">
                <?php
                $draft = array_filter($kegiatan, fn($k) => $k['status'] !== 'publish');
                echo count($draft);
                ?>
            </p>
        </div>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-200 mb-6">
        <form method="get" class="flex flex-col md:flex-row gap-3">
            <div class="relative flex-1 group">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-[#b91c1c] transition-colors text-sm"></i>
                <input type="text" name="q" value="<?= esc($keyword) ?>"
                    placeholder="Cari kegiatan atau penulis..."
                    class="w-full pl-11 pr-4 py-2.5 rounded-xl bg-slate-50 border border-slate-100 focus:border-red-200 focus:ring-4 focus:ring-red-50 text-sm transition-all outline-none">
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-slate-800 text-white px-6 py-2.5 rounded-xl text-xs font-bold hover:bg-black transition-all">
                    Cari
                </button>
                <?php if ($keyword): ?>
                    <a href="<?= base_url('/admin/kegiatan') ?>" class="flex items-center justify-center bg-slate-200 text-slate-600 px-4 py-2 rounded-lg text-sm hover:bg-slate-300">
                        <i class="fa-solid fa-rotate-left"></i>
                    </a>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <!-- Tabel Main Content -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex items-center justify-between bg-white">
            <h2 class="text-lg font-bold text-slate-800">Daftar Event</h2>
            <span class="bg-slate-100 text-slate-400 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider">Total: <?= count($kegiatan) ?> Data</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Informasi Kegiatan</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Jadwal & Lokasi</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-center">Status</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php if (empty($kegiatan)): ?>
                        <tr>
                            <td colspan="4" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center text-slate-400">
                                    <i class="fa-solid fa-folder-open text-3xl mb-3 opacity-20"></i>
                                    <p class="text-xs italic text-slate-500">Belum ada data kegiatan yang ditemukan.</p>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($kegiatan as $k): ?>
                            <tr class="hover:bg-slate-50/80 transition-colors group text-sm">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-4">
                                        <?php if (!empty($k['thumbnail'])): ?>
                                            <img src="<?= base_url('uploads/kegiatan/' . $k['thumbnail']) ?>"
                                                class="w-12 h-12 rounded-xl object-cover border border-slate-100">
                                        <?php else: ?>
                                            <div class="w-12 h-12 rounded-xl bg-slate-50 flex items-center justify-center border border-slate-100">
                                                <i class="fa-solid fa-image text-slate-200"></i>
                                            </div>
                                        <?php endif; ?>
                                        <div class="flex flex-col">
                                            <span class="font-bold text-slate-700 leading-tight mb-1 group-hover:text-[#ea7e13] transition-colors">
                                                <?= esc($k['judul']) ?>
                                            </span>
                                            <span class="text-[10px] text-slate-400 font-medium">Oleh: <?= $k['nama_lengkap'] ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-slate-600">
                                    <div class="flex flex-col gap-1">
                                        <div class="flex items-center gap-2">
                                            <i class="fa-regular fa-calendar text-[10px]"></i>
                                            <span class="font-semibold"><?= date('d/m/Y', strtotime($k['tanggal_kegiatan'])) ?></span>
                                        </div>
                                        <div class="flex items-center gap-2 text-slate-400 text-[11px]">
                                            <i class="fa-solid fa-location-dot text-[10px]"></i>
                                            <span class="truncate max-w-[150px]"><?= esc($k['lokasi'] ?: '-') ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <?php if ($k['status'] === 'publish'): ?>
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold uppercase bg-emerald-50 text-emerald-600 border border-emerald-100">Publish</span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold uppercase bg-slate-100 text-slate-500 border border-slate-200">Draft</span>
                                    <?php endif ?>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="<?= base_url('admin/kegiatan/preview/' . $k['slug']) ?>"
                                            class="w-8 h-8 flex items-center justify-center rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all" title="Preview">
                                            <i class="fa-solid fa-eye text-xs"></i>
                                        </a>
                                        <a href="<?= base_url('admin/kegiatan/edit/' . $k['id_kegiatan']) ?>"
                                            class="w-8 h-8 flex items-center justify-center rounded-lg bg-orange-50 text-[#ea7e13] hover:bg-[#ea7e13] hover:text-white transition-all" title="Edit">
                                            <i class="fa-solid fa-pen-to-square text-xs"></i>
                                        </a>
                                        <?php if (session()->get('role') === 'super_admin'): ?>
                                            <form action="<?= base_url('/admin/kegiatan/hapus/' . $k['id_kegiatan']) ?>" method="post" class="inline" onsubmit="return confirm('Hapus kegiatan ini?')">
                                                <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-lg bg-red-50 text-red-500 hover:bg-red-600 hover:text-white transition-all">
                                                    <i class="fa-solid fa-trash-can text-xs"></i>
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Footer Tabel / Pagination -->
        <div class="px-6 py-4 bg-slate-50/50 border-t border-slate-100 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">&copy; Lasmura Activity Management</p>
            <div class="admin-pagination">
                <?= $pager->links('kegiatan', 'admin_pagination') ?>
            </div>
        </div>
    </div>
</div>

<?= $this->include('board/layout/footer') ?>