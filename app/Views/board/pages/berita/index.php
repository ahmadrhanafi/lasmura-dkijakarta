<?= $this->include('board/layout/header') ?>

<main class="p-4 md:p-8 bg-[#fbfbfb] min-h-screen overflow-x-hidden">
    <div class="max-w-7xl mx-auto space-y-6 md:space-y-8 min-w-0">

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="min-w-0">
                <h1 class="text-2xl md:text-3xl font-black text-gray-900 tracking-tighter uppercase italic truncate">
                    Manajemen <span class="text-[#b91c1c]">Berita</span>
                </h1>
                <p class="text-xs md:text-sm text-gray-400 font-medium">Publikasikan kabar terbaru LASMURA</p>
            </div>

            <a href="<?= base_url('/admin/berita/tambah') ?>"
                class="inline-flex items-center justify-center gap-2 bg-[#b91c1c] text-white px-5 py-3 md:px-6 md:py-4 rounded-2xl text-[10px] md:text-xs font-black uppercase tracking-widest hover:bg-red-800 transition-all active:scale-95 shadow-lg shadow-red-100 whitespace-nowrap">
                <i class="fa-solid fa-plus text-[10px]"></i>
                Tambah Berita
            </a>
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

        <div class="bg-white rounded-[2rem] p-4 md:p-6 shadow-sm border border-gray-100">
            <form method="get" class="flex flex-col md:flex-row gap-3">
                <div class="relative flex-1 group">
                    <i class="fa-solid fa-magnifying-glass absolute left-5 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-[#b91c1c] transition-colors"></i>
                    <input type="text" name="q" value="<?= esc($keyword) ?>"
                        placeholder="Cari judul atau penulis..."
                        class="w-full pl-12 pr-6 py-3 md:py-3.5 rounded-xl md:rounded-2xl bg-gray-50 border-none focus:ring-2 focus:ring-red-50 text-sm font-medium transition-all">
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="flex-1 md:flex-none bg-gray-900 text-white px-6 py-3 md:py-3.5 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-[#b91c1c] transition-all">
                        Cari
                    </button>
                    <?php if ($keyword): ?>
                        <a href="<?= base_url('/admin/berita') ?>" class="flex-1 md:flex-none bg-gray-100 text-center text-gray-500 px-6 py-3 md:py-3.5 rounded-xl text-xs font-black uppercase tracking-widest hover:bg-gray-200">
                            Reset
                        </a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-[2rem] md:rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
            <div class="w-full overflow-x-auto custom-scrollbar">
                <table class="w-full text-sm min-w-[700px]">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100 text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">
                            <th class="px-6 md:px-8 py-5 text-left w-24">Thumbnail</th>
                            <th class="px-6 md:px-8 py-5 text-left">Konten Berita</th>
                            <th class="px-4 py-5 text-left hidden md:table-cell">Penulis</th>
                            <th class="px-4 py-5 text-left hidden lg:table-cell">Tanggal</th>
                            <th class="px-4 py-5 text-center">Status</th>
                            <th class="px-6 md:px-8 py-5 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-50">
                        <?php if (empty($berita)): ?>
                            <tr>
                                <td colspan="6" class="px-8 py-20 text-center">
                                    <i class="fa-regular fa-newspaper text-gray-200 text-4xl mb-3 block"></i>
                                    <p class="font-black text-gray-800 uppercase tracking-tighter">Kosong</p>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($berita as $b): ?>
                                <tr class="group hover:bg-gray-50/50 transition-all">
                                    <td class="px-6 md:px-8 py-4">
                                        <div class="relative w-16 h-12 flex-shrink-0">
                                            <?php if ($b['thumbnail']): ?>
                                                <img src="<?= base_url('uploads/berita/' . $b['thumbnail']) ?>"
                                                    class="w-full h-full rounded-xl object-cover shadow-sm">
                                            <?php else: ?>
                                                <div class="w-full h-full rounded-xl bg-gray-100 flex items-center justify-center text-gray-300">
                                                    <i class="fa-solid fa-image text-xs"></i>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($b['is_headline']): ?>
                                                <div class="absolute -top-1.5 -right-1.5 bg-orange-500 text-white text-[7px] font-black px-1.5 py-0.5 rounded shadow-sm">
                                                    HOT
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </td>

                                    <td class="px-6 md:px-8 py-4">
                                        <div class="max-w-[200px] md:max-w-md">
                                            <p class="font-black text-gray-800 text-sm leading-tight uppercase italic truncate">
                                                <?= esc($b['judul']) ?>
                                            </p>
                                            <div class="flex items-center gap-2 mt-1">
                                                <span class="text-[9px] text-gray-400 md:hidden italic">
                                                    By: <?= esc($b['nama_lengkap']) ?>
                                                </span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-4 hidden md:table-cell">
                                        <span class="text-xs font-bold text-gray-600"><?= esc($b['nama_lengkap']) ?></span>
                                    </td>

                                    <td class="px-4 py-4 hidden lg:table-cell">
                                        <span class="text-[10px] font-medium text-gray-400 italic">
                                            <?= date('d/m/y', strtotime($b['created_at'])) ?>
                                        </span>
                                    </td>

                                    <td class="px-4 py-4 text-center">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest
                                            <?= $b['status'] === 'publish' ? 'bg-green-50 text-green-600' : 'bg-yellow-50 text-yellow-600' ?>">
                                            <?= $b['status'] ?>
                                        </span>
                                    </td>

                                    <td class="px-6 md:px-8 py-4">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="<?= base_url('admin/berita/headline/' . $b['id_berita']) ?>"
                                                class="p-2 w-8 h-8 flex items-center justify-center rounded-lg transition-all <?= $b['is_headline'] ? 'bg-orange-500 text-white' : 'bg-gray-100 text-gray-400 hover:bg-gray-200' ?>">
                                                <i class="fa-solid fa-star text-[10px]"></i>
                                            </a>

                                            <a href="<?= base_url('admin/berita/edit/' . $b['id_berita']) ?>"
                                                class="p-2 w-8 h-8 flex items-center justify-center text-gray-400 hover:text-green-500 hover:bg-green-100 rounded-lg transition-all">
                                                <i class="fa-solid fa-pen-to-square text-sm"></i>
                                            </a>

                                            <a href="<?= base_url('admin/berita/preview/' . $b['slug']) ?>"
                                                class="p-2 w-8 h-8 flex items-center justify-center text-gray-400 hover:text-blue-500 hover:bg-blue-100 rounded-lg transition-all"
                                                title="Preview">
                                                <i class="fa-regular fa-eye text-xs"></i>
                                            </a>

                                            <?php if (session()->get('role') === 'super_admin'): ?>
                                                <form action="<?= base_url('/admin/berita/hapus/' . $b['id_berita']) ?>" method="post" class="inline" onsubmit="return confirm('Hapus?')">
                                                    <button type="submit" class="p-2 w-8 h-8 flex items-center justify-center text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all">
                                                        <i class="fa-solid fa-trash-can text-sm"></i>
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

            <div class="px-6 md:px-8 py-6 border-t border-gray-50 bg-gray-50/30 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-[9px] md:text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">
                    &copy; 2026 LASMURA SYSTEM
                </p>
                <div class="admin-pagination scale-90 md:scale-100">
                    <?= $pager->links('berita', 'admin_pagination') ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?= $this->include('board/layout/footer') ?>