<?= $this->include('admin/layout/header') ?>

<main class="p-4 md:p-8 bg-[#fbfbfb] min-h-screen">
    <div class="max-w-7xl mx-auto space-y-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <h1 class="text-3xl font-black text-gray-900 tracking-tighter uppercase italic">
                    Data <span class="text-[#ea7e13]">Kegiatan</span>
                </h1>
                <p class="text-sm text-gray-400 font-medium">Monitoring dan pengelolaan publikasi event LASMURA</p>
            </div>

            <a href="<?= base_url('admin/kegiatan/tambah') ?>"
                class="inline-flex items-center justify-center gap-2 bg-gray-900 text-white px-6 py-3 rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-[#ea7e13] hover:shadow-lg hover:shadow-orange-200 transition-all active:scale-95">
                <i class="fa-solid fa-plus text-[10px]"></i>
                Tambah Kegiatan
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-white p-5 rounded-[2rem] border border-gray-100 shadow-sm">
                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Total</p>
                <p class="text-2xl font-black text-gray-800"><?= count($kegiatan) ?></p>
            </div>
            <div class="bg-white p-5 rounded-[2rem] border border-gray-100 shadow-sm">
                <p class="text-[10px] font-black text-[#ea7e13] uppercase tracking-widest">Published</p>
                <p class="text-2xl font-black text-gray-800">
                    <?php 
                        $pub = array_filter($kegiatan, fn($k) => $k['status'] === 'publish');
                        echo count($pub);
                    ?>
                </p>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
            
            <?php if (empty($kegiatan)): ?>
                <div class="text-center py-24">
                    <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-regular fa-folder-open text-gray-300 text-3xl"></i>
                    </div>
                    <p class="font-black text-gray-800 uppercase tracking-tighter">Database Kosong</p>
                    <p class="text-sm text-gray-400">Belum ada data kegiatan yang terinput.</p>
                </div>
            <?php else: ?>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50/50 border-b border-gray-100">
                                <th class="px-8 py-5 text-left text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">Informasi Kegiatan</th>
                                <th class="px-6 py-5 text-left text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">Jadwal & Lokasi</th>
                                <th class="px-6 py-5 text-center text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">Status</th>
                                <th class="px-8 py-5 text-right text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            <?php foreach ($kegiatan as $k): ?>
                                <tr class="group hover:bg-gray-50/80 transition-all">
                                    <td class="px-8 py-6">
                                        <div class="flex items-center gap-4">
                                            <?php if (!empty($k['thumbnail'])): ?>
                                                <img src="<?= base_url('uploads/kegiatan/' . $k['thumbnail']) ?>" 
                                                     class="w-12 h-12 rounded-xl object-cover shadow-sm group-hover:scale-110 transition-transform">
                                            <?php else: ?>
                                                <div class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center">
                                                    <i class="fa-solid fa-image text-gray-300"></i>
                                                </div>
                                            <?php endif; ?>
                                            <div>
                                                <p class="font-black text-gray-800 text-sm leading-tight group-hover:text-[#ea7e13] transition-colors uppercase tracking-tighter">
                                                    <?= esc($k['judul']) ?>
                                                </p>
                                                <p class="text-[10px] text-gray-400 mt-1 font-bold tracking-widest">Oleh: <?= $k['nama_lengkap'] ?></p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-6">
                                        <div class="space-y-1">
                                            <div class="flex items-center gap-2 text-gray-600">
                                                <i class="fa-regular fa-calendar text-[10px]"></i>
                                                <span class="text-xs font-bold"><?= date('d/m/Y', strtotime($k['tanggal_kegiatan'])) ?></span>
                                            </div>
                                            <div class="flex items-center gap-2 text-gray-400">
                                                <i class="fa-solid fa-location-dot text-[10px]"></i>
                                                <span class="text-[10px] font-medium"><?= esc($k['lokasi'] ?: 'Lokasi belum diatur') ?></span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-6 text-center">
                                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[9px] font-black uppercase tracking-widest
                                            <?= $k['status'] === 'publish' 
                                                ? 'bg-green-50 text-green-600 ring-1 ring-inset ring-green-600/20' 
                                                : 'bg-gray-100 text-gray-500 ring-1 ring-inset ring-gray-500/10' ?>">
                                            <span class="w-1.5 h-1.5 rounded-full mr-2 <?= $k['status'] === 'publish' ? 'bg-green-600' : 'bg-gray-400' ?>"></span>
                                            <?= $k['status'] ?>
                                        </span>
                                    </td>

                                    <td class="px-8 py-6">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="<?= base_url('admin/kegiatan/preview/' . $k['slug']) ?>"
                                               class="w-9 h-9 flex items-center justify-center rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all shadow-sm"
                                               title="Preview">
                                                <i class="fa-regular fa-eye text-xs"></i>
                                            </a>
                                            <a href="<?= base_url('admin/kegiatan/edit/' . $k['id_kegiatan']) ?>"
                                               class="w-9 h-9 flex items-center justify-center rounded-xl bg-orange-50 text-[#ea7e13] hover:bg-[#ea7e13] hover:text-white transition-all shadow-sm"
                                               title="Edit">
                                                <i class="fa-regular fa-pen-to-square text-xs"></i>
                                            </a>
                                            
                                            <?php if (session()->get('role') === 'super_admin'): ?>
                                                <form action="<?= base_url('/admin/kegiatan/hapus/' . $k['id_kegiatan']) ?>"
                                                      method="post" class="inline" onsubmit="return confirm('Hapus kegiatan ini?')">
                                                    <button type="submit" class="w-9 h-9 flex items-center justify-center rounded-xl bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition-all shadow-sm">
                                                        <i class="fa-regular fa-trash-can text-xs"></i>
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

                <div class="px-8 py-6 border-t border-gray-50 bg-gray-50/30 flex items-center justify-between">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em]">Menampilkan <?= count($kegiatan) ?> Entri</p>
                    <div class="admin-pagination">
                        <?= $pager->links('kegiatan', 'admin_pagination') ?>
                    </div>
                </div>

            <?php endif ?>
        </div>
    </div>
</main>

<?= $this->include('admin/layout/footer') ?>