<?= $this->include('board/layout/header') ?>

<div class="container mx-auto px-6 py-8 max-w-7xl">
    <!-- Header Page -->
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Manajemen Berita</h1>
            <p class="text-sm text-slate-500">Publikasikan kabar terbaru dan artikel LASMURA.</p>
        </div>
        <a href="<?= base_url('/admin/berita/tambah') ?>"
            class="inline-flex items-center justify-center bg-[#ea7e13] hover:bg-[#d46d0e] text-white px-6 py-2.5 rounded-xl font-semibold transition-all shadow-md shadow-red-50 gap-2 active:scale-95 text-sm">
            <i class="fa-solid fa-plus text-xs"></i>
            Tambah Berita
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
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-200">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest text-nowrap">Total Berita</p>
            <p class="text-2xl font-bold text-slate-800"><?= count($berita) ?></p>
        </div>
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-200">
            <p class="text-[10px] font-bold text-green-500 uppercase tracking-widest text-nowrap">Published</p>
            <p class="text-2xl font-bold text-slate-800">
                <?= count(array_filter($berita, fn($b) => $b['status'] === 'publish')) ?>
            </p>
        </div>
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-200">
            <p class="text-[10px] font-bold text-orange-500 uppercase tracking-widest text-nowrap">Draft</p>
            <p class="text-2xl font-bold text-slate-800">
                <?= count(array_filter($berita, fn($b) => $b['status'] !== 'publish')) ?>
            </p>
        </div>
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-200">
            <p class="text-[10px] font-bold text-red-600 uppercase tracking-widest text-nowrap">Headline</p>
            <p class="text-2xl font-bold text-slate-800">
                <?= count(array_filter($berita, fn($b) => $b['is_headline'] == 1)) ?>
            </p>
        </div>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-200 mb-6">
        <form method="get" class="flex flex-col md:flex-row gap-3">
            <div class="relative flex-1 group">
                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-300 group-focus-within:text-[#b91c1c] transition-colors text-sm"></i>
                <input type="text" name="q" value="<?= esc($keyword) ?>"
                    placeholder="Cari berita atau penulis..."
                    class="w-full pl-11 pr-4 py-2.5 rounded-xl bg-slate-50 border border-slate-100 focus:border-red-200 focus:ring-4 focus:ring-red-50 text-sm transition-all outline-none">
            </div>
            <div class="flex gap-2">
                <button type="submit" class="bg-slate-800 text-white px-6 py-2.5 rounded-xl text-xs font-bold hover:bg-black transition-all">
                    Cari
                </button>
                <?php if ($keyword): ?>
                    <a href="<?= base_url('/admin/berita') ?>" class="flex items-center justify-center bg-slate-200 text-slate-600 px-4 py-2 rounded-lg text-sm hover:bg-slate-300">
                        <i class="fa-solid fa-rotate-left"></i>
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
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest w-24">Media</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Informasi Berita</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest hidden md:table-cell">Penulis</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-center">Status</th>
                        <th class="px-6 py-4 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php if (empty($berita)): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center text-slate-300">
                                    <i class="fa-regular fa-newspaper text-3xl mb-3 opacity-20"></i>
                                    <p class="text-xs italic">Tidak ada kabar berita ditemukan.</p>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($berita as $b): ?>
                            <tr class="hover:bg-slate-50/80 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="relative w-16 h-12">
                                        <?php if ($b['thumbnail']): ?>
                                            <img src="<?= base_url('uploads/berita/' . $b['thumbnail']) ?>"
                                                class="w-full h-full rounded-lg object-cover border border-slate-100 shadow-sm">
                                        <?php else: ?>
                                            <div class="w-full h-full rounded-lg bg-slate-50 flex items-center justify-center border border-dashed border-slate-200">
                                                <i class="fa-solid fa-image text-slate-200 text-xs"></i>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($b['is_headline']): ?>
                                            <div class="absolute -top-1 -right-1 bg-orange-500 text-white text-[7px] font-black px-1 py-0.5 rounded shadow-sm">HOT</div>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="font-bold text-slate-700 leading-tight group-hover:text-[#b91c1c] transition-colors line-clamp-1 uppercase tracking-tight">
                                            <?= esc($b['judul']) ?>
                                        </span>
                                        <span class="text-[10px] text-slate-400 font-medium mt-1">
                                            <i class="fa-regular fa-clock mr-1"></i><?= date('d M Y', strtotime($b['created_at'])) ?>
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 hidden md:table-cell text-slate-600 font-medium text-xs">
                                    <?= esc($b['nama_lengkap']) ?>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[9px] font-bold uppercase border
                                        <?= $b['status'] === 'publish' ? 'bg-emerald-50 text-emerald-600 border-emerald-100' : 'bg-slate-100 text-slate-500 border-slate-200' ?>">
                                        <?= $b['status'] ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="<?= base_url('admin/berita/headline/' . $b['id_berita']) ?>"
                                            class="w-8 h-8 flex items-center justify-center rounded-lg transition-all <?= $b['is_headline'] ? 'bg-orange-500 text-white shadow-md shadow-orange-100' : 'bg-slate-50 text-slate-400 hover:bg-orange-50 hover:text-orange-500' ?>"
                                            title="Set Headline">
                                            <i class="fa-solid fa-star text-[10px]"></i>
                                        </a>
                                        <a href="<?= base_url('admin/berita/preview/' . $b['slug']) ?>"
                                            class="w-8 h-8 flex items-center justify-center rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all" title="Lihat">
                                            <i class="fa-solid fa-eye text-xs"></i>
                                        </a>
                                        <a href="<?= base_url('admin/berita/edit/' . $b['id_berita']) ?>"
                                            class="w-8 h-8 flex items-center justify-center rounded-lg bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-all" title="Edit">
                                            <i class="fa-solid fa-pen-to-square text-xs"></i>
                                        </a>
                                        <?php if (session()->get('role') === 'super_admin'): ?>
                                            <form action="<?= base_url('/admin/berita/hapus/' . $b['id_berita']) ?>" method="post" class="inline" onsubmit="return confirm('Hapus?')">
                                                <button type="submit" class="w-8 h-8 flex items-center justify-center rounded-lg bg-red-50 text-red-500 hover:bg-red-600 hover:text-white transition-all">
                                                    <i class="fa-solid fa-trash-can text-xs"></i>
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination Footer -->
        <div class="px-6 py-4 bg-slate-50/50 border-t border-slate-100 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">LASMURA &copy; 2026 CMS</p>
            <div class="admin-pagination">
                <?= $pager->links('berita', 'admin_pagination') ?>
            </div>
        </div>
    </div>
</div>

<?= $this->include('board/layout/footer') ?>